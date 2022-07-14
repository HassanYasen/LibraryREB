<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    public function Books()
    {
       return $this->hasMany(Book::class,'category_id');
    }
}
