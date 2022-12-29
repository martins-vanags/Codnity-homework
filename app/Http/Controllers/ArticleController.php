<?php

namespace App\Http\Controllers;

use App\Models\Articles;

class ArticleController extends Controller
{
    public function show()
    {
        return Articles::paginate(10);
    }

    public function destroy(Articles $article)
    {
        $deleted = $article->delete();

        return response()->json([
            'status' => $deleted,
        ]);
    }
}
