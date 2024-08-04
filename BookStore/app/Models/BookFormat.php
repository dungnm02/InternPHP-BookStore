<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookFormat extends Pivot
{
    protected $fillable = [
        'price',
        'publication_date',
        'pages',
        'cover_image',
        'stock'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'book_format_id', 'order_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'book_format_discount', 'book_format_id', 'discount_id');
    }

}
