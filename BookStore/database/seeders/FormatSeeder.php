<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Format for English books
        DB::table('formats')->insert([
            'format_name' => 'Hardcover',
        ]);

        DB::table('formats')->insert([
            'format_name' => 'Paperback',
        ]);

        DB::table('formats')->insert([
            'format_name' => 'E-book',
        ]);

        DB::table('formats')->insert([
            'format_name' => 'Audiobook',
        ]);
    }
}
