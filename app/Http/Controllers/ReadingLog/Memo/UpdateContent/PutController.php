<?php

namespace App\Http\Controllers\ReadingLog\Memo\UpdateContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReadingLog\Memo\UpdateContentRequest;
use App\Models\Memo;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateContentRequest $request)
    {
        $memoId = (int) $request->route('memoId');
        $memo = Memo::where('id', $memoId)->firstOrFail();
        $memo->content = $request->input('content');
        $memo->save();

        $bookId = (int) $request->input('bookId');

        return redirect()->route('readinglog.book.index', ['bookId' => $bookId]);
    }
}
