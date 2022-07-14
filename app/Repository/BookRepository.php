<?php

namespace App\Repository;

use App\RepositoryInterface\InterfaceRepository;
use App\Models\Book;

class BookRepository implements InterfaceRepository 
{
    public function getAll() 
    {
        return Book::all();
    }

    public function getById($Id)
    {
        return Book::findOrFail($Id);
    }

    public function delete($Id) 
    {
        Book::destroy($Id);
    }

    public function create(array $Details) 
    {
        return Book::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return Book::whereId($Id)->update($newDetails);
    }

    public function getFulfilled() 
    {
        return Book::where('is_fulfilled', true);
    }
}
