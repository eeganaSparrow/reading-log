<?php

namespace App\Http\Controllers\ReadingLog\Book\Create;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReadingLogService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ReadingLogService $readingLogServie)
    {
        $categories = $readingLogServie->getAllaCategories();

        return view('readinglog.book.create')
            ->with('categories', $categories);
    }
}
