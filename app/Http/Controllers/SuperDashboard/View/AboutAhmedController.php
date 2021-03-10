<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Tab;
use App\Models\TabSubject;

use Illuminate\Support\Facades\File;

use App\Helpers\TabSubjectHelperModel;

class AboutAhmedController extends Controller
{

    public function show()
    {
        $tab = Tab::with(['tabSubjects' => function($query){
            $query->withTrashed()->orderBy('id', 'DESC');
        }])->firstOrCreate(['key' => 'about_ahmed'], ['key' => 'about_ahmed']);
        return view('super-dashboard.about-ahmed.show', ['tab' => $tab]);
    }


    public function edit($id)
    {
        $tabSubject = TabSubject::withTrashed()->findOrFail($id);
        return view('super-dashboard.about-ahmed.edit', ['tabSubject' => $tabSubject]);
    }

    public function update($id ,Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm',
            'title' => 'required',
            'body' => 'required'
        ]);

        $tabSubject = TabSubject::withTrashed()->findOrFail($id);
        $tabSubject->update($request->except(['image', 'video', 'files']));

        if ($request->hasFile('image'))
        {
            $fileName = Carbon::now()->timestamp.'-'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $fileName);

            if (File::exists(public_path($tabSubject->image)))
            {
                File::delete(public_path($tabSubject->image));
            }
            $tabSubject->image = '/images/'.$fileName;
        }

        if ($request->hasFile('video'))
        {
            $fileName = Carbon::now()->timestamp.'-'.$request->file('video')->getClientOriginalName();
            $request->file('video')->move(public_path('videos'), $fileName);

            if (File::exists(public_path($tabSubject->video)))
            {
                File::delete(public_path($tabSubject->video));
            }
            $tabSubject->video = '/videos/'.$fileName;
        }

        $tabSubject->save();

        toast(__('keywords.update.well.done'), 'success');
        return redirect()->back();
    }

    // use delete_at to deactivate

    public function delete($id ,TabSubjectHelperModel $subjectHelper)
    {
       return $subjectHelper->delete($id);
    }

    // use delete_at to restore
    public function restore($id ,TabSubjectHelperModel $subjectHelper)
    {
       return $subjectHelper->restore($id);
    }

}
