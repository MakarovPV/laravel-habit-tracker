<?php

namespace App\Repositories;

use App\Models\DaysOfHabit;

/**
 * Class HabitRepository.
 */
class DaysOfHabitRepository extends CoreRepository
{
    /**
     * Получение доступа к модели
     * @return string
     */
    public function model()
    {
        return DaysOfHabit::class;
    }
}
