<?php

namespace App\Repositories;

use App\Models\Habit;

/**
 * Class HabitRepository.
 */
class HabitRepository extends CoreRepository
{
    /**
     * Получение доступа к модели
     * @return string
     */
    public function model()
    {
        return Habit::class;
    }

    /**
     * Получение списка привычек
     * @param int $id
     * @return mixed
     */
    public function getHabitsByUserId($id)
    {
    	return $this->model->select('id', 'habit_name')->where('user_id', $id)->with('daysOfHabit');
    }

}
