<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;

interface BookRepository
{
    /**
     * Get all books paginated
     * @return LengthAwarePaginator
     */
    public function getAllBooks();

    /**
     * Get a book by its id
     * @param $id
     * @return Book
     */
    public function getBookById($id);

}
