<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'finishedDate',
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }

}
