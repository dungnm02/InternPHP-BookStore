<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Author of the Harry Potter series
        DB::table('authors')->insert([
            'author_name' => 'J.K. Rowling',
            'bio' => 'Joanne Rowling, better known by her pen name J.K. Rowling, is a British author, film producer, television producer, screenwriter, and philanthropist. She is best known for writing the Harry Potter fantasy series, which has won multiple awards and sold more than 500 million copies, becoming the best-selling book series in history.',
            'author_image' => 'null'
        ]);

        // Author of The Lord of the Rings series
        DB::table('authors')->insert([
            'author_name' => 'J.R.R. Tolkien',
            'bio' => 'John Ronald Reuel Tolkien was an English writer, poet, philologist, and academic, best known as the author of the high fantasy works The Hobbit and The Lord of the Rings.',
            'author_image' => 'null'
        ]);

        // Author of The Hitchhiker's Guide to the Galaxy series
        DB::table('authors')->insert([
            'author_name' => 'Douglas Adams',
            'bio' => 'Douglas Noel Adams was an English author, screenwriter, essayist, humorist, satirist, and dramatist. Adams was author of The Hitchhiker\'s Guide to the Galaxy, which originated in 1978 as a BBC radio comedy before developing into a "trilogy" of five books that sold more than 15 million copies in his lifetime and generated a television series, several stage plays, comics, a computer game, and in 2005 a feature film.',
            'author_image' => 'null'
        ]);

        // Authors of The Chicken Soup for the Soul series
        DB::table('authors')->insert([
            'author_name' => 'Jack Canfield',
            'bio' => 'Jack Canfield is an American author, motivational speaker, corporate trainer, and entrepreneur. He is the co-author of the Chicken Soup for the Soul series, which has more than 250 titles and 500 million copies in print in over 40 languages.',
            'author_image' => 'null'
        ]);
        DB::table('authors')->insert([
            'author_name' => 'Mark Victor Hansen',
            'bio' => 'Mark Victor Hansen is an American inspirational and motivational speaker, trainer, and author. He is best known as the founder and co-creator of the "Chicken Soup for the Soul" book series, with more than 500 million books sold.',
            'author_image' => 'null'
        ]);
        DB::table('authors')->insert([
            'author_name' => 'Amy Newmark',
            'bio' => 'Amy Newmark is the author, editor-in-chief, and publisher of the Chicken Soup for the Soul book series. Since 2008, she has published more than 100 new books, most of them national bestsellers in the U.S. and Canada, more than doubling the number of Chicken Soup for the Soul titles in print today.',
            'author_image' => 'null'
        ]);

    }
}
