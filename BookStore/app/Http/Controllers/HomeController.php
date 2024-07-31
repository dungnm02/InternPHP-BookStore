<?php

namespace App\Http\Controllers;

use App\Services\ServiceImpl\BookServiceImpl;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    private $bookService;

    public function __construct(BookServiceImpl $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $bookDTOs = $this->bookService->getAllBookDTOs();
        return view('home', [
            'bookDTOs' => $bookDTOs
        ]);
    }
}
