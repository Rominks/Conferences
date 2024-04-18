<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected string $redirectTo = '/articles/en';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(): View
    {
        return view('auth.login');
    }

    public function submit(Request $request): RedirectResponse
    {
        $credentials = $request->only('username', 'password');
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            $request->session()->flash('status', 'Login was successful');
            $locale = App::getLocale();
            return redirect()->intended(route("articles.index", ['locale' => $locale]))->with('success', 'Login successful');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('username'));
    }

    protected function username()
    {
        return 'name';
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }
}
