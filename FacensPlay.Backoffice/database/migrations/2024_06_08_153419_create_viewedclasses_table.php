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
        // Schema::create('viewedclasses', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->foreign('class_id')->references('id')->on('classes');
        //     $table->foreign('student_id')->references('id')->on('users');
        //     $table->boolean('is_watched');
        //     $table->timestamps();
        // });

        Schema::table('viewedclasses', function (Blueprint $table) {
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('student_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viewedclasses');
    }
}
