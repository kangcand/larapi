<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','content'];

    public function scopeLatestFirst($query)
    {
    	return $query->orderBy('id','desc');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
