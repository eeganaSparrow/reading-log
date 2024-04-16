<?php
namespace App\Services;

use App\Models\Book;
use App\Models\Category;
use App\Models\Memo;

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
    public function getBookByBookId(int $bookId){
        return Book::where('id', $bookId)->first();
    }
    public function getMemosByBookId(int $bookId){
        return Memo::where('book_id', $bookId)
            ->orderBy('updated_at', 'desc')
            ->get();
    }
}