<?php

namespace App\Http\Controllers\ReadingLog\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\ReadingLog\Category\CreateRequest;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $category = new Category;
        $category->category_name = $request->category_name();
        $category->save();

        return redirect()->back();
    }
}
