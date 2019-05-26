<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100);
            $table->string('mount', 100);
            $table->integer('prefecture');
            $table->text('schedule');
            $table->date('date');
            $table->integer('capacity');
            $table->date('deadline');
            $table->text('requirement')
                  ->nullable();
            $table->text('belongings')
                  ->nullable();
            $table->text('notes')
                  ->nullable();
            $table->text('image_path')
                  ->nullable();
            $table->integer('gender_limit')
                  ->nullable();
            $table->integer('minimum_age')
                  ->nullable();
            $table->integer('upper_age')
                  ->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at')
                  ->nullable();
            $table->integer('create_id');
            $table->integer('update_id')
                  ->nullable();
        }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment');
    }
}
