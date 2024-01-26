<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    //view
    public function index()
    {
        // get users
        $users = User::latest()->paginate(5);

        return view('login.index', compact('users'));
    }

    // Auth
    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'email'         => 'required|min:1',
            'password'      => 'required|min:8'
        ]);

        // $user = User::find($request->email);
        // if ($request->email == $user->email) {
        //     if ($request->password == Crypt::decrypt($user->password)) {
        //         return redirect()->route('user.index')->with(['success' => 'Berhasil Login!']);
        //     } else {
        //         return redirect()->route('login.index')->with(['error' => 'Password yang anda masukkan salah!']);
        //     }
        // } else {
        //     return redirect()->route('login.index')->with(['error' => 'Email tidak terdaftar!']);
        // }
        return redirect()->route('product.index')->with(['success' => 'Email tidak terdaftar!']);
    }
}
