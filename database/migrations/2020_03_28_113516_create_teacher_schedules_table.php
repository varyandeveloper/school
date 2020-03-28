<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_schedules', function (Blueprint $table) {
            $table->foreignId('teacher_id');
            $table->foreignId('schedule_id');
            $table->primary(['teacher_id', 'schedule_id']);
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('schedule_id')->references('id')->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_schedules');
    }
}
