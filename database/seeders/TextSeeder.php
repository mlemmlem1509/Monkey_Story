<?php

namespace Database\Seeders;

use App\Models\Text;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('texts')->insert([
            "name" => "Hello",
            "positionX" => "1000",
            "positionY" => "2000"
        ]);
    }
}
