<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|max:250'
        ]);

        $post = new Post();
        // $post->userId = $request->input('userId');
        $post->userId = 0;
        $post->body = $request->input('body');
        // $post->isFollow = false;
        $post->isFollow = true;
        $post->created_at = now();
        $post->updated_at = now();
        $post->save();
        return response()->json($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $post->body = $request->input('body');
        $post->isFollow = $request->input('isFollow');
        $post->updated_at = now();
        $post->save();
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(Post::all());
    }
}
