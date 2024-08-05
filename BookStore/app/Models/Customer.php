<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'address',
        'phone_number',
    ];

    public $timestamps = false;

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'id');
    }


}
