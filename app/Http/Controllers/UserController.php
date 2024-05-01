<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {
        $users = User::where('type', 0)->orderBy('created_at', 'ASC')->get();
        return view('user.index', compact('users')); 
    }

    public function create()
    {
        $users = User::all(); 
        return view('user.create')->with('users', $users);
        
    }
    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed'
    ]);

    // Enkripsi password
    $validatedData['password'] = Hash::make($request->password);

    // Menyimpan data pengguna ke dalam database
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = $validatedData['password'];
    $user->save();

    // Redirect dengan pesan sukses
    return redirect()->route('admin/users')->with('success', 'User added successfully');
}

    public function show(string $id_user)
    {
        $user = User::findOrFail($id_user);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_user)
    {
        $user = User::findOrFail($id_user);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_user)
    {
        $user = User::findOrFail($id_user);

        $user->update($request->all());

        return redirect()->route('admin/users')->with('success', 'user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin/users')->with('success', 'user deleted successfully');
    }

}
