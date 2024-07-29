<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'publicationDate',
        'pages',
        'coverImage'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_book', 'book_id', 'author_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre', 'book_id', 'genre_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function series()
    {
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function formats()
    {
        return $this->belongsToMany(Format::class, 'book_format', 'book_id', 'format_id');
    }

    /**
     * Find books by title
     * @param $title
     */
    public function findByTitle($title)
    {
        return DB::table('books')
            ->where('title', $title)
            ->get('id');
    }

    /**
     * Find books by publication year
     * @param $publicationYear
     */
    public function findByPublicationYear($publicationYear)
    {
        return DB::table('books')
            ->where('publication_year', $publicationYear)
            ->get('id');
    }

    /**
     * Find books by author id list
     * @param $authorIds
     */
    public function findByAuthorIds($authorIds)
    {
        return $booksId = DB::table('books')
            ->join('book_author', 'books.id', '=', 'book_author.book_id')
            ->whereIn('book_author.author_id', $authorIds)
            ->groupBy('books.id')
            ->havingRaw('COUNT(DISTINCT book_author.author_id) = ?', [count($authorIds)])
            ->get('books.id');
    }

    /**
     * Find books by genre id list
     * @param $genreIds
     */
    public function findByGenreIds($genreIds)
    {
        return $booksId = DB::table('books')
            ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
            ->whereIn('book_genre.genre_id', $genreIds)
            ->groupBy('books.id')
            ->havingRaw('COUNT(DISTINCT book_genre.genre_id) = ?', [count($genreIds)])
            ->get('books.id');
    }
}
