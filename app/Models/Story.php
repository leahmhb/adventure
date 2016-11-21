<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model{
    protected $table = 'story';
    public $timestamps = false;
    protected $fillable = [
    'adventure_id',
    'question_id',
    'choice_id',
    ];

    public function choices(){
        return $this->hasOne('Models\Choice');
    }//one story has one choice

    public function questions(){
        return $this->hasOne('Models\Question');
    }//one story has one question

    public function adventures(){
        return $this->hasOne('Models\Adventure');
    }//one story has one adventure
}
