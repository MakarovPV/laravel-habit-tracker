<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysOfHabitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days_of_habits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('habit_id');
            $table->string('habit_status')->default('000000000000000000000000000000');
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('habit_id')->references('id')->on('habits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days_of_habits');
    }
}
