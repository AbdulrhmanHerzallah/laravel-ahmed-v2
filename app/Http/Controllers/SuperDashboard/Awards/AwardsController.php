<?php

namespace App\Http\Controllers\SuperDashboard\Awards;

use App\Http\Controllers\Controller;
use App\Models\AwardSeason;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Award;
use App\Models\Application;

use Yajra\DataTables\DataTables;

class AwardsController extends Controller
{
    public function showAwards()
    {
       $awards = Award::all(['name', 'slug', 'id']);
       return view('super-dashboard.awards.show-awards', ['awards' => $awards]);
    }

    public function showSeasons($slug)
    {
       $awardSeasons = Award::with('awardSeasons')->where('slug', $slug)->first(['name', 'id']);

       if ($awardSeasons)
       {
           return view('super-dashboard.awards.show-award-seasons', ['awardSeasons' => $awardSeasons]);
       }
    }


    public function showApps($id)
    {
        $awardSeasons = AwardSeason::find($id)

          ->addSelect(['award_name' => Award::select('name')
              ->whereColumn('award_id', 'awards.id')->limit(1) ?? ''])->first();

        return view('super-dashboard.awards.show-apps', ['awardSeasons' => $awardSeasons]);
    }

    public function showAppsDataTable($id)
    {
      $awardSeasons = AwardSeason::find($id);
      $apps = $awardSeasons->apps()
          ->addSelect(['user_name' => User::select('name')
          ->whereColumn('user_id', 'users.id')->limit(1) ?? null])

          ->addSelect(['email' => User::select('email')
          ->whereColumn('user_id', 'users.id')->limit(1) ?? null])
          ->get();

      return DataTables::of($apps)
          ->addColumn(__('keywords.cv.file'), function ($query){
              return "<a href='$query->cv_file' download class='btn btn-success'><i class='far fa-arrow-alt-circle-down'></i></a>";
          })
          ->rawColumns([__('keywords.cv.file')])
          ->make();
    }



}
