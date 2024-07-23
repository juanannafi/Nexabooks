<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->role_status == 'admin') {
                return redirect('/perpus');
            } elseif ($user->role_status == 'petugas') {
                return redirect('/perpus');
            } elseif ($user->role_status == 'user') {
                return redirect('/dashboard');
            } else {
                return redirect('/signIn');
            }
            return redirect('/signIn');
        };

        return redirect('/signIn')->withErrors(['email' => 'Either email or password is incorrect.'])->withInput($request->only('email'));
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }

    public function register(Request $request){
        try {
            $user = $request->validate([
                'name' => 'required|string',
                'email' => 'required',
                'password' =>  'required|min:8',
            ]);

            $user['role_status'] = $request->input('role_status', 'user');
            $user = User::create($user);

            return redirect()->route('login')->with('success', 'Kamu berhasil login');
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Proses login gagal' . $e->getMessage()
            ], 500);
        }
    }
}
