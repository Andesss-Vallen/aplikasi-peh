<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = \Spatie\Permission\Models\Role::all(); // Get all roles
        return view('auth.register', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // Validate the incoming request
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255', 'unique:users,username', 'alpha_num'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => 'required|exists:roles,name', // Ensure the selected role exists in the 'roles' table
    ]);

    // Create a new user instance
    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Assign the selected role to the newly created user
    $user->assignRole($request->role);

    // Fire the registered event (optional)
    event(new Registered($user));

    // Log the user in
    Auth::login($user);

    // Redirect the user to the homepage or any other location
    return redirect(RouteServiceProvider::HOME);
}

}
