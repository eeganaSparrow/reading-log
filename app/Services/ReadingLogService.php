<?php
namespace App\Services;

use App\Models\Book;
use App\Models\Category;


class ReadingLogService{
    public function getAllBooks(){
        return Book::all();
    }
    public function getAllaCategories(){
        return Category::all();
    }
}