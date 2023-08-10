<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $audioDir = "storage/app/public/audios";
        $audios = array_diff(scandir($audioDir), array('.', '..'));

        foreach ($audios as $audio){
            DB::table('audios')->insert([
                'name' => $audio,
                'path' => $audioDir . "/" . $audio
            ]);
        }
    }
}
