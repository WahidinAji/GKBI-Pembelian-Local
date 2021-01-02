<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        return \view('auth.login');
    }
    public function formLogin(Request $request)
    {
        \request()->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return \redirect()->route('admin.index');
        } elseif (Auth::guard('pemesan')->attempt($credentials)) {
            \dd('login pemesan');
        } elseif (Auth::guard('gudang')->attempt($credentials)) {
            \dd(Auth::guard('gudang')->user()->name);
        } elseif (Auth::guard('pembelian')->attempt($credentials)) {
            \dd(Auth::guard('pembelian')->user()->name);
        } elseif (Auth::guard('akuntansi')->attempt($credentials)) {
            \dd(Auth::guard('akuntansi')->user()->name);
        } else {
            \dd('akun tidak ada');
        }
    }
}
