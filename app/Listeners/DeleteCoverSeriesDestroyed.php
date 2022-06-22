<?php

namespace App\Listeners;

use App\Events\SeriesDestroyed;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteCoverSeriesDestroyed implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SeriesDestroyed $event)
    {
        if($event->cover_path != 'series_cover/no_cover.gif'){
            Storage::disk('public')->delete([$event->cover_path]);
        }      
    }
}
