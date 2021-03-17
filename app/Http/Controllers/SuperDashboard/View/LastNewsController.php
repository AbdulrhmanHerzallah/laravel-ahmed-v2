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
use Illuminate\Support\Facades\File as FileSystem;

class LastNewsController extends Controller
{
    public function show()
    {
        $tab = Tab::with(['tabSubjects' => function ($query) {
            $query->withTrashed()->orderBy('id', 'DESC');
        }])->firstOrCreate(['key' => 'last_news'], ['key' => 'last_news']);
        return view('super-dashboard.last-news.show', ['tab' => $tab]);
    }


    public function create()
    {
        return view('super-dashboard.last-news.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date_event' => 'date',
            'body' => 'required',
            'images.*' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tab = Tab::where('key', 'last_news')->first();
        $tabSubject  = TabSubject::create($request->except(['images']));
        $tabSubject->tab()->associate($tab)->save();


        foreach ($request->file('images') as $image)
        {
            $fileName = Carbon::now()->timestamp.'-'.$image->getClientOriginalName();
            $image->move(public_path('images'), $fileName);

            File::create(['path' => '/images/'.$fileName, 'file_type' => 'image'])->fileable()->associate($tabSubject)->save();
        }

        toast(__('keywords.create.successfully'), 'success');
        return redirect()->back();

    }



    public function edit($id)
    {
        $tabSubject = TabSubject::withTrashed()->findOrFail($id);
        return view('super-dashboard.last-news.edit', ['tabSubject' => $tabSubject]);
    }


    public function update($id, Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'date_event' => 'date',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $tabSubject = TabSubject::withTrashed()->findOrFail($id);

        $tabSubject->update($request->except(['images', 'files', 'files_id']));


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


        if ($request->hasFile('images'))
        {

            foreach ($tabSubject->files as $file)
            {
                if (FileSystem::exists(public_path($file->path)))
                {
                    FileSystem::delete(public_path($file->path));
                }
            }

            $tabSubject->files()->delete();

            foreach ($request->file('images') as $image)
            {
                $imageName = Carbon::now()->timestamp.'-'.$image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);

                File::create(['path' => '/images/'.$imageName, 'file_type' => 'image'])->fileable()->associate($tabSubject)->save();

            }
        }

        toast(__('keywords.create.successfully'), 'success');
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

    public function forceDelete($id, TabSubjectHelperModel $subjectHelper)
    {
        return $subjectHelper->forceDelete($id);
    }

    public function updateViewImage(Request $request)
    {
        return TabHelperModel::updateViewImage($request, 'old_man_images');
    }


}
