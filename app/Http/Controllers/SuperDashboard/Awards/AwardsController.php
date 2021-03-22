<?php

namespace App\Http\Controllers\SuperDashboard\Awards;

use App\Http\Controllers\Controller;
use App\Models\AwardSeason;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Award;
use App\Models\Application;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AwardsController extends Controller
{
    public function showAwards()
    {
       $awards = Award::all(['name', 'slug', 'id', 'award_type']);
       return view('super-dashboard.awards.show-awards', ['awards' => $awards]);
    }


    public function editAward($award_id)
    {
       $award = Award::findOrFail($award_id);
       return view('super-dashboard.awards.edit-award', ['award' => $award]);
    }


    public function updateAward($award_id, Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $award = Award::findOrFail($award_id);

        $award->update($request->except(['image', 'files']));

        if ($request->hasFile('image'))
        {
            if (File::exists(public_path($award->img)))
            {
                File::delete(public_path($award->img));
            }
            $fileName = Carbon::now()->timestamp.'-'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $fileName);
            $award->img = '/images/'.$fileName;
        }
        $award->save();

        toast(__('keywords.create.successfully'), 'success');
        return redirect()->back();
    }

    public function showSeasons($slug)
    {
      $award = Award::with('awardSeasons')->where('slug', $slug)->firstOrFail(['name', 'id', 'slug', 'award_type']);

      $per = (auth()->user()->hasRole(['superAdmin', 'award']) ||  auth()->user()->can($award->award_type));

      if ($per)
      {
        return view('super-dashboard.awards.show-award-seasons', ['award' => $award]);
      }
      abort(403);
    }

    public function updateSeason($id, Request $request)
    {
        $request->validate([
            'season_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'advertising_date' => 'required|date',
        ]);

        $awardSeason = AwardSeason::withTrashed()->findOrFail($id);
        $awardSeason->update($request->all());
        $awardSeason->save();

        toast(__('keywords.create.successfully'), 'success');
        return redirect()->back();
    }

    public function deleteSeason($id)
    {

        try {
            $awardSeason = AwardSeason::withTrashed()->findOrFail($id);
            $awardSeason->forceDelete();

            toast(__('keywords.delete.well.done'), 'success');
            return redirect()->back();
        }catch (\Illuminate\Database\QueryException $queryException){
            Alert::info(__('keywords.can.not.delete.season'));
            return redirect()->back();
        }

    }

    public function showApps($id)
    {
        try {
            $awardSeasons = AwardSeason::with(['award'])->findOrFail($id);
            return view('super-dashboard.awards.show-apps', ['awardSeasons' => $awardSeasons]);

        }catch (\ErrorException $errorException)
        {
            abort(404);
        }
    }

    public function showAppsDataTable($id)
    {
        try {
            $awardSeasons = AwardSeason::find($id);
            $apps = $awardSeasons->apps()
                ->addSelect(['steps' => Award::select('steps')
                        ->whereColumn('award_id', 'awards.id')->limit(1) ?? ''])

                ->addSelect(['award_type' => Award::select('award_type')
                        ->whereColumn('award_id', 'awards.id')->limit(1) ?? ''])
                ->with('user')
                ->get();

            return DataTables::of($apps)
                ->addColumn('user_name', function ($query) {
                    return $query->user->name;
                })
                ->addColumn('email', function ($query) {
                    return $query->user->email;
                })
                ->addColumn('cv_file', function ($query) {
                    return "<a href='$query->cv_file' download class='btn btn-success'><i class='far fa-arrow-alt-circle-down'></i></a>";
                })
                ->addColumn('nomination_status', function ($query) {
                    if ($query->nomination_status) {
                        $checked = 'checked';
                    } else {
                        $checked = null;
                    }
                    return "<div class='form-check form-check-inline'><input onclick='nomination(event,$query->id)' type='checkbox' $checked></div>";
                })
                ->addColumn('is_accepted', function ($query) {
                    if ($query->is_accepted) {
                        $checked = 'checked';
                    } else {
                        $checked = null;
                    }
                    return "<div class='form-check form-check-inline'><input onclick='accepted(event,$query->id)' type='checkbox' $checked></div>";
                })
                ->addColumn('user_info', function ($query) {
                    return "<button type='button' class='btn btn-warning' data-toggle='modal' data-user-info='$query->user' data-target='#user_info'><i class='far fa-eye'></i></button>";
                })
                ->addColumn('show_app', function ($query) {
                    $route = route('super-dashboard.awards.showApp', ['award_type' => $query->award_type, 'app_id' => $query->id]);
                    return "<a href='$route' type='button' class='btn btn-dark'><i class='fas fa-chevron-left'></i></a>";
                })
                ->rawColumns(['cv_file', 'nomination_status', 'is_accepted', 'user_info', 'show_app'])
                ->make(true);

        } catch (\ErrorException $errorException) {
            abort(404);
        }
    }

    public function nomination(Request $request)
    {
        $app = Application::find($request->id);
        if ($request->nomination_status == 1)
        {
            $app->nomination_status = true;
            $app->save();
            return response(['massage' => __('keywords.nomination.accepted')], 200);
        }
        else{
            $app->nomination_status = false;
            $app->save();
            return response(['massage' => __('keywords.nomination.rejected')], 200);
        }
    }

    public function accepted(Request $request)
    {
        $app = Application::find($request->id);
        if ($request->is_accepted == 1)
        {
            $app->is_accepted = true;
            $app->save();
            return response(['massage' => __('keywords.initial.approval')], 200);
        }
        else{
            $app->is_accepted = false;
            $app->save();
            return response(['massage' => __('keywords.initial.rejection')], 200);
        }
    }

    public function createSeason($award_id)
    {
        $award = Award::findOrFail($award_id);
        return view('super-dashboard.awards.create-award-season',['award' => $award]);
    }

    public function storeSeason($award_id, Request $request)
    {
        $request->validate([
            'season_name' => 'required',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
            'advertising_date' => 'required|date',
        ]);

        AwardSeason::create($request->all())->award()->associate($award_id)->save();
        toast(__('keywords.create.successfully'), 'success');
        return redirect()->back();
    }


    public function getAppData($app_id, array $relationship)
    {
        return Application::with($relationship)
            ->addSelect(['award_name' => Award::select('name')->whereColumn('award_id', 'awards.id')->limit(1) ?? ''])
            ->addSelect(['award_name_slug' => Award::select('slug')->whereColumn('award_id', 'awards.id')->limit(1) ?? ''])
            ->addSelect(['season_name' => AwardSeason::select('season_name')->whereColumn('award_season_id', 'award_seasons.id')->limit(1) ?? ''])
            ->addSelect(['season_name_slug' => AwardSeason::select('slug')->whereColumn('award_season_id', 'award_seasons.id')->limit(1) ?? ''])
            ->findOrFail($app_id);
    }

    public function showApp($award_type, $app_id)
    {
        switch ($award_type){
            case 'free';
                $app = $this->getAppData($app_id, ['user','freeAward']);
                return view('super-dashboard.awards.show-app.show-free', ['app' => $app]);
            case 'writer';
                $app = $this->getAppData($app_id, ['user','writerAward']);
                return view('super-dashboard.awards.show-app.show-writer', ['app' => $app]);
            case 'personality';
                $app = $this->getAppData($app_id, ['user','personalSeasonAward', 'files']);
                return view('super-dashboard.awards.show-app.show-personality', ['app' => $app]);
            case 'poet';
                $app = $this->getAppData($app_id, ['user','poetAward']);
                return view('super-dashboard.awards.show-app.show-poet', ['app' => $app]);
        }
    }
}
