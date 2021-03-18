<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Helpers\TabHelperModel;
use App\Helpers\TabSubjectHelperModel;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Tab;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File as FileSystem;

use App\Models\TabSubject;

class OldManImagesController extends Controller
{
    public function show()
    {
        $tab = Tab::with(['tabSubjects' => function ($query) {
            $query->withTrashed()->orderBy('id', 'DESC');
        }])->firstOrCreate(['key' => 'old_man_images'], ['key' => 'old_man_images']);
        return view('super-dashboard.old-man-images.show', ['tab' => $tab]);
    }

    public function create()
    {
        return view('super-dashboard.old-man-images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date_event' => 'date',
            'body' => 'required',
            'images.*' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tab = Tab::where('key', 'old_man_images')->first();
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
        return view('super-dashboard.old-man-images.edit', ['tabSubject' => $tabSubject]);
    }


    public function update($id, Request $request, TabSubjectHelperModel $tabSubjectHelperModel)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'date_event' => 'date',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        return $tabSubjectHelperModel->update($id, $request);
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
