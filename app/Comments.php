<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['content_commentaire','reply_id','user_id'];
    public function Reply(){
        return $this->hasOne('App\Reply');
    }
}
