<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRecruitmentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_recruitment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('recruitment_id');
            $table->boolean('is_accepted')
                  ->default(false);
            $table->integer('user_status');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')
                  ->nullable();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            $table->foreign('recruitment_id')
                  ->references('id')
                  ->on('recruitment');
//
//            $table->unique(['user_id', 'recruitment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_recruitment');
    }
}
