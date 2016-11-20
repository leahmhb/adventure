<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adventure extends Model{
   protected $table = 'adventure';
   public $timestamps = false;
   protected $fillable = [
   'description'
   ];

     public function questions(){
        return $this->hasMany('Models\Question');
    }
}
