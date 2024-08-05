<?php

namespace App\Services\ServiceImpl;

use App\Models\BookFormat;
use App\Models\Discount;
use App\Services\DiscountService;

class DiscountServiceImpl implements DiscountService
{
    private BookFormat $bookFormatRepo;

    public function __construct(BookFormat $bookFormatRepo)
    {
        $this->bookFormatRepo = $bookFormatRepo;
    }

    public function getApplicableDiscount($bookFormatId): ?Discount
    {
        // Get the discount that is applicable for this book format and has the highest discount percentage
        return $this->bookFormatRepo->find($bookFormatId)->discounts()
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->orderBy('discount_percentage', 'desc')
            ->first();
    }
}
