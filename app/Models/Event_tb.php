<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_tb extends Model
{
    use HasFactory;

    public $table = 'event_tbs';
    public $guarded = [];
}
