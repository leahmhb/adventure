<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('story', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('adventure_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('choice_id')->unsigned();

            $table->foreign('adventure_id')->references('id')->on('adventure');
            $table->foreign('question_id')->references('id')->on('question');
            $table->foreign('choice_id')->references('id')->on('choice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('story');
    }
}
