<?php

namespace Database\Seeders;

use App\Models\Category;
use \App\Models\User;
use \App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        Category::truncate();
//        User::truncate();
//        Post::truncate();
        $user = User::factory()->create([
            'name' =>'John Doe',
        ]);
        Post::factory(5)->create([
            'user_id' =>$user->id
        ]);
//         $user = User::factory()->create();
//         $personal = Category::create([
//             'name' => 'Personal',
//             'slug' => 'personal'
//         ]);
//        $family = Category::create([
//            'name' => 'Family',
//            'slug' => 'family'
//        ]);
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work'
//        ]);
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $family->id,
//            'title' => 'My Family Post',
//            'excerpt' => 'Excerpt for my post'
//            ,'body' => 'This is a body',
//            'slug' => 'my-family-post',
//       ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $work->id,
//            'title' => 'My Work Post',
//            'excerpt' => 'Excerpt for my post'
//            ,'body' => 'This is a body',
//            'slug' => 'my-work-post',
//        ]);
    }
}
