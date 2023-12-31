<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::truncate(); //بيحذف الداتا وبيضيف من جديد
//        Category::truncate();
//        Post::truncate();

        $user = User::factory()->create([
            'name' => 'Hatem Khalid'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);


//
//        $personal = Category::create([
//            'name' => 'Personal',
//            'slug' => 'personal'
//        ]);
//
//        $family = Category::create([
//            'name' => 'Family',
//            'slug' => 'family'
//        ]);
//
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work'
//        ]);
//
//        Post::create([
//           'user_id' => $user->id,
//           'category_id' => $family->id,
//           'title' => 'My Family Post',
//           'slug' => 'my-family-post',
//           'excerpt' => 'lorem thie iskd skdflsdf ',
//           'body' => 'This is a body of family post'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $work->id,
//            'title' => 'My Work Post',
//            'slug' => 'my-work-post',
//            'excerpt' => 'lorem thie iskd skdflsdf ',
//            'body' => 'This is a body of work post'
//        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
