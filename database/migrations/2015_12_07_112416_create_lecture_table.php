<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lecture_name');
            $table->string('cover_image');
            $table->string('image_path');
            $table->string('video_file')->nullable();
            $table->string('video_file_path')->nullable();
            $table->string('video_duration')->nullable();
            $table->string('video_size')->nullable();
            $table->string('video_bit_rate')->nullable();
            $table->integer('course_id');
            $table->integer('total_viewed')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::drop('lectures');
    }
}
