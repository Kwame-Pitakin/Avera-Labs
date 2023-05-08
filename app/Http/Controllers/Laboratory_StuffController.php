<?php

namespace App\Http\Controllers;

use App\Models\LabStuff;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Laboratory_StuffController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'avatar' => ['required','image', 'mimes:jpg,png,jpeg'],
            'userFullname' => ['required', 'min:6'],
            'role' =>['required'],
            'userEmail' =>    ['required', 'email', Rule::unique('users', 'email')],
            'userContact' => 'required|regex:/^[0-9]{9,10}$/|unique:users,phone',
            'userLocation'=>['required'] ,
            

         ]);

         $avatar = $request->avatar;

         if ($avatar != null) {
             $avataName = time() . '-' . $request->userFullname . '.' . $avatar->extension();
 
             $avatar_path = $avatar->move('images', $avataName);
         }


         LabStuff::create(
            [
                'works_at' => $request->works_at ,
                'fullname' => $request->userFullname ,
                'email' => $request->userEmail ,
                'phone' => $request->userContact ,
                'password' => 'password',
                'user_location' => $request->userLocation ,
                'avatar' => $avatar_path ,
                'role'=> $request->role,
                'status_id'=>1
            ]
         )->assignRole($request->role);

         return redirect()->route('laboratories.show', $request->works_at)->with('flush_message', 'User Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
