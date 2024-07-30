<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AuthorSeeder::class,
            SeriesSeeder::class,
            LanguageSeeder::class,
            GenreSeeder::class,
            FormatSeeder::class,
            PublisherSeeder::class,
            BookSeeder::class,
            AuthorBookSeeder::class,
            BookGenreSeeder::class,
            BookFormatSeeder::class,
        ]);
    }
}
