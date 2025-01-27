<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
{
    $users = User::with(['ratings' => function ($query) {
        $query->with('film'); // Pastikan data film ditarik jika ingin ditampilkan
    }])->paginate(10);

    return view('users.index', compact('users'));
}
public function showComments($id)
{
    // Ambil user dan komentar yang terkait
    $user = User::with(['ratings.film'])->findOrFail($id);

    return view('users.comments', compact('user'));
}



    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Ambil user berdasarkan ID
        return view('users.edit', compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        $user = User::findOrFail($id);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
    
        // Hanya update password jika diisi
        if ($request->has('password') && $request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
