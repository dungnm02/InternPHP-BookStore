<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(private Book $book)
    {
        parent::__construct();
    }

    public function index()
    {
        return view('home', [
            'books' => DB::table('books')->paginate(24),
            'genres' => DB::table('genres')->get(),
            'publishers' => DB::table('publishers')->get(),
        ]);
    }
}
