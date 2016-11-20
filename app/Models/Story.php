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
        return $this->hasMany('Models\Choice');
    }

    public function questions(){
        return $this->hasMany('Models\Question');
    }

    public function adventures(){
        return $this->hasMany('Models\Adventure');
    }
}
