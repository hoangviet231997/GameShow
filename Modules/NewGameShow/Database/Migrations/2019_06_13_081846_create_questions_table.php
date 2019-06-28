<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->integer('type_question')->unsigned();
            $table->integer('type_awser')->unsigned();
            $table->string('path');
            $table->integer('group_questions_id')->unsigned();
            $table->foreign('group_questions_id')->references('id')->on('group_questions');
            $table->foreign('type_question')->references('type_questions_id')->on('type_questions');
            $table->foreign('type_awser')->references('type_awsers_id')->on('type_awsers');
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
        Schema::dropIfExists('questions');
    }
}
