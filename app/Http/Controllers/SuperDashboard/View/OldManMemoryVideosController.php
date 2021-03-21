<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Helpers\TabSubjectHelperModel;
use App\Helpers\TabHelperModel;
use App\Http\Controllers\Controller;
use App\Models\Tab;
use App\Models\TabSubject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class OldManMemoryVideosController extends Controller
{
    public function show()
    {
       $tab = Tab::with(['tabSubjects' => function ($query) {
            $query->withTrashed()->orderBy('id', 'DESC');
        }])->firstOrCreate(['key' => 'old_man_memory_videos'], ['key' => 'old_man_memory_videos']);
        return view('super-dashboard.old-man-memory-videos.show', ['tab' => $tab]);
    }


    public function create()
    {
        return view('super-dashboard.old-man-memory-videos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'event_date' => 'date',
            'body' => 'required',
            'video.*' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);

        $fileName = Carbon::now()->timestamp.'-'.$request->file('video')->getClientOriginalName();
        $request->file('video')->move(public_path('videos'), $fileName);

        $tab = Tab::where(['key' => 'old_man_memory_videos'])->first();
        TabSubject::create(array_merge($request->except(['video']), ['video' => '/videos/'.$fileName]))->tab()->associate($tab)->save();

        toast(__('keywords.create.successfully'), 'success');

        return redirect()->back();
    }

    public function edit($id)
    {
        $tabSubject = TabSubject::withTrashed()->findOrFail($id);
        return view('super-dashboard.old-man-memory-videos.edit', ['tabSubject' => $tabSubject]);
    }


    public function update($id, Request $request, TabSubjectHelperModel $tabSubjectHelperModel)
    {
        $request->validate([
            'title' => 'required',
            'date_event' => 'date',
            'body' => 'required',
            'video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);

        return $tabSubjectHelperModel->update($id, $request);
    }


    public function updateViewImage(Request $request)
    {
       return TabHelperModel::updateViewImage($request, 'old_man_memory_videos');
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

}
