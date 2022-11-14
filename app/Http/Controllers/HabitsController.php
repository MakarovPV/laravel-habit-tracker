<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HabitRepository;
use App\Models\Habit;
use Illuminate\Support\Facades\Auth;

class HabitsController extends Controller
{
    /**
     * @var HabitRepository
     */
    private $habitRepository;

    /**
     * @param HabitRepository $habitRepository
     */
    public function __construct(HabitRepository $habitRepository)
    {
        $this->habitRepository = $habitRepository;
    }

    /**
     * Вывод списка данных на текущий месяц, либо же на месяц с отступом (указанным в сессии) от текущего
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if (!($request->session()->exists('page'))) {
            $request->session()->put('page', 0);
        }

        $page = $request->session()->get('page');
        $habits = $this->habitRepository->getMonth(Auth::id(), $page);
        $monthName = $this->habitRepository->getMonthName();

        return view('index', compact('page', 'habits', 'monthName'));
    }

    /**
     * Переход на предыдущий месяц
     * @param Request $request
     * @return void
     */
    public function previous(Request $request)
    {
        $request->session()->decrement('page');
    }

    /**
     * Переход на следующий месяц
     * @param Request $request
     * @return void
     */
    public function next(Request $request)
    {
        $request->session()->increment('page');
    }

    /**
     * Возвращение на текущий месяц
     * @param Request $request
     * @return void
     */
    public function returnToMainPage(Request $request)
    {
        $request->session()->forget('page');
    }

    /**
     * Добавление привычки
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $data = $request->input();

        $model = Habit::create([
            'user_id' => Auth::id(),
            'habit_name' => $data['habit_name'],
        ]);
    }

    /**
     * Удаление привычки
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        Habit::find($id)->delete();
    }
}
