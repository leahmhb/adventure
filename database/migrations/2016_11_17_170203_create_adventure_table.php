<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdventureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('adventure', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
        });

        DB::table('adventure')->insert([
            ['id' => 1, 'description' => 'gone awry'],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('adventure');
   }
}
