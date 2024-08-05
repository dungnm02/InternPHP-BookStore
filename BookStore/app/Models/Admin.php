<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
