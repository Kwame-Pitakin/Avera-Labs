<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LabStuff;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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
    // protected $redirectTo = '/admin/route';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:labstuff')->except('logout');

    }
    public function authenticate(Request $request)
    {  
        
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
            // $request->session()->regenerate();
            foreach (Auth::user()->roles as $role) {
                # code...
            }
            if ( $role->name === 'Super Admin' ) {
                return redirect()->route('superadmin')->with('flush_message', 'Welcome to Super Admin Dashboard ');
            }
            elseif ($role->name === 'Lab Agent') {
                return redirect()->route('labagent')->with('flush_message', 'Welcome to Lab Agent Dashboard ');
            }
            elseif ($role->name === 'Front Desk') {
                return redirect()->route('frontDesk')->with('flush_message', 'Welcome to Super Front Desk Dashboard ');
            }
            elseif ($role->name === 'Lab Technician') {
                return redirect()->route('labTechnician')->with('flush_message', 'Welcome to Super lab technician Dashboard ');
            }
            elseif ($role->name === 'Lab Patient') {
                return redirect()->route('patient')->with('flush_message', 'Welcome to Super patient Dashboard ');
            }
            else{
                return redirect()->route('notAuthorized');
            }
        }else{
            return back()->withErrors(['email' => 'Invalid credentials', 'password' => 'Invalid Credentials']);

        }  


    }


    public function labstuffLogin(Request $request)
    {
        $stuff = new LabStuff();

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('labstuff')->attempt($request->only(['email','password']), $request->get('remember'))){

            //  return redirect()->intended('/admin/dashboard');

            foreach ($stuff->getRoleNames() as $stuffRole) {
                dd($stuffRole);
            }
        }

        return back()->withInput($request->only('email', 'remember'));
    }



}
