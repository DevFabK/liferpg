<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserStat extends Model
{
    protected $fillable = [
        'user_id',
        'level',
        'xp',
        'physical',
        'intellect',
        'discipline',
        'social',
        'creativity',
        'wellbeing'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addXp(int $amount): void
    {
        $this->xp += $amount;

        while ($this->xp >= $this->xpToNextLevel()) {
            $this->xp -= $this->xpToNextLevel();
            $this->level++;
        }

        $this->save();
    }

    public function xpToNextLevel(): int
    {
        return (int) (100 * pow($this->level, 1.5));
    }
}
