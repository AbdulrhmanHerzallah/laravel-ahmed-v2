<?php

namespace App\Observers;

use App\Helpers\SlugUtf8Helper;
use App\Models\Award;

class AwardObserver
{
    /**
     * Handle the Award "created" event.
     *
     * @param  \App\Models\Award  $award
     * @return void
     */
    public function created(Award $award)
    {
        //
    }

    public function crating(Award $award)
    {
        $award->slug = SlugUtf8Helper::Slug($award->name);
    }

    /**
     * Handle the Award "updated" event.
     *
     * @param  \App\Models\Award  $award
     * @return void
     */
    public function updated(Award $award)
    {
        //
    }

    public function updating(Award $award)
    {
        $award->slug = SlugUtf8Helper::Slug($award->name);
    }

    /**
     * Handle the Award "deleted" event.
     *
     * @param  \App\Models\Award  $award
     * @return void
     */
    public function deleted(Award $award)
    {
        //
    }

    /**
     * Handle the Award "restored" event.
     *
     * @param  \App\Models\Award  $award
     * @return void
     */
    public function restored(Award $award)
    {
        //
    }

    /**
     * Handle the Award "force deleted" event.
     *
     * @param  \App\Models\Award  $award
     * @return void
     */
    public function forceDeleted(Award $award)
    {
        //
    }
}
