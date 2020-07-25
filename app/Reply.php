<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['content','question_id','users_id'];
    public function Question(){
        return $this->hasOne('App/Question');
    }
    public function Comment(){
        return $this->belongsTo('App\Comments');
    }
}
