<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_name')->nullable();
            $table->decimal('price', 15,4);
            $table->decimal('discount_price', 15,4);
            $table->string('cover_image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_path')->nullable();
            $table->string('folder_name')->nullable();
            $table->string('course_duration')->default(0);
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('is_new')->default(0);
            $table->integer('total_lecture')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
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
        Schema::drop('courses');
    }
}
