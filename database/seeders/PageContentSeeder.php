<?php

namespace Database\Seeders;

use App\Models\PageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contents')->insert([
            "name" => "Hello Doraemon",
            "positionX" => "10",
            "positionY" => "20",
            "width" => "5",
            "height" => "10"
        ]);
    }
}
