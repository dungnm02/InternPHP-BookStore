<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

// TODO: Tìm cách để có thể kế thừa User
class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phoneNumber',
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'users');
    }
}
