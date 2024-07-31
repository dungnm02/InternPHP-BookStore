<?php

namespace App\Repositories\RepositoryImpl;

use App\Repositories\BookRepository;
use Illuminate\Support\Facades\DB;

class BookRepositoryImpl implements BookRepository
{
    public function getAllBooks()
    {
        return DB::table('books')->paginate(2);
    }

    public function getBookById($id)
    {
        return DB::table('books')->where('id', $id)->first();
    }
}
