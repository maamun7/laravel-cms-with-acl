<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\Auth\LoginRequest;

class AdminAuthController extends Controller
{
    /**
     * the model instance
     * @var User
     */
    protected $user;
    /**
     * The Guard implementation.
     *
     * @var Authenticator
     */
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @param  Authenticator  $auth
     * @return void
     */

    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user;
        $this->auth = $auth;

       // $this->middleware('guest', ['except' => ['getLogout']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
      public function getLogin()
      {
          //return view('admin.auth.login');
          if (! $this->auth->check()) return view('admin/auth/login');
          else return redirect('admin');
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return Response
       */
    public function postLogin(Request $request)
    {
        if ($this->auth->attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'is_system_user' => 1],$request->has('remember')))
        {
            return redirect('/admin');
        }

        return redirect('/admin/login')->withErrors([
            'email' => 'The credentials you entered did not match our records. Try again?',
        ]);

       /* return redirect('admin.login')
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);*/
    }

    public function getLogout()
    {
        $this->auth->logout();
        return redirect('/admin/login');
    }
}
