<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // All genre should be in English
        DB::table('genres')->insert([
            'genre_name' => 'Fantasy',
            'description' => 'Fantasy is a genre of speculative fiction set in a fictional universe, often inspired by real world myth and folklore. Its roots are in oral traditions, which then became literature and drama. From the twentieth century it has expanded further into various media, including film, television, graphic novels, and video games.',
        ]);

        DB::table('genres')->insert([
            'genre_name' => 'Adventure',
            'description' => 'An adventure is an exciting or unusual experience. It can be risky, exhilarating, bold and exuberant. It can include; sky diving, travelling or extreme sports. But that was just a list of some outdoorsy activities. However, adventure can include indulging in a thrilling movie, writing an exciting story or simply, reading an adventure book.',
        ]);

        DB::table('genres')->insert([
            'genre_name' => 'Mystery',
            'description' => 'Mystery fiction is a genre of fiction usually involving a mysterious death or a crime to be solved. Often with a closed circle of suspects, each suspect is usually provided with a credible motive and a reasonable opportunity for committing the crime. The central character will often be a detective who eventually solves the mystery by logical deduction from facts presented to the reader.',
        ]);

        DB::table('genres')->insert([
            'genre_name' => 'Epic',
            'description' => 'An epic is a long narrative poem that is usually about heroic deeds and events that are significant to the culture of the poet. Many ancient writers used epic poetry to tell tales of intense adventures and heroic feats. The epic hero is the central character of an epic, a larger-than-life figure who embodies the ideals'
        ]);

        DB::table('genres')->insert([
            'genre_name' => 'Comedy',
            'description' => 'Comedy is a genre of fiction that consists of discourses or works intended to be humorous or amusing by inducing laughter, especially in theatre, film, stand-up comedy, television, radio, books, or any other entertainment medium. The term originated in ancient Greece: in Athenian democracy, the public opinion of voters was influenced by political satire performed by comic poets in theaters.'
        ]);

        DB::table('genres')->insert([
            'genre_name' => 'Science Fiction',
            'description' => 'Science fiction is a genre of speculative fiction that typically deals with imaginative and futuristic concepts such as advanced science and technology, space exploration, time travel, parallel universes, and extraterrestrial life. It has been called the "literature of ideas", and often explores the potential consequences of scientific, social, and technological innovations.'
        ]);

        DB::table('genres')->insert([
            'genre_name' => 'Self-help',
            'description' => 'Self-help or self-improvement is a self-guided improvement—economically, intellectually, or emotionally—often with a substantial psychological basis. Many different self-help group programs exist, each with its own focus, techniques, associated beliefs, proponents and in some cases, leaders. Concepts and terms originating in self-help culture and Twelve-Step culture, such as recovery, dysfunctional families, and codependency have become firmly integrated in mainstream language.'
        ]);
    }
}
