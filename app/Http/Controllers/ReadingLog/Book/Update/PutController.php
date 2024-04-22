<?php

namespace App\Http\Controllers\ReadingLog\Book\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReadingLog\Book\UpdateRequest;
use App\Models\Book;
use App\Services\ReadingLogService;
use Illuminate\Support\Facades\Storage;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, ReadingLogService $readingLogServie)
    {
        // アップロードされたファイル名を取得して画像を保存
        $file_name = $request->file('picture_name')->getClientOriginalName();
        $request->file('picture_name')->storeAs('public/images', $file_name);
        
        $bookId = (int) $request->route('bookId');
        $book = Book::where('id', $bookId)->firstOrFail();
        Storage::disk('public')->delete('images/' . $book->picture_name);
        $readingLogServie->saveBook($request,$book);

        return redirect()->route('readinglog.book.index', ['bookId' => $book->id]);
    }
}
