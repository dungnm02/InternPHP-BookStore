<?php

namespace App\Services\ServiceImpl;

use App\DTOs\BookDTO;
use App\Repositories\RepositoryImpl\BookRepositoryImpl;
use App\Services\BookService;
use Illuminate\Support\Facades\DB;

class BookServiceImpl implements BookService
{

    private $bookRepository;

    public function __construct(BookRepositoryImpl $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBookDTOs()
    {
        $books = $this->bookRepository->getAllBooks();
        $bookDTOs = [];

        foreach ($books as $book) {
            $bookDTO = $this->getBookDTOById($book->id);
            $bookDTOs[] = $bookDTO;
        }

        return new \Illuminate\Pagination\LengthAwarePaginator(
            $bookDTOs,
            $books->total(),
            $books->perPage(),
            $books->currentPage(),
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

    /**
     * Get a book with its related data, packaged in BookDTO
     * @param $id
     * @return BookDTO
     */
    public function getBookDTOById($id)
    {
        $book = $this->bookRepository->getBookById($id);
        $authors = DB::table('authors')
            ->join('author_book', 'authors.id', '=', 'author_book.author_id')
            ->where('author_book.book_id', '=', $book->id)
            ->select('authors.author_name', 'authors.author_image', 'author_book.role')
            ->get();
        $genres = DB::table('genres')
            ->join('book_genre', 'genres.id', '=', 'book_genre.genre_id')
            ->where('book_genre.book_id', '=', $book->id)
            ->select('genres.genre_name')
            ->get();
        $bookFormats = DB::table('formats')
            ->join('book_format', 'formats.id', '=', 'book_format.format_id')
            ->where('book_format.book_id', '=', $book->id)
            ->select('formats.format_name', 'book_format.price', 'book_format.published_date', 'book_format.pages', 'book_format.cover_image')
            ->get();
        $language = DB::table('languages')
            ->where('id', '=', $book->language_id)
            ->first();
        $series = DB::table('series')
            ->where('id', '=', $book->series_id)
            ->first();
        $publisher = DB::table('publishers')
            ->where('id', '=', $book->publisher_id)
            ->first();

        $bookDTO = new BookDTO();
        $bookDTO->setBook($book);
        $bookDTO->setAuthors($authors);
        $bookDTO->setGenres($genres);
        $bookDTO->setPublisher($publisher);
        $bookDTO->setLanguage($language);
        $bookDTO->setSeries($series);
        $bookDTO->setBookFormats($bookFormats);
        return $bookDTO;
    }
}
