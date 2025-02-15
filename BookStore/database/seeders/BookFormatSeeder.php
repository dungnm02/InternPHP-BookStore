<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // All books are in English
        DB::table('book_format')->insert([
            'book_id' => 1,
            'format_id' => 1,
            'price' => 100000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 2,
            'format_id' => 1,
            'price' => 100000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);

        DB::table('book_format')->insert([
            'book_id' => 3,
            'format_id' => 1,
            'price' => 100000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);

        DB::table('book_format')->insert([
            'book_id' => 4,
            'format_id' => 1,
            'price' => 100000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);

        DB::table('book_format')->insert([
            'book_id' => 5,
            'format_id' => 1,
            'price' => 100000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);

        DB::table('book_format')->insert([
            'book_id' => 6,
            'format_id' => 1,
            'price' => 100000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);

        DB::table('book_format')->insert([
            'book_id' => 7,
            'format_id' => 1,
            'price' => 100000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 8,
            'format_id' => 1,
            'price' => 100000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);

        // format_id 2
        DB::table('book_format')->insert([
            'book_id' => 1,
            'format_id' => 2,
            'price' => 200000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 2,
            'format_id' => 2,
            'price' => 200000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 3,
            'format_id' => 2,
            'price' => 200000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 4,
            'format_id' => 2,
            'price' => 200000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 5,
            'format_id' => 2,
            'price' => 200000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 6,
            'format_id' => 2,
            'price' => 200000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 7,
            'format_id' => 2,
            'price' => 200000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 8,
            'format_id' => 2,
            'price' => 200000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);

        // format_id 3
        DB::table('book_format')->insert([
            'book_id' => 1,
            'format_id' => 3,
            'price' => 75000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 2,
            'format_id' => 3,
            'price' => 75000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 3,
            'format_id' => 3,
            'price' => 75000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 4,
            'format_id' => 3,
            'price' => 75000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 5,
            'format_id' => 3,
            'price' => 75000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 6,
            'format_id' => 3,
            'price' => 75000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 7,
            'format_id' => 3,
            'price' => 75000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 8,
            'format_id' => 2,
            'price' => 200000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);

        // format_id 4
        DB::table('book_format')->insert([
            'book_id' => 1,
            'format_id' => 4,
            'price' => 50000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 2,
            'format_id' => 4,
            'price' => 50000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 3,
            'format_id' => 4,
            'price' => 50000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 4,
            'format_id' => 4,
            'price' => 50000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 5,
            'format_id' => 4,
            'price' => 50000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 6,
            'format_id' => 4,
            'price' => 50000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 7,
            'format_id' => 4,
            'price' => 50000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10
        ]);
        DB::table('book_format')->insert([
            'book_id' => 8,
            'format_id' => 4,
            'price' => 50000,
            'publication_date' => '2021-01-01',
            'pages' => 100,
            'cover_Image' => 'null',
            'stock' => 10

        ]);

    }
}
