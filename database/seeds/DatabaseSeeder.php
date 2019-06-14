<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class,5)->create()->each(function($user){
    	   factory(App\Article::class,10)->create(['user_id'=>$user->id]);
          
    
        });
    }
     // $user = factory(User::class)->create();
     //    factory(Course::class,5)->create(['user_id'=>$user->id])->each(function($course){
     //    factory(Episode::class,rand(5,20))->make()->each(function($episode,$key)use ($course){
     //        $episode->number = $key+1;
     //        $course->episodes()->save($episode);
     //    });
     //    });
}
