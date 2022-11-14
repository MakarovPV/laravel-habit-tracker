<?php

namespace App\Observers;

use App\Models\Habit;
use App\Models\DaysOfHabit;

class HabitObserver
{
    /**
     * Создание поля со статусом привычки при добавлении новой привычки
     * @param Habit $habit
     * @return mixed
     */
    public function created(Habit $habit)
    {
        return DaysOfHabit::create([
            'habit_id' => $habit->id,
        ]);
    }
}
