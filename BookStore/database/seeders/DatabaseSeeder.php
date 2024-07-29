<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Seeding the genres table
        DB::table('genres')->insert([
            'genreName' => 'Fiction',
        ]);
        DB::table('genres')->insert([
            'genreName' => 'Non-Fiction',
        ]);
        DB::table('genres')->insert([
            'genreName' => 'Science Fiction',
        ]);
        DB::table('genres')->insert([
            'genreName' => 'Fantasy',
        ]);
        DB::table('genres')->insert([
            'genreName' => 'Mystery',
        ]);

        //Seeding the authors table
        DB::table('authors')->insert([
            'authorName' => 'John Doe',
            'biography' => 'John Doe is a writer.',
            'author_image_path' => 'author_image_path',
        ]);
        DB::table('authors')->insert([
            'authorName' => 'Jane Doe',
            'biography' => 'Jane Doe is a writer.',
            'author_image_path' => 'author_image_path',
        ]);
        DB::table('authors')->insert([
            'authorName' => 'John Smith',
            'biography' => 'John Smith is a writer.',
            'author_image_path' => 'author_image_path',
        ]);
        DB::table('authors')->insert([
            'authorName' => 'Jane Smith',
            'biography' => 'Jane Smith is a writer.',
            'author_image_path' => 'author_image_path',
        ]);
        DB::table('authors')->insert([
            'authorName' => 'John Johnson',
            'biography' => 'John Johnson is a writer.',
            'author_image_path' => 'author_image_path',
        ]);


        for ($i = 1; $i <= 5; $i++) {
            DB::table('books')->insert([
                'title' => Str::random(3),
                'price' => rand(100, 1000),
                'publication_year' => rand(2000, 2022),
                'description' => Str::random(100),
                'cover_image_path' => Str::random(10),
            ]);
        }

        //Seeding the book_author table
        DB::table('book_author')->insert([
            'book_id' => 1,
            'author_id' => 1,
        ]);
        DB::table('book_author')->insert([
            'book_id' => 2,
            'author_id' => 2,
        ]);
        DB::table('book_author')->insert([
            'book_id' => 3,
            'author_id' => 3,
        ]);
        DB::table('book_author')->insert([
            'book_id' => 4,
            'author_id' => 4,
        ]);
        DB::table('book_author')->insert([
            'book_id' => 5,
            'author_id' => 5,
        ]);

        //Seeding the book_genre table
        DB::table('book_genre')->insert([
            'book_id' => 1,
            'genre_id' => 1,
        ]);
        DB::table('book_genre')->insert([
            'book_id' => 2,
            'genre_id' => 2,
        ]);
        DB::table('book_genre')->insert([
            'book_id' => 3,
            'genre_id' => 3,
        ]);
        DB::table('book_genre')->insert([
            'book_id' => 4,
            'genre_id' => 4,
        ]);
        DB::table('book_genre')->insert([
            'book_id' => 5,
            'genre_id' => 5,
        ]);
    }
}
