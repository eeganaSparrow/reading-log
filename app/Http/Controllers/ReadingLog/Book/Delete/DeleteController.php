<?php

namespace App\Http\Controllers\ReadingLog\Book\Delete;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Memo;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $bookId = (int) $request->route('bookId');
        $memos = Memo::where('book_id', $bookId)->get();
            foreach ($memos as $memo){
                $memo->delete();
            }
        $book = Book::where('id', $bookId)->firstOrFail();
        $book->delete();

        return redirect()->route('readinglog.index');
    }
}
