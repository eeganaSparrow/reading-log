<?php

namespace App\Http\Controllers\ReadingLog\Memo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memo;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $memoId = (int) $request->route('memoId');
        $bookId = (int) $request->input('bookId');
        $memo = Memo::where('id', $memoId)->firstOrFail();
        $memo->delete();

        return redirect()
            ->route('readinglog.book.index', ['bookId' => $bookId]);
    }
}
