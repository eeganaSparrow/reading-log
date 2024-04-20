<?php

namespace App\Http\Controllers\ReadingLog\Memo\UpdatePageNum;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReadingLog\Memo\UpdatePageNumRequest;
use App\Models\Memo;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdatePageNumRequest $request)
    {
        $memoId = (int) $request->route('memoId');
        $memo = Memo::where('id', $memoId)->firstOrFail();
        $memo->page_number = $request->input('page_number');
        $memo->save();

        $bookId = (int) $request->input('bookId');

        return redirect()->route('readinglog.book.index', ['bookId' => $bookId]);
    }
}
