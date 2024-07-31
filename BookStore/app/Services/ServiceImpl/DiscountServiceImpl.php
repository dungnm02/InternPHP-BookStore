<?php

namespace App\Services\ServiceImpl;

use App\Models\Discount;
use DiscountService;

class DiscountServiceImpl implements DiscountService
{
    public function getAppliableDiscount($bookFormatId): \App\Models\Discount
    {
        // Get the discounts that is in active period and has the highest discount percentage
        $discount = Discount::where('book_format_id', $bookFormatId)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->orderBy('discount_percentage', 'desc')
            ->first();

        return $discount;
    }
}
