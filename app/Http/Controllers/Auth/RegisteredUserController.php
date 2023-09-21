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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed','regex:/[!@#$%^&*(),.?":{}|<>]/', 'min:4', Rules\Password::defaults()],
            'surname' => ['max:20'],
            'dob'=>[]
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name'=>$request->name,
            'surname'=>$request->surname,
            'dob'=>$request->dob
        ]);
        // if ($request->has('name')) {
        //     $userData['name'] = $request->name;
        // }
        // if ($request->has('surname')) {
        //     $userData['surname'] = $request->surname;
        // }
        
        // if ($request->has('dob')) {
        //     $userData['dob'] = $request->dob;
        // }
        

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
