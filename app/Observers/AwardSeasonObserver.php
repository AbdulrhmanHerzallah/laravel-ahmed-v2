<?php

namespace App\Observers;

use App\Helpers\SlugUtf8Helper;
use App\Models\AwardSeason;

class AwardSeasonObserver
{
    /**
     * Handle the AwardSeason "created" event.
     *
     * @param  \App\Models\AwardSeason  $awardSeason
     * @return void
     */
    public function created(AwardSeason $awardSeason)
    {
        //
    }

    public function creating(AwardSeason $awardSeason)
    {
        $awardSeason->slug = SlugUtf8Helper::Slug($awardSeason->season_name);
    }

    /**
     * Handle the AwardSeason "updated" event.
     *
     * @param  \App\Models\AwardSeason  $awardSeason
     * @return void
     */
    public function updated(AwardSeason $awardSeason)
    {
        //
    }

    public function updating(AwardSeason $awardSeason)
    {
        $awardSeason->slug = SlugUtf8Helper::Slug($awardSeason->season_name);
    }

    /**
     * Handle the AwardSeason "deleted" event.
     *
     * @param  \App\Models\AwardSeason  $awardSeason
     * @return void
     */
    public function deleted(AwardSeason $awardSeason)
    {
        //
    }

    /**
     * Handle the AwardSeason "restored" event.
     *
     * @param  \App\Models\AwardSeason  $awardSeason
     * @return void
     */
    public function restored(AwardSeason $awardSeason)
    {
        //
    }

    /**
     * Handle the AwardSeason "force deleted" event.
     *
     * @param  \App\Models\AwardSeason  $awardSeason
     * @return void
     */
    public function forceDeleted(AwardSeason $awardSeason)
    {
        //
    }
}
