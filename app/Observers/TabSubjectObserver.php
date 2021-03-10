<?php

namespace App\Observers;

use App\Models\TabSubject;
use App\Helpers\SlugUtf8Helper;

class TabSubjectObserver
{
    /**
     * Handle the TabSubject "created" event.
     *
     * @param  \App\Models\TabSubject  $tabSubject
     * @return void
     */
    public function created(TabSubject $tabSubject)
    {
        //
    }

    /**
     * Handle the TabSubject "updated" event.
     *
     * @param  \App\Models\TabSubject  $tabSubject
     * @return void
     */
    public function updated(TabSubject $tabSubject)
    {
        $tabSubject->slug = SlugUtf8Helper::Slug($tabSubject->title);
    }

    /**
     * Handle the TabSubject "deleted" event.
     *
     * @param  \App\Models\TabSubject  $tabSubject
     * @return void
     */
    public function deleted(TabSubject $tabSubject)
    {
        //
    }

    /**
     * Handle the TabSubject "restored" event.
     *
     * @param  \App\Models\TabSubject  $tabSubject
     * @return void
     */
    public function restored(TabSubject $tabSubject)
    {
        //
    }

    /**
     * Handle the TabSubject "force deleted" event.
     *
     * @param  \App\Models\TabSubject  $tabSubject
     * @return void
     */
    public function forceDeleted(TabSubject $tabSubject)
    {
        //
    }
}
