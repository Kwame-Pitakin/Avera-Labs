<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Sample;
use Illuminate\Http\Request;
use App\Models\Test_category;
use Illuminate\Support\Facades\Validator;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'content.pages.tests.index',

            [
                'tests' => Test::latest()->paginate(50),



            ]
           
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view(
            'content.pages.tests.create',

            [
                'sampledata' => Sample::all(),
                'categorydata' => Test_category::all(),
                'tests' => Test::latest()->paginate(10)

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->group_a;
        // dd($data);


        foreach ($data as $key => $validata) {
            
            $validator = Validator::make($validata,

            [
                'test_name' =>'required|unique:tests|max:255',
                'test_category_id' =>'required',
                'target_gender' =>'required',
                'requiredsample' =>'required',
                'accurate_from' =>'required',
            ]
            );
            if($validator->fails()){
                    // dd($validator);
                    return redirect('/tests/create')
                            ->withErrors($validator)
                            ->withInput();
                  }
        }
      
        

        // foreach ($data as $validata) {

        //     $testname=$validata['test_name'];
        
        //     $validator= Validator::make($validata,
           
        //     [
        //         $testname  => 'required|unique:tests|max:255'
        //     ]
    
        // );
        // if($validator->fails()){
        //     dd($validator);
        //    }
      
        // }
       


        // dd($request->input());


        foreach ($data as $prop) {
          
            $test_name = $prop['test_name'];
            $test_category_id = $prop['test_category_id'];
            $target_gender = $prop['target_gender'];
            $requiredsample = $prop['requiredsample'];
            $accurate_from = $prop['accurate_from'];

            $datasave = [
                'test_name' => $test_name,
                'test_category_id' => $test_category_id,
                'target_gender' => $target_gender,
                'accurate_from' => $accurate_from,

                'test_sample_id' => $requiredsample,
                // 'test_category_id'=>2,
                // 'target_gender'=>'all',
                'test_status' => 1,
            ];

            
            $testData = new Test();
            $testData->test_name = $test_name;
            $testData->test_category_id = $test_category_id;
            $testData->target_gender = $target_gender;
            $testData->test_status = 1;
            // $testData->test_sample_id = 1;
            $testData->accurate_from = $accurate_from;

            $testData->save();

            foreach ($requiredsample as $sample) {

                $testData->test_sample()->attach($sample);
            }


            //  $savepivot =  DB::table('tests')->insert($datasave);

            //  dd($savepivot);

            // $savepivot->test_sample()->attach($requiredsample);

        }



        return redirect('/tests')->with('flush_message', 'New Test Has Been Added Successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $tests = Test::findorfail($id);

        return view(
            'content.pages.tests.show',
            [
                'testDetails' =>    $tests
            ]
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
        $testedit =  Test::findorfail($id);

        return response()->json([
            'status'=>200,
            'testedit'=>$testedit
        ]);

    //     return view('content.pages.tests.edit',
    //         [
    //             'testedit'=>Test::where('id',$id)->findorfail($id)->first()
    //         ]
    // );
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
