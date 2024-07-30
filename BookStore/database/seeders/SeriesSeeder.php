<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Harry Potter series
        DB::table('series')->insert([
            'series_name' => 'Harry Potter',
            'description' => 'Harry Potter is a series of seven fantasy novels written by British author J. K. Rowling. The novels chronicle the lives of a young wizard, Harry Potter, and his friends Hermione Granger and Ron Weasley, all of whom are students at Hogwarts School of Witchcraft and Wizardry. The main story arc concerns Harry\'s struggle against Lord Voldemort, a dark wizard who intends to become immortal, overthrow the wizard governing body known as the Ministry of Magic and subjugate all wizards and Muggles (non-magical people).',
            'series_cover_image' => 'null'
        ]);

        // The Lord of the Rings series
        DB::table('series')->insert([
            'series_name' => 'The Lord of the Rings',
            'description' => 'The Lord of the Rings is an epic high-fantasy novel written by English author and scholar J. R. R. Tolkien. The story began as a sequel to Tolkien\'s 1937 children\'s book The Hobbit, but eventually developed into a much larger work. Written in stages between 1937 and 1949, The Lord of the Rings is one of the best-selling novels ever written, with over 150 million copies sold.',
            'series_cover_image' => 'null'
        ]);

        // The Hitchhiker's Guide to the Galaxy series
        DB::table('series')->insert([
            'series_name' => 'The Hitchhiker\'s Guide to the Galaxy',
            'description' => 'The Hitchhiker\'s Guide to the Galaxy is a comedy science fiction series created by Douglas Adams. Originally a radio comedy broadcast on BBC Radio 4 in 1978, it was later adapted to other formats, including stage shows, novels, comic books, a 1981 TV series, a 1984 video game, and 2005 feature film.',
            'series_cover_image' => 'null'
        ]);

        // The Chicken Soup for the Soul series
        DB::table('series')->insert([
            'series_name' => 'Chicken Soup for the Soul',
            'description' => 'Chicken Soup for the Soul is a series of books, usually featuring a collection of short, inspirational stories and motivational essays. The 101 stories in the first book of the series were compiled by motivational speakers Jack Canfield and Mark Victor Hansen. There have been numerous volumes of Chicken Soup issued.',
            'series_cover_image' => 'null'
        ]);
    }
}
