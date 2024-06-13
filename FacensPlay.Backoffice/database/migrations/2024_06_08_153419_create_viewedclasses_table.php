<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewedclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewed_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('class_room_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('class_room_id')->references('id')->on('class_rooms');
            $table->foreign('student_id')->references('id')->on('users');
            $table->boolean('is_checked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viewed_classes');
    }
}
