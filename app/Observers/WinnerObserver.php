<?php

namespace App\Observers;

use App\Jobs\SendMailAwardValueToWinnersJob;
use App\Models\User;
use App\Models\Winner;

class WinnerObserver
{
    /**
     * Handle the Winner "created" event.
     *
     * @param  \App\Models\Winner  $winner
     * @return void
     */
    public function created(Winner $winner)
    {
        dd($winner);

        $winner = Winner::withTrashed()->find($winner->id)->addSelect(['email' => User::select('email')->whereColumn('user_id', 'users.id')]);


        dispatch((new SendMailAwardValueToWinnersJob($winner)));
    }

    /**
     * Handle the Winner "updated" event.
     *
     * @param  \App\Models\Winner  $winner
     * @return void
     */
    public function updated(Winner $winner)
    {
        //
    }

    /**
     * Handle the Winner "deleted" event.
     *
     * @param  \App\Models\Winner  $winner
     * @return void
     */
    public function deleted(Winner $winner)
    {
        //
    }

    /**
     * Handle the Winner "restored" event.
     *
     * @param  \App\Models\Winner  $winner
     * @return void
     */
    public function restored(Winner $winner)
    {
        //
    }

    /**
     * Handle the Winner "force deleted" event.
     *
     * @param  \App\Models\Winner  $winner
     * @return void
     */
    public function forceDeleted(Winner $winner)
    {
        //
    }
}
