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
            $table->bigIncrements('id');
            $table->string('nickname', 20);
            $table->integer('gender');
            $table->integer('prefecture');
            $table->date('birthday');
            $table->string('email', 100)
                  ->unique();
            $table->timestamp('email_verified_at')
                  ->nullable();
            $table->string('password', 255);
            $table->rememberToken();
            $table->timestamp('created_at');
            $table->timestamp('updated_at')
                  ->nullable();
            $table->integer('update_id')
                  ->nullable();
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
