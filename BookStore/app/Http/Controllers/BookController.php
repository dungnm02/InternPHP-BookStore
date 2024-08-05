<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Services\ServiceImpl\BookServiceImpl;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
    private BookService $bookService;

    public function __construct(BookServiceImpl $bookService)
    {
        $this->bookService = $bookService;
    }

    public function getBookDetails($bookId)
    {
        $book = $this->bookService->getBookDetails($bookId);
        return view('book-details', [
            'book' => $book
        ]);
    }


}
