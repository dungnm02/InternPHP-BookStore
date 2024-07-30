<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Publisher for English books
        DB::table('publishers')->insert([
            'publisher_name' => 'Penguin Random House',
        ]);

        // Publisher for books in Vietnamese
        DB::table('publishers')->insert([
            'publisher_name' => 'NXB Trẻ',
        ]);
    }
}
