<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('adventure_id')->unsigned();
            $table->string('description');


            $table->foreign('adventure_id')->references('id')->on('adventure');
        });

        DB::table('question')->insert([
            ['id' => 1, 'adventure_id' => 1, 'description' => 'Which of the following is your preferred outdoor activity?'],
            ['id' => 2, 'adventure_id' => 1, 'description' => 'Which of the following items do you have in your car?'],
            ['id' => 3, 'adventure_id' => 1, 'description' => 'How do you react when you forget something?'],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
