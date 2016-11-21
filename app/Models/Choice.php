<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model{
 protected $table = 'choice';
 public $timestamps = false;
 protected $fillable = [
 'question_id', 'code', 'description'
 ];

 public function question(){
    return $this->belongsTo('App\Question');
    }//many choices may belong to one question

    public function story(){
        return $this->belongsTo('Models\Story');
    }//story has a choice
}
