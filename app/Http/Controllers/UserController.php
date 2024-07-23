<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(){
        $users = User::where('role_status', 'user')->get();

        return view('perpus.user.index', compact('users'));
    }

    public function searchuser(Request $request){
        $searchuser = $request->searchuser;

        // Query hanya user dengan role_status 'user'
        $users = User::where('role_status', 'user')
                    ->where(function($query) use ($searchuser) {
                        $query->where('name', 'LIKE', "%$searchuser%")
                            ->orWhere('email', 'LIKE', "%$searchuser%");
                    })
                    ->get();

        return view('perpus.user.index', compact('users', 'searchuser'));
    }

    public function createUser(Request $request){
        try {
            $user = $request->validate([
                'name' => 'required|string',
                'email' => 'required',
                'password' =>  'required|min:8',
            ]);

            $user['role_status'] = $request->input('role_status', 'user');
            $user = User::create($user);

            return redirect()->route('daftar_user')->with('success', 'Data user berhasil ditambahkan');

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Data user gagal ditambahkan' . $e->getMessage()
            ], 500);
        }
    }

    public function showUser(){
        return User::all();
    }

    public function showUserById($id){
        return User::find($id);
    }

    public function updateUser(Request $request, $id){
        try {
            $user = $request->validate([
                'name' => 'required|string',
                'email' => 'required',
                'password' =>  'required|min:8',
            ]);

            $user['role_status'] = $request->input('role_status', 'user');

            $find = User::findOrFail($id);
            $find->update($user);

            return redirect()->route('daftar_user')->with('success', 'Data user berhasil diperbarui');

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Data user gagal diperbarui' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteUser($id){
        try {
            $user = User::destroy($id);

            if ($user) {
                return redirect()->route('daftar_user')->with('success', 'user berhasil delete');

            } else {
                throw new Exception("tidak ada user denga id $id");
            }

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
