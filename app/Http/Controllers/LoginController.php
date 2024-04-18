<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('login.index');
    }
    public function submit(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $request->password == $user->password) {
            Auth::login($user);
            $request->session()->flash('status', 'Login was successful');
            return redirect()->route('articles.index')->with('success', 'Login successful');
        } else {
            $request->session()->flash('status', 'Invalid credentials. Please try again.');
            return redirect()->back()->withInput($request->only('email'));
        }
    }
}
