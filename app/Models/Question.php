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
    }

    public function choices(){
        return $this->hasMany('Models\Choice');
    }
}
