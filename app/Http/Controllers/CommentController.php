<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CommentController extends Controller
{
    public function store(Request $request) {

        Comment::query()->create([
            'text' => $request->input('text'),
            'published_at' => now(),
            'post_id' => $request->input('post_id'),
            'author_id' => auth()->user()->id,
        ]);

        return redirect()->back();
    }
}
