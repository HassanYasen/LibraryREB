<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use App\Models\categories;

class categoriesRepository extends BaseRepository 
{
    public function __construct(){
        parent::__construct(new categories);
    }
}
