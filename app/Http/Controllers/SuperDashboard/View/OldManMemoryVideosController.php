<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Helpers\TabSubjectHelperModel;
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
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
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


    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date_event' => 'date',
            'body' => 'required',
            'video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);

        $tabSubject = TabSubject::withTrashed()->findOrFail($id);

        $tabSubject->update($request->except(['image']));

        if ($request->hasFile('video'))
        {
            if (File::exists(public_path($tabSubject->video)))
            {
                File::delete(public_path($tabSubject->video));
            }

            $fileName = Carbon::now()->timestamp.'-'.$request->file('video')->getClientOriginalName();
            $request->file('video')->move(public_path('videos'), $fileName);

            $tabSubject->video = '/videos/'.$fileName;

        }
        $tabSubject->save();
        toast(__('keywords.update.well.done'), 'success');

        return redirect()->back();

    }


    public function updateViewImage(Request $request)
    {

       $request->validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       ]);

       $tab = Tab::where('key', 'old_man_memory_videos')->first();

       $imageFile = Carbon::now()->timestamp.'-'.$request->file('image')->getClientOriginalName();
       $request->file('image')->move(public_path('images') ,$imageFile);

       $tab->image = '/images/'.$imageFile;
       $tab->save();

       toast(__('keywords.update.well.done'), 'success');
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

}
