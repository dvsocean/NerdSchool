<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('photo_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('school')->nullable();
            $table->string('major')->nullable();
            $table->string('goal')->nullable();
            $table->string('interest')->nullable();
            $table->string('admin')->nullable();
            $table->string('notifyEmail')->nullable();
            $table->string('notifyAdditionals')->nullable();
            $table->string('verified')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
