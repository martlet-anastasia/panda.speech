<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TranslateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = DB::table('files')
            ->where('translated', 1)
            ->select('id')->get();

        foreach($files as $file) {
            DB::table('translates')->insert(
                [
                    'file_id' => $file->id,
                    'translated_at' => '2022-07-04 17:55:57',
                    'text' => Factory::create()->realTextBetween(50, 1000),
                ]);
        }

    }
}
