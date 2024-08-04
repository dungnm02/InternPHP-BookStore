<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface BookService
{
    /**
     * Get all books with theirs related data, paginated
     * @return LengthAwarePaginator
     */
    public function getAllBook(): LengthAwarePaginator;

}
