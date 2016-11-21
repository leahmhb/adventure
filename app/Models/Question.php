<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model{
    protected $table = 'question';
    public $timestamps = false;
    protected $fillable = [
    'adventure_id', 'description'
    ];

    public function adventure(){
        return $this->belongsTo('App\Adventure');
    }//many questions may belong to one adventure

    public function choices(){
        return $this->hasMany('Models\Choice');
    }//one question has many choices

    public function story(){
        return $this->belongsTo('Models\Story');
    }//story has a question
}
