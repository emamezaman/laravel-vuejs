<?php

namespace App;

//use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
    
    class Article extends Model
    {
        // use Sluggable;

        protected $fillable = [
            'user_id',
            'title',
            'slug',
            'body',
            'viewCount',
            'commentCount'
        ];

        protected $hidden = ['user_id' , 'updated_at' , 'viewCount' , 'commentCount'];

        /**
         * Return the sluggable configuration array for this model.
         *
         * @return array
         */
        // public function sluggable()
        // {
        //     return [
        //         'slug' => [
        //             'source' => 'title'
        //         ]
        //     ];
        // }

        // public function getRouteKeyName()
        // {
        //     return 'id';
        // }

        public function user()
        {
            return $this->belongsTo(User::class)
                ->select(['id','name']);
        }

        public function comments()
        {
            return $this->hasMany(Comment::class);
        }

        public function categories()
        {
            return $this->belongsToMany(Category::class)
                ->select(['id','name']);
        }

        public function getCreatedAtAttribute($value)
        {

           return jdate()->forge($value)->ago();
        }
    }
