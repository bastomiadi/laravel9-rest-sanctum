<?php

namespace App\Observers\v1;

use App\Models\v1\Review;
use App\Models\v1\ReviewModel;

class ReviewObserver
{
    protected $userID;

    public function __construct()
    {
        $this->userID = auth()->user()->id;
    }

    /**
     * Handle the Review "created" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function creating(Review $review)
    {
        $review->created_by = $this->userID;
    }

    /**
     * Handle the Review "updated" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function updating(Review $review)
    {
        $review->updated_by = $this->userID;
    }

    /**
     * Handle the Review "deleted" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function deleted(Review $review)
    {
        $review->deleted_by = $this->userID;
        $review->update();
    }

    /**
     * Handle the Review "restored" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function restored(Review $review)
    {
        //
    }

    /**
     * Handle the Review "force deleted" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function forceDeleted(Review $review)
    {
        //
    }
}
