<?php

namespace App\Models;

use App\Enums\ReviewStatusEnum;
use App\Observers\ReviewObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(ReviewObserver::class)]
class Review extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => ReviewStatusEnum::class,
    ];

    public function jet(): BelongsTo
    {
        return $this->belongsTo(Jet::class);
    }
}
