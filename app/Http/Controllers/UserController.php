<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataUser'] = User::all();

        return view('admin.User.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('user.index')
            ->with('success', 'Penambahan Data User Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);

        return view('admin.User.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);

        return view('admin.User.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $User = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $User->name = $request->name;
        $User->email = $request->email;

        if ($request->filled('password')) {
            $User->password = Hash::make($request->password);
        }

        $User->save();

        return redirect()->route('user.index')
            ->with('success', 'Perubahan Data User Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $User = User::findOrFail($id);

        $User->delete();

        return redirect()->route('user.index')
            ->with('success', 'Data User berhasil dihapus');
    }
}
