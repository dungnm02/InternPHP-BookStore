<?php

namespace App\Services;

use App\Models\Discount;

interface DiscountService
{
    /**
     * Get the discount that is applicable to the book format, that has the highest discount percentage
     * @param int $bookFormatId
     * @return Discount
     */
    public function getApplicableDiscount($bookFormatId): Discount;
}
