<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [ 'created_at' , 'updated_at'];


    public function user()
    {
        return $this->belongsTo(User::class)->select(['id','name']);
    }

    public function getCreatedAtAttribute($value){
    	return jdate($value)->ago();
    }
}
