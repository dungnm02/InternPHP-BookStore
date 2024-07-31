<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // All Harry Potter books in English
        DB::table('author_book')->insert([
            'author_id' => 1,
            'book_id' => 1,
            'role' => 'author'
        ]);
        DB::table('author_book')->insert([
            'author_id' => 1,
            'book_id' => 2,
            'role' => 'author'
        ]);

        // All Lord of the Rings books in English
        DB::table('author_book')->insert([
            'author_id' => 2,
            'book_id' => 3,
            'role' => 'author'
        ]);

        DB::table('author_book')->insert([
            'author_id' => 2,
            'book_id' => 4,
            'role' => 'author'
        ]);

        // All Hitchhiker's Guide to the Galaxy books in Vietnamese
        DB::table('author_book')->insert([
            'author_id' => 3,
            'book_id' => 5,
            'role' => 'author'
        ]);

        DB::table('author_book')->insert([
            'author_id' => 3,
            'book_id' => 6,
            'role' => 'author'
        ]);

        // Chicken Soup for the Soul
        DB::table('author_book')->insert([
            'author_id' => 4,
            'book_id' => 7,
            'role' => 'editor'
        ]);
        DB::table('author_book')->insert([
            'author_id' => 5,
            'book_id' => 7,
            'role' => 'editor'
        ]);
        DB::table('author_book')->insert([
            'author_id' => 6,
            'book_id' => 7,
            'role' => 'editor'
        ]);

        //TODO generate for book_id 8
    }
}
