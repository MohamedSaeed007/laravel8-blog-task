<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
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
        $this->call(CreateUsersSeeder::class);
        //Tag::factory(10)->create();
        //Category::factory(10)->create();
        Article::factory(10)->has(Tag::factory()->count(3))->has(Category::factory()->count(3))->create();
        Comment::factory(10)->create();
    }
}
