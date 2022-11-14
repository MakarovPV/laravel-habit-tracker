<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaysOfHabit extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['habit_id', 'habit_status'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function habit()
    {
        return $this->belongsTo(Habit::class, 'habit_id');
    }
}
