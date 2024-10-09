<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $user = User::all();

        return response()->json([
            'message' => 'Users found',
            'users' => $user
        ]);
    }

    // Show a user
    public function show($id)
    {
        // return 'User with id: ' .$id;

        $user = User::findOrFail($id);

        $user->refresh();

        return response()->json([
            'message' => 'User found',
            'user' => $user
        ]);
    }

    // Create a user
    public function store(Request $request)
    {
        return $request->all();
        die();
        // return "User Created";
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $request->all()
        ]);
    }

    // Update a User
    public function update(Request $request, $id)
    {
        $request->all();
        $user = User::find($id);

        $user->update($request->all());

        $user->refresh();
        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }

    // Delete a user
    public function destroy($id)
    {

        User::destroy($id);

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }

    public function posts($id){
        $user = User::find($id);

        $posts = $user->posts;

        return response()->json([
            'message' => "Post Found",
            'posts' => $posts
        ]);
    }
}
