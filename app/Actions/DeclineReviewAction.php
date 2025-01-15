<?php

namespace App\Actions;

use App\Enums\ReviewStatusEnum;
use App\Models\Review;

class DeclineReviewAction
{
    public function execute(Review $review)
    {
        $review->update([ 'status' => ReviewStatusEnum::DECLINED ]);
    }
}
