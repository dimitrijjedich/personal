<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create([
            'email_verified_at' => random_int(0, 1) ? now() : null,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Category::factory(5)->create();

        foreach (Category::all() as $category) {
            $filename = microtime() . '_' . 'water.png';
            $filepath = Storage::copy('uploads/water.png', 'uploads/' . $filename);
            Post::factory(rand(5, 10))->create([
                'image'=>$filepath,
                'category_id'=>$category->id,
            ]);
        }
    }
}
