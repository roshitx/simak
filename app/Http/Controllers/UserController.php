<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.allusers', [
            'users' => User::where('id', '!=', Auth::id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'string|max:50|required',
            'username' => 'string|max:10|required',
            'email' => 'string|email:dns|unique:users,email|required',
            'gender' => 'required',
            'birth' => 'date',
            'password' => 'required|string|min:5',
            'role' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect()->route('users.index')->with('success', "Berhasil menambah user baru!");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.admin.edituser', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $validatedData = $request->validate([
                'fullname' => 'string|required|max:50',
                'username' => 'string|required|min:3',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($user->id),
                ],
                'gender' => 'required',
                'birth' => 'nullable|date',
                'gender' => 'required',
                'role' => 'required'
            ]);
    
            User::where('id', $user->id)
                ->update($validatedData);
            return redirect()->route('users.index')->with('success', "User dengan id {$user->id} berhasil diupdate.");
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'Terjadi kesalahan saat mencoba update user, coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', "Berhasil menghapus user dengan id $user->id");
    }
}
