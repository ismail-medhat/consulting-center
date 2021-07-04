<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_id');
            $table->integer('user_id');
            $table->integer('group_id')->nullable();
            $table->string('statment_price')->nullable();
            $table->integer('statment_status')->default(0);
            $table->integer('certificate_status')->default(0);
            $table->integer('payment_status')->default(0);
            $table->string('date_registerd');
            $table->string('month');
            $table->string('year');
            $table->string('skill_card_no')->nullable();
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
        Schema::dropIfExists('users_courses');
    }
}
