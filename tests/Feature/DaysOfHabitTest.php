<?php

namespace Tests\Feature;

use App\Models\DaysOfHabit;
use App\Models\Habit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DaysOfHabitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateHabit()
    {
        $habitId = Habit::factory()->create()->id;
        $response = $this->post("/update/$habitId", [
            'habit_status'=>'111111111111111111111111111111',
        ]);

        $response->assertOk();
    }
}
