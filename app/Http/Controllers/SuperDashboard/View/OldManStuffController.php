<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Tab;
use App\Models\TabSubject;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        $tab = Tab::where('key', 'old_man_stuff')->first();

        $tabSubject = TabSubject::create($request->except(['images', 'videos']));
        $tabSubject->tab()->associate($tab)->save();

        if ($request->hasFile('images'))
        {
            foreach ($request->file('images') as $image)
            {
                $fileName = Carbon::now()->timestamp.'-'.$image->getClientOriginalName();
                $image->move(public_path('images'), $fileName);
                File::create(['path' => '/images/'.$fileName])->fileable()->associate($tabSubject)->save();
            }
        }

        if ($request->hasFile('videos'))
        {
            foreach ($request->file('videos') as $video)
            {
                $fileName = Carbon::now()->timestamp.'-'.$video->getClientOriginalName();
                $video->move(public_path('videos'), $fileName);
                File::create(['path' => '/videos/'.$fileName])->fileable()->associate($tabSubject)->save();
            }
        }

        toast(__('keywords.create.successfully'), 'success');
        return redirect()->back();

    }


    public function create()
    {
        return view('super-dashboard.old-man-stuff.create');
    }
}
