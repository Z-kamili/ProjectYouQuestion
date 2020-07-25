<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path'];

    public function question(){

        return $this->belongsTo(Question::class);

    }
}
