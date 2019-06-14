<?php

namespace App;

//use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //use Sluggable;

    protected $fillable = ['id' , 'name','slug'];
    
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    // public function getRouteKeyName()
    // {
    //     return 'id';
    // }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    // public function sluggable()
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'name'
    //         ]
    //     ];
    // }
    public function getCreatedAtAttribute($value){
       return jdate($value)->ago();
    } 
    public function getUpdatedAtAttribute($value){
       return jdate($value)->ago();
    }
}
