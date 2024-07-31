<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface BookService
{
    /**
     * Get all books with theirs related data, packaged in BookDTO, then paginated
     * @return LengthAwarePaginator
     */
    public function getAllBookDTOs();
}
