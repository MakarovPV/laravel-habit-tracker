<?php

namespace Tests\Feature;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HabitTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexPage()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function testPreviousPage()
    {
        $response = $this->get('/previous');

        $response->assertOk();
    }

    public function testNextPage()
    {
        $response = $this->get('/next');

        $response->assertOk();
    }

    public function testReturnToMainPage()
    {
        $response = $this->get('/return');

        $response->assertOk();
    }

    public function testInsertNewRecord()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->post('/insert', [
            'habit_name' => 'habit1',
        ]);

        $this->assertDatabaseHas('habits', [
            'habit_name' => 'habit1',
        ]);
    }

    public function testInsertNewRecordWithoutAuth()
    {
        $this->post('/insert', [
            'habit_name' => 'habit1',
        ]);

        $this->assertDatabaseMissing('habits', [
            'habit_name' => 'habit1',
        ]);
    }

    public function testDeleteRecord()
    {
        User::factory()->create();
        $habit = Habit::factory()->create();
        $this->delete("/destroy/$habit->id");

        $this->assertSoftDeleted($habit);
    }
}
