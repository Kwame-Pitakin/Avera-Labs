<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use App\Models\Laboratory_Test;
use Illuminate\Support\Facades\Validator;

class Laboratory_TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // $lab = Laboratory::findorfail($id);

        // $getIds=Laboratory::where('id', $id);
       

        return view('content.pages.laboratory_test.create',
            [
                // 'getIds'=>Laboratory::where('id', $id),

                'lab' =>  Laboratory::findorfail($id),

                'allTests' => Test::all(),

                'labtests' => Laboratory_Test::get(),

               
            ]
            
        
    );
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, )
    {
        $data = $request->group_a;
        // dd($data);
        foreach ($data as $key => $validata) {
            
            $validator = Validator::make($validata,

            [

                'test_id' =>'required|unique:laboratory_test,test_id,NULL,NULL,laboratory_id,'.$request->laboratory_id,
                'turn_around_time' =>'required',
                'test_price' =>'required',
                // 'term'  => 'unique:terms,term,NULL,id,taxonomy,category'

            ]
            );
            if($validator->fails()){
                    // dd($validator);
                    return redirect(route('labtest.create',$request->laboratory_id))
                            ->withErrors($validator)
                            ->withInput();
                  }
        }

      

        foreach ($data as $prop) {
            // getting the data from form
            $test_id = $prop['test_id'];
            $turn_around_time = $prop['turn_around_time'];
            $test_price = $prop['test_price'];

            // saving to database
            $testToLab =  new Laboratory_Test();

            $testToLab->laboratory_id = $request->laboratory_id;
            $testToLab->test_id = $test_id;
            $testToLab->turn_around_time =$turn_around_time;
            $testToLab->test_price =$test_price;
            $testToLab->lab_test_status = 1;



            $testToLab->save();


        }

                return redirect(route('laboratories.show',$request->laboratory_id))->with('flush_message', 'Test added to lab!!!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('content.pages.laboratory_test.create');

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
