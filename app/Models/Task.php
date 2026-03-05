<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'xp_reward',
        'completed',
        'completed_at',
        'daily_limit',
        'times_done'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}