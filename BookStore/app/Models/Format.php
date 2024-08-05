<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    protected $fillable = [
        'formatName'
    ];
    public $timestamps = false;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_format', 'format_id', 'book_id');
    }

}
