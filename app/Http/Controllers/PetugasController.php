<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function petugas(){
        $users = User::where('role_status', 'petugas')->get();

        return view('perpus.petugas.index', compact('users'));
    }

    public function searchpetugas(Request $request){
        $searchpetugas = $request->searchpetugas;

        // Query hanya user dengan role_status 'petugas'
        $users = User::where('role_status', 'petugas')
                    ->where(function($query) use ($searchpetugas) {
                        $query->where('name', 'LIKE', "%$searchpetugas%")
                            ->orWhere('email', 'LIKE', "%$searchpetugas%");
                    })
                    ->get();

        return view('perpus.petugas.index', compact('users', 'searchpetugas'));
    }

    public function createPetugas(Request $request){
        try {
            $user = $request->validate([
                'name' => 'required|string',
                'email' => 'required',
                'password' =>  'required|min:8',
            ]);

            $user['role_status'] = $request->input('role_status', 'petugas');
            $user = User::create($user);

            return redirect()->route('daftar_petugas')->with('success', 'Data petugas berhasil ditambahkan');

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Data petugas gagal ditambahkan' . $e->getMessage()
            ], 500);
        }
    }

    public function showPetugas(){
        return User::all();
    }

    public function showPetugasById($id){
        return User::find($id);
    }

    public function updatePetugas(Request $request, $id){
        try {
            $user = $request->validate([
                'name' => 'required|string',
                'email' => 'required',
                'password' =>  'required|min:8',
            ]);

            $user['role_status'] = $request->input('role_status', 'petugas');
            $find = User::findOrFail($id);
            $find->update($user);

            return redirect()->route('daftar_petugas')->with('success', 'Data petugas berhasil diperbatui');

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Data petugas gagal diperbatui' . $e->getMessage()
            ], 500);
        }
    }

    public function deletePetugas($id){
        try {
            $user = User::destroy($id);

            if ($user) {
                return redirect()->route('daftar_petugas')->with('success', 'user berhasil delete');

            } else {
                throw new Exception("tidak ada user denga id $id");
            }

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
