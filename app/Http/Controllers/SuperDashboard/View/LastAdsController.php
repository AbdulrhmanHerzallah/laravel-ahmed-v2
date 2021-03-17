<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Helpers\TabHelperModel;
use App\Helpers\TabSubjectHelperModel;
use App\Http\Controllers\Controller;
use App\Models\Tab;
use App\Models\TabSubject;
use Illuminate\Http\Request;

class LastAdsController extends Controller
{
    public function show()
    {
        $tab = Tab::with(['tabSubjects' => function ($query) {
            $query->withTrashed()->orderBy('id', 'DESC');
        }])->firstOrCreate(['key' => 'last_ads'], ['key' => 'last_ads']);
        return view('super-dashboard.last-ads.show', ['tab' => $tab]);
    }


    public function create()
    {
        return view('super-dashboard.last-ads.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date_event' => 'required|date',
        ]);

        $tab = Tab::where('key', 'last_ads')->first();
        $tabSubject = TabSubject::create($request->all());
        $tabSubject->tab()->associate($tab)->save();


        toast(__('keywords.create.successfully'), 'success');
        return redirect()->back();

    }


    public function edit($id)
    {
        $tabSubject = TabSubject::withTrashed()->findOrFail($id);
        return view('super-dashboard.last-ads.edit', ['tabSubject' => $tabSubject]);
    }


    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date_event' => 'required|date'
        ]);

        $tabSubject = TabSubject::withTrashed()->findOrFail($id);
        $tabSubject->update($request->all());
        $tabSubject->save();
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

    public function updateViewImage(Request $request)
    {
        return TabHelperModel::updateViewImage($request, 'old_man_images');
    }


}
