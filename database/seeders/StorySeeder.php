<?php

namespace Database\Seeders;

use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stories')->insert([
            "name" => "Doraemon",
            "authorName" => "Fujiko.F.Fujio",
            "illustratorName" => "Fujiko.F.Fujio",
            "imageID" => "1"
        ]);
    }
}
