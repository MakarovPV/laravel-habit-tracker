<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository.
 */
abstract class CoreRepository
{
    use Dates;

    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
	protected $model;

	public function __construct()
	{
		$this->model = app($this->model());
	}

    /**
     * Возвращение экземпляра модели
     * @return mixed
     */
    abstract protected function model();
}
