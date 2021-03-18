<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Helpers\TabSubjectHelperModel;
use App\Http\Controllers\Controller;
use App\Models\Tab;
use App\Models\TabSubject;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File as FileSystem;

class ImagesShowController extends Controller
{
    public function show()
    {
        $tab = Tab::with(['tabSubjects' => function ($query) {
            $query->withTrashed()->orderBy('id', 'DESC');
        }])->firstOrCreate(['key' => 'images_show'], ['key' => 'images_show']);
        return view('super-dashboard.images-show.show', ['tab' => $tab]);
    }


    public function store(Request $request, TabSubjectHelperModel $tabSubjectHelperModel)
    {
        $request->validate([
            'title' => 'required',
            'images.*' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        return $tabSubjectHelperModel->storeShows($request, 'images_show', 'images', 'image');
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


    public function create()
    {
        return view('super-dashboard.images-show.create');
    }

    public function edit($id)
    {
        $tabSubject = TabSubject::withTrashed()->findOrFail($id);
        return view('super-dashboard.images-show.edit', ['tabSubject' => $tabSubject]);
    }

    public function update($id, Request $request, TabSubjectHelperModel $tabSubjectHelperModel)
    {
        $request->validate([
            'title' => 'required',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        return $tabSubjectHelperModel->update($id, $request);
    }


    // use delete_at to deactivate
    public function delete($id)
    {
        TabSubject::withTrashed()->findOrFail($id)->delete();
        return response(['massage' => __('keywords.deactivate.message')], 200);
    }

    // use delete_at to restore
    public function restore($id)
    {
        TabSubject::withTrashed()->findOrFail($id)->restore();
        return response(['massage' => __('keywords.activate.message')], 200);
    }

}
