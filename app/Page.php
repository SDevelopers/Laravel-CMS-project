<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['photo_id', 'title', 'body', 'is_active'];


    public function user(){

    	return $this->belongsTo('App\User');

    }

    public function photo(){

    	return $this->belongsTo('App\Photo');

    }

    public function placeHolder(){

        return 'http://placehold.it/200X200';

    }
}