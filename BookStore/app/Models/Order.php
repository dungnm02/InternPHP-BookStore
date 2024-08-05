<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'createdDate',
        'shippingAddress',
        'shippingPhoneNumber',
        'shippingPrice',
        'taxes',
        'customerNote'
    ];

    public $timestamps = false;


    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function shippingType()
    {
        return $this->belongsTo(ShippingType::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function bookFormats()
    {
        return $this->belongsToMany(BookFormat::class, 'order_details', 'order_id', 'book_format_id');
    }
}
