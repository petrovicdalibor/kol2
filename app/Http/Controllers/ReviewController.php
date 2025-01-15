<?php

namespace App\Http\Controllers;

use App\Actions\ApproveReviewAction;
use App\Actions\DeclineReviewAction;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $status = $request->input('status');
        $reviews = Review::query()
            ->when($status, fn(Builder $builder) => $builder->where('status', $status))
            ->paginate();

        return ReviewResource::collection($reviews);
    }

    public function show(Review $review): ReviewResource
    {
        return ReviewResource::make($review);
    }

    public function store(ReviewRequest $request): JsonResource
    {
        $review = Review::query()->create($request->validated());

        return JsonResource::make([
            'message' => 'Review je dodan!'
        ]);
    }

    public function approveReview(Review $review): JsonResource
    {
        (new ApproveReviewAction())->execute($review);

        return JsonResource::make([
            'message' => 'Review je odobren!'
        ]);
    }

    public function declineReview(Review $review): JsonResource
    {
        (new DeclineReviewAction())->execute($review);

        return JsonResource::make([
            'message' => 'Review je odbijen!'
        ]);
    }
}
