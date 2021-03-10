<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Helpers\TabSubjectHelperModel;
use App\Http\Controllers\Controller;

use App\Models\Tab;
use App\Models\TabSubject;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use Carbon\Carbon;

class AboutFoundationController extends Controller
{
    public function show()
    {
        $tab = Tab::with(['tabSubjects' => function ($query) {
            $query->withTrashed()->orderBy('id', 'DESC');
        }])->firstOrCreate(['key' => 'about_foundation'], ['key' => 'about_foundation']);
        return view('super-dashboard.about-foundation.show', ['tab' => $tab]);
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


    public function edit($id)
    {
        $tabSubject = TabSubject::withTrashed()->findOrFail($id);
        return view('super-dashboard.about-foundation.edit', ['tabSubject' => $tabSubject]);
    }



    public function update($id, Request $request)
    {

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'body' =>  'required'
        ]);

        $tabSubject = TabSubject::withTrashed()->findOrFail($id);

        $tabSubject->update($request->except(['image', 'deleteImage']));

        if ($request->deleteImage == 'on')
        {
            if (File::exists(public_path($tabSubject->image)))
            {
                File::delete(public_path($tabSubject->image));
            }

            $tabSubject->image = null;

        }

        if ($request->hasFile('image'))
        {
            if (File::exists(public_path($tabSubject->image)))
            {
                File::delete(public_path($tabSubject->image));
            }
            $fileName = Carbon::now()->timestamp.'-'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $fileName);
            $tabSubject->image = '/images/'.$fileName;

        }
        $tabSubject->save();
        toast(__('keywords.update.well.done'), 'success');

        return redirect()->back();
    }


}
