<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getItems()
    {
        return view('users.items.all', ['items' => auth()->user()->items()]);
    }

    public function createItem()
    {
        return view('users.items.create');
    }

    public function storeItem(Request $request)
    {
        // Validate request
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $user = auth()->user();
        $user->create_item([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        // Flash message
        session()->flash('success', 'Item created successfully');
        // Redirect to items list
        return redirect()->route('users.items.all');
    }
}
