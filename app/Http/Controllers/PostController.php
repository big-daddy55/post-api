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
        $post = Post::all();

        return response()->json([
            'message' => 'Posts found',
            'posts' => $post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => $request->input('user_id')
        ]);

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $request->all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return response()->json([
            'message' => 'Post found',
            'post' => $post
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => $request->input('user_id')
        ]);

        $post->refresh();
        return response()->json([
            'message' => 'Post updated successfully',
            'post' => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);

        return response()->json([
            'message' => 'Post deleted successfully'
        ]);
    }
}
