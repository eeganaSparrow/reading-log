<?php

namespace App\Http\Controllers\ReadingLog\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\ReadingLog\Category\CreateRequest;
use App\Services\ReadingLogService;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request, ReadingLogService $readingLogServie)
    {
        $category = new Category;
        $readingLogServie->saveCategory($request, $category);

        return redirect()->back();
    }
}
