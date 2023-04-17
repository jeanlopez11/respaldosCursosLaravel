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
use Illuminate\Notifications\Notification;
use Tavo\ValidadorEc;

class RegisteredUserController extends Controller
{
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
        $validador = new ValidadorEc;
        // if ($validador->validarCedula($request->name)) {
        //     dd("Cedula Valida");
        // }else{
        //     // return redirect()->back()->with('error', 'Cedula Invalida');
        //     // $request->erro
        //     return redirect()->back()->withInput(array('name' => $request->name, 'email' => $request->email))
        //     ->withErrors(['name' => 'Cedula Invalida']);
        // }
        $request->validate([
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
