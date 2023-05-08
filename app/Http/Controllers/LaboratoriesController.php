<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use App\Models\Laboratory_Test;
use App\Models\LabStuff;
use App\Models\Sample;
use App\Models\TestCombo;
use Illuminate\Support\Facades\Auth;

class LaboratoriesController extends Controller
{


   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     function __construct()
     {
          $this->middleware('permission:list-laboratories|create-laboratories|edit-laboratories|delete-laboratories|archive-laboratories', ['only' => ['index','show']]);
          $this->middleware('permission:create-laboratories', ['only' => ['create','store']]);
          $this->middleware('permission:edit-laboratories', ['only' => ['edit','update']]);
          $this->middleware('permission:delete-laboratories', ['only' => ['destroy']]);
     }
    public function index()
    {
        foreach (Auth::user()->roles as $role) {
            
        }

        if ($role->name === 'Super Admin' ) {
             $laboratories = Laboratory::latest()->paginate(10); 
        }
        else {
            $laboratories = Laboratory::where('created_by',Auth::user()->id )->latest()->paginate(10); 

        }
          
        

        return view(
            'content.pages.laboratories.index', compact(['laboratories'])

            // [
            //     'laboratories' => Laboratory::latest()->paginate(10)
            // ],
        )->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.laboratories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());

        $request->validate(
            [
                'lab_name' => 'required|unique:laboratories|max:100',
                'lab_email' => ['required', 'unique:laboratories', 'max:150'],
                'lab_phone' => ['required', 'unique:laboratories'],
                'lab_address' => 'required',
                'latitude' => ['required', 'numeric', 'between:-90,90', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
                'longitude' => ['required', 'numeric', 'between:-180,180', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
                // 'lab_Ghanapost_gps' => 'required',
                'lab_logo_path' => ['required', 'mimes:jpg,png,jpeg'],
                'lab_description' => 'required',
            ]
        );




        Laboratory::create(
            [
                'created_by' => auth()->id(),
                'lab_name' => $request->lab_name,
                'lab_email' => $request->lab_email,
                'lab_phone' => $request->lab_phone,
                'lab_address' => $request->lab_address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'lab_description' => $request->lab_description,
                'lab_images_path' => "temporary",
                'lab_logo_path' => $this->storeLogo($request),
                'lab_Ghanapost_gps' => $request->lab_Ghanapost_gps,
                'lab_status' => 1,
                'lab_rating' => 4

            ]
        );




        return redirect('/laboratories')->with('flush_message', 'New Laboratory Has Been Added Successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        foreach (Auth::user()->roles as $role) {
            

        if ($role->name === 'Super Admin') {
            $labDetails = Laboratory::findorfail($id);
        }
        else{
            $labDetails = Laboratory::where('created_by', Auth::user()->id)->findorfail($id);
        }

    }

        // $labStuff = LabStuff::all();

        $labtests = Laboratory_Test::all();
        $comboSample = Sample::get();

        $comboDetails = TestCombo::get();

        return view(
            'content.pages.laboratories.show', compact(['labtests','labDetails','comboSample','comboDetails'])

            // [
            //     'labtests' => Laboratory_Test::all(),

            //     'labDetails' => Laboratory::findorfail($id),

            //     'comboSample' => Sample::get(),

            //     'comboDetails' => TestCombo::get(),

            // ]

        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view(
            'content.pages.laboratories.edit',

            [
                'laboratories' => Laboratory::where('id', $id)->findorfail($id),

            ]
        );
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

        $request->validate(
            [
                'lab_name' => 'required|max:100|unique:laboratories,lab_name,' . $id,
                'lab_email' => 'required|max:150|unique:laboratories,lab_email,' . $id,
                'lab_phone' => ['required', 'unique:laboratories,lab_phone,' . $id],
                'lab_address' => 'required',
                'latitude' => ['required', 'numeric', 'between:-90,90', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
                'longitude' => ['required', 'numeric', 'between:-180,180', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
                'lab_logo_path' => ['mimes:jpg,png,jpeg'],
                'lab_description' => 'required',


            ]
        );



        $image = $request->lab_logo_path;

        if ($image != null) {
            Laboratory::where('id', $id)->update(
                [
                    'lab_name' => $request->lab_name,
                    'lab_email' => $request->lab_email,
                    'lab_phone' => $request->lab_phone,
                    'lab_address' => $request->lab_address,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'lab_description' => $request->lab_description,
                    'lab_images_path' => "temporary",
                    'lab_logo_path' => $this->storeLogo($request),
                    'lab_Ghanapost_gps' => $request->lab_Ghanapost_gps,
                    'lab_status' => 1,
                    'lab_rating' => 4
                ]
            );

            return redirect(route('laboratories.show', $id))->with('flush_message', 'laboratory has been updated successfully!!');
        } else {


            Laboratory::where('id', $id)->update(
                [
                    'lab_name' => $request->lab_name,
                    'lab_email' => $request->lab_email,
                    'lab_phone' => $request->lab_phone,
                    'lab_address' => $request->lab_address,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'lab_description' => $request->lab_description,
                    'lab_images_path' => "temporary",
                    'lab_Ghanapost_gps' => $request->lab_Ghanapost_gps,
                    // 'lab_logo_path' => $this->storeLogo($request),
                    'lab_status' => 1,
                    'lab_rating' => 4
                ]



            );

            return redirect(route('laboratories.show', $id))->with('flush_message', 'laboratory has been updated successfully!!');
        }
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

    private function storeLogo($request)
    {
        $newImageName = uniqid() . '-' . $request->lab_name . '.' . $request->lab_logo_path->extension();

        return $request->lab_logo_path->move('images', $newImageName);


    }
}
