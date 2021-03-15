<?php

namespace App\Http\Controllers\SuperDashboard\Awards;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Award;
use App\Models\AwardSeason;

use App\Models\Application;
use App\Models\Winner;

use RealRashid\SweetAlert\Facades\Alert;

class WinnersController extends Controller
{

    public function createWinner($award_slug, $season_slug)
    {
        $award = Award::where('slug', $award_slug)->first()->firstOrFail();
        $awardSeason = AwardSeason::where('slug', $season_slug)->firstOrFail();

        $apps = Application::where('award_id', $award->id)->where('award_season_id', $awardSeason->id)
            ->where('nomination_status', true)
            ->addSelect(['user_name' => User::select('name')->whereColumn('user_id', 'users.id')])
           ->get();

       $winners = Winner::where(['award_id' => $award->id, 'award_season_id' => $awardSeason->id])->get(['user_id']);

       // get winner to existed from loop
       $users_id = $winners->map(function ($value) {
          return $value->user_id;
        })->toArray();

        return view('super-dashboard.awards.winners.create-winners',
            [
            'award' => $award, 'awardSeason' => $awardSeason, 'apps' => $apps, 'users_id' => $users_id
            ]);
    }

    public function storeWinner($award_id, $season_id, Request $request)
    {

        // chek no duplicated must to work

        foreach ($request->user_id as $key => $id)
            {
                Winner::create(
                    [
                        'user_id' => $id,
                        'center' => $request->center[$key],
                        'award_value' => $request->award_value[$key],
                        'creator_id' => auth()->id() ?? 1,
                        'award_id' => $award_id,
                        'award_season_id' => $season_id
                    ]
                );
            }
        toast('تم تسجيل الفائزين بنجاح', 'success') ;
        return redirect()->back();
    }

}
