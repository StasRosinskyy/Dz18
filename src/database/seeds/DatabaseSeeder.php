<?php

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
        $faker = \Faker\Factory::create();
        $users = [
            ['name' => 'Stanislav Rosinskyy', 'email' => 'stanislav.rosinskyy@gmail.com', 'password' => \Illuminate\Support\Facades\Hash::make('stanislav'),
                'remember_token' => \Illuminate\Support\Str::random(10)],
            ['name' => 'Jhon Doe', 'email' => 'doe@gmail.com', 'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'remember_token' => \Illuminate\Support\Str::random(10)],
        ];
        factory(App\User::class, 2)->create();
        $comments = [
            ['user_id' => rand(1, 2), 'post_id' => 1, 'comment' => 'Wow, its...!'],
            ['user_id' => rand(1, 2), 'post_id' => 1, 'comment' => 'Wow, its...!'],
            ['user_id' => rand(1, 2), 'post_id' => 1, 'comment' => 'Wow, its...!'],
            ['user_id' => rand(1, 2), 'post_id' => 1, 'comment' => 'Wow, its...!'],
            ['user_id' => rand(1, 2), 'post_id' => 1, 'comment' => 'Wow, its...!'],
            ['user_id' => rand(1, 2), 'post_id' => 1, 'comment' => 'Wow, its...!']
        ];
        $categories = [
            ['name' => 'Features', 'slug' => 'features'],
            ['name' => 'Food', 'slug' => 'food'],
            ['name' => 'Travel', 'slug' => 'travel'],
            ['name' => 'Recipe', 'slug' => 'recipe'],
            ['name' => 'Bread', 'slug' => 'bread'],
            ['name' => 'Breakfast', 'slug' => 'breakfast'],
            ['name' => 'Meat', 'slug' => 'meat'],
            ['name' => 'Fastfood', 'slug' => 'fastfood'],
            ['name' => 'Salad', 'slug' => 'salad'],
            ['name' => 'Soup', 'slug' => 'soup'],
        ];
        $tags = [
            ['name' => 'Creative', 'slug' => 'creative', 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
            ['name' => 'Unique', 'slug' => 'unique', 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
            ['name' => 'Template', 'slug' => 'template', 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
            ['name' => 'Photography', 'slug' => 'photography', 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
            ['name' => 'Travel', 'slug' => 'travel', 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
            ['name' => 'Lifestyle', 'slug' => 'lifestyle', 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
            ['name' => 'Wordpress Template', 'slug' => 'wordpress_template', 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
            ['name' => 'Food', 'slug' => 'food', 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
            ['name' => 'Idea', 'slug' => 'idea', 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')],
        ];
        DB::table('users')->insert($users);
        DB::table('categories')->insert($categories);
        DB::table('tags')->insert($tags);
        factory(App\Post::class, 100)->create();
        $posts = \App\Post::all();
        foreach ($posts as $post){
            $limit = rand(3, 6);
            $tags = \App\Tag::inRandomOrder()
                ->limit($limit)
                ->get();
            $post_tag = [];
            foreach ($tags as $tag){
                $post_tag[] = ['post_id' => $post->id, 'tag_id' => $tag->id, 'created_at' => date('Y-m-d'), 'updated_at' => date('Y-m-d')];
            }
            DB::table('post_tag')->insert($post_tag);
        }
        DB::table('comments')->insert($comments);

    }

}
