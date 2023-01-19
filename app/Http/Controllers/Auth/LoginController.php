<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            if (Auth::user()->role_id == 1) {
                return redirect()->route('superadmin')->with('flush_message', 'Welcome to Super Admin Dashboard ');
            }
            elseif (Auth::user()->role_id == 2) {
                return redirect()->route('labagent')->with('flush_message', 'Welcome to Lab Agent Dashboard ');
            }
            elseif (Auth::user()->role_id == 3) {
                return redirect()->route('frontDesk')->with('flush_message', 'Welcome to Super Front Desk Dashboard ');
            }
            elseif (Auth::user()->role_id == 4) {
                return redirect()->route('labTechnician')->with('flush_message', 'Welcome to Super lab technician Dashboard ');
            }
            elseif (Auth::user()->role_id == 5) {
                return redirect()->route('patient')->with('flush_message', 'Welcome to Super patient Dashboard ');
            }
            else{
                return redirect()->route('notAuthorized');
            }
        }else{
            return back()->withErrors(['email' => 'Invalid credentials', 'password' => 'Invalid Credentials']);

        }  


    }




    // public function authenticate(Request $request)
    // {
    //     $inputVal = $request->all();

    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))) {
    //         $request->session()->regenerate();

    //         switch (Auth::user()->role_id) {
    //             case '1':
    //                 return redirect()->route('superadmin')->with('flush_message', 'Welcome to Super Admin Dashboard ');
    //                 break;


    //             case '2':
    //                 return redirect()->route('labagent')->with('flush_message', 'Welcome to Lab Agent Dashboard ');
    //                 break;


    //             case '3':
    //                 return redirect()->route('frontDesk')->with('flush_message', 'Welcome to Front Desk Dashboard ');
    //                 break;


    //             case '4':
    //                 return redirect()->route('labTechnician')->with('flush_message', 'Welcome to Lab Technician Dashboard ');
    //                 break;


    //             case '5':
    //                 return redirect()->route('patient')->with('flush_message', 'Welcome to Patient Dashboard ');
    //                 break;

            

    //             default:
    //             //  return redirect()->route('notAuthorized');
    //             break;
    //         }
    //     } else {
    //         return back()->withErrors(['email' => 'Invalid credentials', 'password' => 'Invalid Credentials']);
    //     }
    // }
}
