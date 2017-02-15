<?php

namespace Administer\Http\Controllers\Auth;

use Facades\Administer\Administer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Administer\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    /**
     * Show application administer login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $usernameField = Administer::user()->administerUsername();
        $passwordField = Administer::user()->administerPassword();

        return view('administer::auth.login')->with(compact('usernameField', 'passwordField'));
    }

    /**
     * Handle administer login request.
     *
     * @param  \Administer\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function post(LoginRequest $request)
    {
        $credentials = $request->except('_token');

        if (! Auth::attempt($credentials)) {
            return back()->withErrors([
                Administer::user()->administerUsername() => trans('administer::auth.login.wrong.credentials')
            ]);
        }

        return redirect(route('administer.dashboard'))->withSuccess(trans('administer::auth.login.success'));
    }
}