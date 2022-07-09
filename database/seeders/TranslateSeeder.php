<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
                    'path' => Factory::create()->randomElement(Storage::files('/public/tmp/translate')),
                    'created_at' => Factory::create()->dateTime(),
                    'updated_at' => Factory::create()->dateTime(),
                ]);
        }

    }
}
