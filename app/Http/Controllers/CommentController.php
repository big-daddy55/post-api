<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();

        return response()->json([
            'message' => 'comments found',
            'comments' => $comments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Comment::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'post_id' => $request->input('post_id'),
        ]);

        return response()->json([
            'message' => 'comment created successfully',
            'comment' => $request->all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);

        return response()->json([
            'message' => 'comment found',
            'comment' => $comment
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $request->input('body');
        

        $comment = Comment::find($id);

        $comment->update([
            'body' => $request->input('body'),
        ]);

        $comment->refresh();
        return response()->json([
            'message' => 'comment updated successfully',
            'comment' => $comment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        comment::destroy($id);

        return response()->json([
            'message' => 'comment deleted successfully'
        ]);
    }
}
