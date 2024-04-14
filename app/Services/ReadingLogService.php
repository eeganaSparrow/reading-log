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
    public function getBooksByCategoryId(int $categoryId){
        return Book::where('category_id', $categoryId)
            ->orderBy('updated_at', 'desc')
            ->get();
    }
    public function getOneCategory(int $categoryId){
        return Category::where('id', $categoryId)->first();
    }
}