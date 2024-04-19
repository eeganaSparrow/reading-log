<?php

namespace App\Http\Controllers\ReadingLog\Memo;

use App\Http\Controllers\Controller;
use App\Models\Memo;
use App\Http\Requests\ReadingLog\Memo\CreateRequest;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $memo = new Memo;
        $bookId = (int) $request->input('bookId');
        $memo->book_id = $bookId;
        $memo->page_number = $request->page_number();
        $memo->content = $request->content();
        $memo->save();

        return redirect()->back();
    }
}
