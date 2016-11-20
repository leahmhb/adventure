<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('choice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->char('code', 1);
            $table->string('description');

            $table->foreign('question_id')->references('id')->on('question');
        });


        DB::table('choice')->insert([
            ['id' => 1,
            'question_id' => 1,
            'code' => 'A',
            'description' => 'hiking'],
            ['id' => 2,
            'question_id' => 1,
            'code' => 'B',
            'description' => 'swimming'],
            ['id' => 3,
            'question_id' => 1,
            'code' => 'C',
            'description' => 'sleeping'],
            ['id' => 4,
            'question_id' => 2,
            'code' => 'A',
            'description' => 'sunglasses'],
            ['id' => 5,
            'question_id' => 2,
            'code' => 'B',
            'description' => 'tissues'],
            ['id' => 6,
            'question_id' => 2,
            'code' => 'C',
            'description' => 'sunscreen'],
            ['id' => 7,
            'question_id' => 3,
            'code' => 'A',
            'description' => 'panic and freak out'],
            ['id' => 8,
            'question_id' => 3,
            'code' => 'B',
            'description' => 'look around where you last had the item'],
            ['id' => 9,
            'question_id' => 3,
            'code' => 'C',
            'description' => 'go on with life'],
            ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('choice');
    }
}
