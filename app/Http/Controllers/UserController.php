<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        // get users
        $users = User::latest()->paginate(5);

        return view('user.index', compact('users'));
    }

    // Post
    public function create()
    {
        return view('user.create');
    }

    // Store
    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'name'          => 'required|min:1',
            'email'         => 'required|min:1',
            'password'      => 'required|min:8'
        ]);

        // create
        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Crypt::encrypt($request->password)
        ]);

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
