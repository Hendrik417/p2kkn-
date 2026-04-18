<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi Input
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'nim'      => ['required', 'string', 'max:20', 'unique:users,nim'],
            // 'prodi'    => ['required', 'string', 'max:255'],
            // 'angkatan' => ['required', 'integer'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Simpan ke Database
        $user = User::create([
            'name'     => $request->name,
            'nim'      => $request->nim,
            'username'      => $request->nim,
            // 'prodi'    => $request->prodi,
            // 'angkatan' => $request->angkatan,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Assign Role dengan Pengaman (Try-Catch)
        if (method_exists($user, 'assignRole')) {
            try {
                $user->assignRole('student');
            } catch (\Exception $e) {
                // Jika role student belum ada di DB, buatkan otomatis
                $role = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
                $user->assignRole($role);
            }
        }

        // 4. Trigger Event Laravel
        event(new Registered($user));

        // 5. Redirect ke Login
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan masuk.');
    }
}
