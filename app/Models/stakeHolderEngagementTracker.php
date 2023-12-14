<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class stakeHolderEngagementTracker extends Model
{
    use HasFactory;

    public $table = 'stake_holder_engagement_trackers';
    public $guarded = [];
}
