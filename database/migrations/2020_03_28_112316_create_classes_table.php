<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignId('location_id');
            $table->foreignId('subject_id');
            $table->foreignId('teacher_id');
            $table->unsignedSmallInteger('duration');
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('teacher_id')->references('id')->on('teacher');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
