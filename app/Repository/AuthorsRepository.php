<?php

namespace App\Repository;

use App\RepositoryInterface\InterfaceRepository;
use App\Models\Author;

class AuthorsRepository implements InterfaceRepository 
{
    public function getAll() 
    {
        return Author::all();
    }

    public function getById($Id)
    {
        return Author::findOrFail($Id);
    }

    public function delete($Id) 
    {
        Author::destroy($Id);
    }

    public function create(array $Details) 
    {
        return Author::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return Author::whereId($Id)->update($newDetails);
    }

    public function getFulfilled() 
    {
        return Author::where('is_fulfilled', true);
    }
}
