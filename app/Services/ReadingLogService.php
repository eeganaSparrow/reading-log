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
    public static function mbTrim($pString){
        return preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $pString);
    }
    public function getSearchBooks($search_str){
        $string = $this->mbTrim($search_str);
        return Book::where('tytle','like', "%{$string}%" )
            ->orWhere('author', 'like', "%{$string}%" )
            ->get();
    }
    public function getSearchBooksInCategory($search_str, $categoryId){
        $string = $this->mbTrim($search_str);
        return Book::where('category_id', $categoryId)
            ->where('tytle','like', "%{$string}%" )
            ->orwhere('category_id', $categoryId)
            ->where('author', 'like', "%{$string}%" )
            ->get();
    }
    public function getMemoByMemoId(int $memoId){
        return Memo::where('id', $memoId)->firstOrFail();
    }
}