<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Helpers\TabHelperModel;
use App\Helpers\TabSubjectHelperModel;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Tab;
use App\Models\TabSubject;
use Carbon\Carbon;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\File as FileSystem;

class OldManStuffController extends Controller
{
    public function show()
    {
        $tab = Tab::with(['tabSubjects' => function ($query) {
            $query->withTrashed()->orderBy('id', 'DESC');
        }])->firstOrCreate(['key' => 'old_man_stuff'], ['key' => 'old_man_stuff']);
        return view('super-dashboard.old-man-stuff.show', ['tab' => $tab]);
    }


    public function store(Request $request)
    {

        if ($request->has('images') || $request->has('videos'))
        {
            $request->validate([
                'title' => 'required',
                'date_event' => 'date',
                'body' => 'required',
                'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
                'videos.*' => 'mimes:mp4,ogx,oga,ogv,ogg,webm'
            ]);

            $tab = Tab::where('key', 'old_man_stuff')->first();

            $tabSubject = TabSubject::create($request->except(['images', 'videos']));
            $tabSubject->tab()->associate($tab)->save();

            if ($request->hasFile('images'))
            {
                foreach ($request->file('images') as $image)
                {
                    $fileName = Carbon::now()->timestamp.'-'.$image->getClientOriginalName();
                    $image->move(public_path('images'), $fileName);
                    File::create(['path' => '/images/'.$fileName, 'file_type' => 'video'])->fileable()->associate($tabSubject)->save();
                }
            }

            if ($request->hasFile('videos'))
            {
                foreach ($request->file('videos') as $video)
                {
                    $fileName = Carbon::now()->timestamp.'-'.$video->getClientOriginalName();
                    $video->move(public_path('videos'), $fileName);
                    File::create(['path' => '/videos/'.$fileName, 'file_type' => 'video'])->fileable()->associate($tabSubject)->save();
                }
            }

            toast(__('keywords.create.successfully'), 'success');
            return redirect()->back();
        }

        Alert::info('يجب ان يكون احدهما موجود! (الصور او الفديو)');
        return redirect()->back();
    }


    public function create()
    {
        return view('super-dashboard.old-man-stuff.create');
    }


    public function update($id, Request $request)
    {

        $request->validate([
            'title' => 'required',
            'date_event' => 'date',
            'body' => 'required',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'videos' => 'mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);


       if ($request->has('files_id'))
       {
           foreach ($request->files_id as $file) {
            $file = File::find($file);
            if (!$file) {
                continue;}

             if (FileSystem::exists(public_path($file->path))) {
                 FileSystem::delete(public_path($file->path));
             }
               $file->delete();
           }
       }

       $tabSubject = TabSubject::withTrashed()->findOrFail($id);

       if ($request->hasFile('images'))
       {
           foreach ($tabSubject->files as $file)
             if (FileSystem::exists(public_path($file->path)))
             {
                 FileSystem::delete(public_path($file->path));
             }

           $tabSubject->files()->where('file_type', 'image')->delete();
       }

        if ($request->hasFile('videos'))
        {
            foreach ($tabSubject->files as $file)
                if (FileSystem::exists(public_path($file->path)))
                {
                    FileSystem::delete(public_path($file->path));
                }

            $tabSubject->files()->where('file_type', 'video')->delete();
        }

       $tabSubject->update($request->except(['files_id', 'images', 'videos']));

        if ($request->hasFile('images'))
        {
            foreach ($request->file('images') as $image)
            {
               $fileName = Carbon::now()->timestamp.'-'.$image->getClientOriginalName();
               $image->move(public_path('images'), $fileName);

               File::create(['path' => '/images/'.$fileName, 'file_type' => 'image'])->fileable()->associate($tabSubject)->save();
            }
        }

        if ($request->hasFile('videos'))
        {
            foreach ($request->file('videos') as $image)
            {
                $fileName = Carbon::now()->timestamp.'-'.$image->getClientOriginalName();
                $image->move(public_path('videos'), $fileName);

                File::create(['path' => '/videos/'.$fileName, 'file_type' => 'video'])->fileable()->associate($tabSubject)->save();
            }
        }

      $tabSubject->save();

      toast(__('keywords.update.well.done'), 'success');
      return redirect()->back();
    }

    public function edit($id)
    {
      $tabSubject =  TabSubject::withTrashed()->with('files')->findOrFail($id);
      return view('super-dashboard.old-man-stuff.edit', ['tabSubject' => $tabSubject]);
    }

    // use delete_at to deactivate

    public function delete($id, TabSubjectHelperModel $subjectHelper)
    {
        return $subjectHelper->delete($id);
    }

    // use delete_at to restore
    public function restore($id, TabSubjectHelperModel $subjectHelper)
    {
        return $subjectHelper->restore($id);
    }

    public function forceDelete($id, TabSubjectHelperModel $subjectHelper)
    {
        return $subjectHelper->forceDelete($id);
    }

    public function updateViewImage(Request $request)
    {
        return TabHelperModel::updateViewImage($request, 'old_man_stuff');
    }

}
