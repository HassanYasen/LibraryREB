<?php

namespace App\Repository;

use App\RepositoryInterface\InterfaceRepository;
use App\Models\categories;

class categoriesRepository implements InterfaceRepository 
{
    public function getAll() 
    {
        return categories::all();
    }

    public function getById($Id)
    {
        return categories::findOrFail($Id);
    }

    public function delete($Id) 
    {
        categories::destroy($Id);
    }

    public function create(array $Details) 
    {
        return categories::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return categories::whereId($Id)->update($newDetails);
    }

    public function getFulfilled() 
    {
        return categories::where('is_fulfilled', true);
    }
}
