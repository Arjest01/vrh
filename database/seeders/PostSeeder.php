<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = Category::all();
        $tags = Tag::all();

        Post::factory(30)
        ->Sequence(fn () => [
            'category_id' => $categories->random(),
        ])
        ->create()
        ->each(fn ($post) => $post->tags()->attach($tags->random(rand(0,3))));
    }
}
