<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaysOfHabit;

class DaysOfHabitsController extends Controller
{
    /**
     * Обновление статуса привычки
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();

        $model = DaysOfHabit::where('habit_id', $id)
                            ->update(['habit_status' => $data['habit_status']]);
    }
}
