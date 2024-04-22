<?php
namespace App\Services;

use App\Models\Book;
use App\Models\Category;
use App\Models\Memo;

class ReadingLogService{
// 本データの取得
    // すべての本データの取得
    public function getAllBooks(){
        return Book::all();
    }
    // カテゴリーIDで本データを取得
    public function getBooksByCategoryId(int $categoryId){
        return Book::where('category_id', $categoryId)
            ->orderBy('updated_at', 'desc')
            ->get();
    }
    // 本IDで本データを取得
    public function getBookByBookId(int $bookId){
        return Book::where('id', $bookId)->first();
    }
    // 本データとそれに紐づくメモデータを削除
    public function deleteBookAndMemos(int $bookId){
        $memos = Memo::where('book_id', $bookId)->get();
            foreach ($memos as $memo){
                $memo->delete();
            }
            $book = Book::where('id', $bookId)->firstOrFail();
            $book->delete();
    }
    // 本データを保存
    public function saveBook($request, Book $book){
        $book->category_id = $request->category_id();
        $book->title = $request->title();
        $book->author = $request->author();
        $picture_name = $request->file('picture_name')->getClientOriginalName();
        $book->picture_name = $picture_name;
        $book->publisher = $request->publisher();
        $book->publication_year = $request->publication_year();
        $book->save();
    }
// カテゴリーデータの取得
    // すべてのカテゴリーデータを取得
    public function getAllaCategories(){
        return Category::all();
    }
    // 単一のカテゴリーデータを取得
    public function getOneCategory(int $categoryId){
        return Category::where('id', $categoryId)->first();
    }
    // カテゴリーデータの保存
    public function saveCategory($request, Category $category){
        $category->category_name = $request->category_name();
        $category->save();
    }
// メモデータの取得
    // 本IDでメモを取得
    public function getMemosByBookId(int $bookId){
        return Memo::where('book_id', $bookId)
            ->orderBy('updated_at', 'desc')
            ->get();
    }
    // メモIDで単一メモデータの取得
    public function getMemoByMemoId(int $memoId){
        return Memo::where('id', $memoId)->firstOrFail();
    }

// データ検索関連
// 検索時に使用する関数
    // 検索文字の前後の空白などを削除する関数
    public static function mbTrim($pString){
        return preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $pString);
    }
// 本データの検索
    // 検索文字に一致する本データの取得（ホーム画面用）
    public function getSearchBooks($search_str){
        $string = $this->mbTrim($search_str);
        return Book::where('title','like', "%{$string}%" )
            ->orWhere('author', 'like', "%{$string}%" )
            ->get();
    }
    // 検索文字に一致する本データの取得（カテゴリー画面用）
    public function getSearchBooksInCategory($search_str, $categoryId){
        $string = $this->mbTrim($search_str);
        return Book::where('category_id', $categoryId)
            ->where('title','like', "%{$string}%" )
            ->orwhere('category_id', $categoryId)
            ->where('author', 'like', "%{$string}%" )
            ->get();
    }
// メモデータの検索
    // 検索文字に一致するメモデータの取得（本単位）
    public function getSearchMemos($search_str, $bookId){
        $string = $this->mbTrim($search_str);
        return Memo::where('book_id', $bookId)
            ->where('content', 'like', "%{$string}%")
            ->get();
    }
    // 検索文字に一致するメモデータの取得（すべてのメモ）
    public function getSearchAllMemos($search_str){
        $string = $this->mbTrim($search_str);
        return Memo::where('content', 'like', "%{$string}%")
            ->get();
    }
    // 検索文字に一致する本IDを取得
    public function getSearchBookId($search_str){
        $string = $this->mbTrim($search_str);
        return Memo::where('content', 'like', "%{$string}%")
            ->groupBy('book_id')
            ->pluck('book_id');
    }
}