<?php

namespace App\Observers;

use App\Models\FarmActivity;

class FarmActivityObserver
{
    /**
     * Handle the FarmActivity "created" event.
     */
    public function created(FarmActivity $farmActivity): void
    {
        //
    }

    /**
     * Handle the FarmActivity "updated" event.
     */
    public function updated(FarmActivity $farmActivity): void
    {
        //
    }

    /**
     * Handle the FarmActivity "deleted" event.
     */
    public function deleted(FarmActivity $farmActivity): void
    {
        //
    }

    /**
     * Handle the FarmActivity "restored" event.
     */
    public function restored(FarmActivity $farmActivity): void
    {
        //
    }

    /**
     * Handle the FarmActivity "force deleted" event.
     */
    public function forceDeleted(FarmActivity $farmActivity): void
    {
        //
    }
}
