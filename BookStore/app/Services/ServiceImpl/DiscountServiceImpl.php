<?php

namespace App\Services\ServiceImpl;

use App\Models\Discount;
use App\Services\DiscountService;

class DiscountServiceImpl implements DiscountService
{
    public function getAppliableDiscount($bookFormatId)
    {
        // Get the discounts that is in active period and has the highest discount percentage
        $discount = Discount::join('book_format_discount', 'discounts.id', '=', 'book_format_discount.discount_id')
            ->where('book_format_discount.book_format_id', $bookFormatId)
            ->where('discounts.start_date', '<=', now())
            ->where('discounts.end_date', '>=', now())
            ->orderBy('discounts.discount_percentage', 'desc')
            ->first();
        return $discount;
    }
}
