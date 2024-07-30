<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // All Harry Potter books in English
        DB::table('books')->insert([
            'title' => 'Harry Potter and the Philosopher\'s Stone',
            'description' => 'Harry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle',
            'series_id' => 1,
            'language_id' => 1,
            'publisher_id' => 1,
        ]);
        DB::table('books')->insert([
            'title' => 'Harry Potter and the Chamber of Secrets',
            'description' => 'The Dursleys were so mean and hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he\'s packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike.',
            'series_id' => 1,
            'language_id' => 1,
            'publisher_id' => 1,
        ]);

        // All Lord of the Rings books in English
        DB::table('books')->insert([
            'title' => 'The Fellowship of the Ring',
            'description' => 'The first volume in J.R.R. Tolkien\'s epic adventure THE LORD OF THE RINGS One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkness bind them',
            'series_id' => 2,
            'language_id' => 1,
            'publisher_id' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'The Two Towers',
            'description' => 'The second volume in J.R.R. Tolkien\'s epic adventure THE LORD OF THE RINGS One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkness bind them',
            'series_id' => 2,
            'language_id' => 1,
            'publisher_id' => 1,
        ]);

        // All Hitchhiker's Guide to the Galaxy books in Vietnamese
        DB::table('books')->insert([
            'title' => 'The Hitchhiker\'s Guide to the Galaxy',
            'description' => 'Seconds before the Earth is demolished to make way for a galactic freeway, Arthur Dent is plucked off the planet by his friend Ford Prefect, a researcher for the revised edition of The Hitchhiker\'s Guide to the Galaxy who',
            'series_id' => 3,
            'language_id' => 2,
            'publisher_id' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'The Restaurant at the End of the Universe',
            'description' => 'Facing annihilation at the hands of the warlike Vogons? Time for a cup of tea! Join the cosmically displaced Arthur Dent and his uncommon comrades in arms in their desperate search for a place to eat, as they hurtle across space powered by pure improbability.',
            'series_id' => 3,
            'language_id' => 2,
            'publisher_id' => 1,
        ]);

        // Chicken Soup for the Soul in Vietnamese
        DB::table('books')->insert([
            'title' => 'Chicken Soup for the Soul 1',
            'description' => 'This book is a collection of short stories and motivational essays that have been collected from around the world. The stories are meant to inspire and motivate the reader to be the best they can be.',
            'series_id' => 4,
            'language_id' => 2,
            'publisher_id' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'Chicken Soup for the Soul 2',
            'description' => 'This book is a collection of short stories and motivational essays that have been collected from around the world. The stories are meant to inspire and motivate the reader to be the best they can be.',
            'series_id' => 4,
            'language_id' => 2,
            'publisher_id' => 1,
        ]);
    }
}
