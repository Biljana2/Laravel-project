<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
class AdminUserController extends Controller
{
    public function index(){
    $users = User::all(); // Retrieve the categories from your database

    return view('admin.users.index', [
        'users' => $users,
    ]);
}
   public function create()
{
    $user = new User(); // Create a new User instance

    return view('admin.users.create', compact('user'));
}
public function store(Request $request)
{
    $attributes = $request->validate([
        'name' => 'required',
        'username' => 'required',
          'email' => 'required',
    ]);

    User::create($attributes);

    return redirect('/');
}
public function edit(User $user)
{
    return view('admin.users.edit', compact('user'));
}

   
public function update(Request $request, User $user)
{

    $attributes = $request->validate([
        'name' => 'required',
        'username' => 'required',
          'email' => 'required',
    ]);

    
    $user->update($attributes);

   return redirect()->route('admin.users.index')->with('success', 'Category has been updated');
}

 public function destroy(User $user){

    $user->delete();
 return redirect()->route('admin.users.index')->with('success', 'Category has been updated');
}
 
}



