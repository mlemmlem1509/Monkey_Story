<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PageContent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StorySeeder::class);
        $this->call(PageSeeder::class);
        $this->call(TextSeeder::class);
        $this->call(PageContentSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(AudioSeeder::class);
        $this->call(UserSeeder::class);
    }
}
