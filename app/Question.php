<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['image','titre','Desc','ID_opt','ID_user'];
    public function option(){
        return $this->belongsTo('App\Option');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Reply(){
        return $this->belongsTo('App\Reply');
    }

    public function image(){
        return $this->hasOne(Image::class);
    }
}
