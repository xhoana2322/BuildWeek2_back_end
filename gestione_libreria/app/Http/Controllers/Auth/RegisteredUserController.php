<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    // Funzione che restituisce la lista degli utenti
    public function index(Request $request)
    {
        $users = User::all();
        $categories = Category::all();

        // Controllo se l'utente è un admin
        if (Auth::check()) {
            if (Auth::user()->is_admin == '1') {
                return view('admin', ['users' => $users]);
            } else {
                return view('homepage', ['users' => $users], ['categories' => $categories]);
            }
        } else {
            return view('auth.login', ['users' => $users], ['categories' => $categories]);
        }

    }

    // Funzione che elimina un utente
    public function destroy(Request $request, $id)
    {
        // Cerco l'utente da eliminare e pouf!
        $user = User::findOrFail($id);
        $user->delete();

        // Torno alla lista degli utenti
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    // Funzione che modifica un utente
    public function edit(Request $request, $id)
    {

        // Cerco l'utente da modificare
        $user = User::findOrFail($id);
        return view('users-update', ['user' => $user]);

    }

    // Funzione che aggiorna un utente
    public function update(Request $request, $id)
    {

        $data = $request->only('name', 'email', 'password', 'is_admin');
        $user = User::findOrFail($id)->update($data);

        return redirect()->route('admin.index', ['user' => $user])->with('success', 'Utente aggiornato con successo!');

    }


}
