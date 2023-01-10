<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rules\isValidPassword;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  show loginn form
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'fullname' => ['required', 'min:6'],
            'email' =>    ['required', 'email', Rule::unique('users', 'email')],
            'password' => [
                'required',
                'confirmed',
                'string',
                new isValidPassword(),
            ],
            'phone' => ['required', Rule::unique('users', 'phone')],
            'terms' => ['required'],

        ]);

        // hush password
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        $user = User::create($formFields);

        // login
        auth()->login($user);

        return redirect('/agentdashboard')->with('message', 'Welcome to averalabs ');
    }


    // login authentication

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' =>    ['required', 'email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/agentdashboard')->with('message', 'Welcome to averalabs ');
        }

        return back()->withErrors(['email' => 'Invalid credentials', 'password' => 'Invalid Credentials']);
    }

    // logout

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Log out Successfull');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('content.pages.user_profile.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('content.pages.user_profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'fullname' => ['required', 'min:6'],
            'phone' => ['required', 'unique:users,phone,' . $id],
            'agent_address' => ['required'],
            'agent_Ghanapost_gps' => ['required'],
            'avatar' => ['image', 'mimes:jpg,png,jpeg']
        ]);

        $avatar = $request->avatar;

        if ($avatar != null) {
            $avataName = time() . '-' . $request->fullname . '.' . $avatar->extension();

            $avatar_path = $avatar->move('images', $avataName);
        }


       

        User::where('id', $id)->update(
            [
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'user_location' => $request->agent_address,
                'user_Ghanapost_gps' => $request->agent_Ghanapost_gps,
                'avatar' => $avatar_path ?? auth()->user()->avatar,
            ]
        );

        return redirect(route('user.show', $id))->with('flush_message', 'profile has been updated successfully!!');


        // dd($request);

    }



    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
