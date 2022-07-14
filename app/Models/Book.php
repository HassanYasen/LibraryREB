<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\categories;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'author_id',
        'category_id'
    ];

    public function Authors()
    {
       return $this->belongsTo(Author::class,'author_id');
    }

    public function category()
    {
       return $this->belongsTo(categories::class,'category_id');
    }
}
