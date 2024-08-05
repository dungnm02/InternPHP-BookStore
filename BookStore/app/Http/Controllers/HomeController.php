<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Services\ServiceImpl\BookServiceImpl;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    private BookService $bookService;

    public function __construct(BookServiceImpl $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index() : View
    {
        $books = $this->bookService->getAllBook();
        return view('home', [
            'books' => $books
        ]);
    }
}
