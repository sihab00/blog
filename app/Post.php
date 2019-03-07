<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Cetegory');
    }
    public function Tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
    public function Comments()
    {
    	return $this->hasMany('App\Comment');
    }
}
