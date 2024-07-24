<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request){
        $query = User::query();

        if ($request->search){
            $query->where('name', 'like', "%{$request->search}%");
        }

        $users = $query->get();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function create(){
        return view('users.add');
    }

    public function store(Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request -> password);
        $user -> save();

        return redirect() -> route('users.index');
    }

    public function update(Request $request, User $user){
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request -> password);
        $user -> save();

        return redirect() -> route('users.index');
    }

    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }
}
