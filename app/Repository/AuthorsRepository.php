<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use App\Models\Author;

class AuthorsRepository extends BaseRepository
{
    public function __construct(){
        parent::__construct(new Author);
    }
}
