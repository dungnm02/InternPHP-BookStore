<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Language for English books
        DB::table('languages')->insert([
            'language_name' => 'English',
        ]);

        // Language for books in Vietnamese
        DB::table('languages')->insert([
            'language_name' => 'Vietnamese',
        ]);
    }
}
