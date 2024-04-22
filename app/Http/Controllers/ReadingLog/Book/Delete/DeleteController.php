<?php

namespace App\Http\Controllers\ReadingLog\Book\Delete;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReadingLogService;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ReadingLogService $readingLogServie)
    {
        $bookId = (int) $request->route('bookId');
        $readingLogServie->deleteBookAndMemos($bookId);

        return redirect()->route('readinglog.index');
    }
}
