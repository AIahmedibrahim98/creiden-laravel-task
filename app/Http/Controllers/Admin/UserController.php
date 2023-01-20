<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ItemController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        try {
            // Create user
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            // Flash message
            session()->flash('success', 'User created successfully');
            // Redirect to users list
            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            // Flash message
            session()->flash('error', 'Something went wrong');
            return redirect()->back();
        }
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|confirmed',
        ]);
        try {
            // Update user
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($request->password) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            // Flash message
            session()->flash('success', 'User updated successfully');
            // Redirect to users list
            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            // Flash message
            session()->flash('error', 'Something went wrong');
            // Redirect to users list
            return redirect()->route('admin.users.index');
        }

    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            // Flash message
            session()->flash('success', 'User deleted successfully');
            // Redirect to users list
            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            // Flash message
            session()->flash('error', 'Something went wrong');
            // Redirect to users list
            return redirect()->route('admin.users.index');
        }
    }


    // Delete Item from user
    public function deleteItem($item_id)
    {
        try {
            ItemController::delete($item_id);
            // Flash message
            session()->flash('success', 'Item deleted successfully');
            // Redirect to users list
            return redirect()->back();
        } catch (\Exception $e) {
            // Flash message
            session()->flash('error', 'Something went wrong');
            // Redirect to users list
            return redirect()->back();
        }
    }

    //create item for user
    public function create_item($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('admin.users.create_item', compact('user'));
    }

    public function store_item(Request $request, $user_id)
    {
        // Validate request
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $user = User::findOrFail($user_id);
        $user->create_item([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        // Flash message
        session()->flash('success', 'Item created successfully');
        // Redirect to user details
        return redirect()->route('admin.users.show', $user_id);
    }

    public function edit_item($item_id,$user_id)
    {
        $item = ItemController::get_item($item_id,);
        return view('admin.users.edit_item', compact('item'),compact('user_id'));
    }

    public function update_item(Request $request, $item_id,$user_id)
    {
        // Validate request
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $item = ItemController::update_item($item_id, [
            'title' => $request->title,
            'content' => $request->content,
        ]);
        // Flash message
        session()->flash('success', 'Item updated successfully');
        // Redirect to user details
        return redirect()->route('admin.users.show', $user_id);
    }
}
