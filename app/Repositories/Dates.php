<?php

namespace App\Repositories;

use Carbon\Carbon;

//Трейт для получения информации по месяцам
trait Dates
{
    /**
     * @var
     */
    private $currentDate;

    /**
     * Получение данных по месяцу
     * @param $userId
     * @param $counter
     * @return mixed
     */
    public function getMonth($userId, $counter)
    {
      $this->currentDate = Carbon::now()->addMonth($counter);

      $dateFirstDayOfPreviousMonth =$this->currentDate
                                   ->firstOfMonth()
                                   ->toDateTimeString();

      $dateLastDayOfNextMonth = $this->currentDate
                                   ->endOfMonth()
                                   ->toDateTimeString();

      $dataByDate = $this->getHabitsByUserId($userId)
                                   ->where('created_at', '<=', $dateLastDayOfNextMonth)
                                   ->where('created_at', '>=', $dateFirstDayOfPreviousMonth)->get();

      return $dataByDate;
    }

    /**
     * Получение имени месяца в человекочитаемом формате
     * @return string
     */
    public function getMonthName()
    {
      $monthName = $this->currentDate->format('F');
      return $monthName;
    }
}
