<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use App\Models\Book;

class BookRepository extends BaseRepository 
{
    public function __construct(){
        parent::__construct(new Book);
    }
    
    public function deleteItem($Id) 
    {
        $this->model->destroy($Id);
    }
}
