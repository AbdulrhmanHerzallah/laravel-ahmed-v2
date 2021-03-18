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

class TheySaidAboutUs extends Controller
{
    public function show()
    {
        $tab = Tab::with(['tabSubjects' => function ($query) {
            $query->withTrashed()->orderBy('id', 'DESC');
        }])->firstOrCreate(['key' => 'they_said_about_us'], ['key' => 'they_said_about_us']);
        return view('super-dashboard.they-said-about-us.show', ['tab' => $tab]);
    }

    public function create()
    {
        return view('super-dashboard.they-said-about-us.create');
    }

    public function edit($id)
    {
        $tabSubject =  TabSubject::withTrashed()->with('files')->findOrFail($id);
        return view('super-dashboard.they-said-about-us.edit', ['tabSubject' => $tabSubject]);
    }

    public function update($id, Request $request, TabSubjectHelperModel $helperModel)
    {

       $request->validate([
            'title' => 'required',
            'date_event' => 'date',
            'body' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'videos.*' => 'mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);
       return $helperModel->update($id , $request);
    }


    public function store(Request $request)
    {
        if ($request->has('images') || $request->has('videos'))
        {
            $request->validate([
                'title' => 'required',
                'body' => 'required',
                'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
                'videos.*' => 'mimes:mp4,ogx,oga,ogv,ogg,webm'
            ]);

            $tab = Tab::where('key', 'they_said_about_us')->first();

            $tabSubject = TabSubject::create($request->except(['images', 'videos']));
            $tabSubject->tab()->associate($tab)->save();

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

        Alert::info(__('keywords.must.have.video.or.images'));
        return redirect()->back();
    }


    public function forceDelete($id)
    {
       $tabSubject = TabSubject::withTrashed()->findOrFail($id);

       foreach ($tabSubject->files as $file)
       {
           if (FileSystem::exists(public_path($file->path)))
           {
               FileSystem::delete(public_path($file->path));
           }
       }

       $tabSubject->files()->delete();
       $tabSubject->forceDelete();

       toast(__('keywords.delete.well.done'), 'success');
       return redirect()->back();
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
}
