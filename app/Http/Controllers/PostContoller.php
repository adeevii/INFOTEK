<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
     public function index() {
        return Post::with(['user', 'category'])->get();
    }

    public function show($id) {
        return Post::with(['user', 'category'])->findOrFail($id);
    }

    public function store(Request $request) {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'in:draft,pending,approved,rejected',
        ]);

        return Post::create($request->all());
    }

    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return $post;
    }

    public function destroy($id) {
        Post::destroy($id);
        return response()->json(['message' => 'Post deleted.']);
    }
}
