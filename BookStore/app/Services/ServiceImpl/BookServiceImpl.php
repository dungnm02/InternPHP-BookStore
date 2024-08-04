<?php

namespace App\Services\ServiceImpl;

use App\DTOs\BookDTO;
use App\Models\Book;
use App\Repositories\RepositoryImpl\BookRepositoryImpl;
use App\Services\BookService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BookServiceImpl implements BookService
{
    public function getAllBook(): LengthAwarePaginator
    {
        return Book::with(['authors', 'genres', 'formats', 'language', 'series', 'publisher'])->paginate(3);
    }

    public function getBookDetails(int $id): Model
    {
        return Book::with(['authors', 'genres', 'formats', 'language', 'series', 'publisher'])->find($id);
    }
}
