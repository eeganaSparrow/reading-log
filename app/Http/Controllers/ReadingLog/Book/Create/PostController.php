<?php

namespace App\Http\Controllers\ReadingLog\Book\Create;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReadingLog\Book\CreateRequest;
use App\Models\Book;
use App\Services\ReadingLogService;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request, ReadingLogService $readingLogServie)
    {
        // アップロードされたファイル名を取得して画像を保存
        $file_name = $request->file('picture_name')->getClientOriginalName();
        $request->file('picture_name')->storeAs('public/images', $file_name);
        
        $book = new Book;
        $readingLogServie->saveBook($request,$book);

        $display = $request->input('display');
        if ($display === 'home'){
            return redirect()->route('readinglog.index');
        } elseif ($display === 'category'){
            $categoryId = (int) $request->input('categoryId');
            return redirect()->route('readinglog.category.index', ['categoryId' => $categoryId]);
        }
    }
}