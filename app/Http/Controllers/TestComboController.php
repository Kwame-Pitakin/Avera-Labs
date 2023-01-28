<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Laboratory;
use App\Models\Laboratory_Test;
use App\Models\Sample;
use App\Models\TestCombo;
use Illuminate\Http\Request;

class TestComboController extends Controller
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

 function __construct()
    {
         $this->middleware('permission:list-combo|create-combo|edit-combo|delete-combo', ['only' => ['index','store']]);
         $this->middleware('permission:create-combo', ['only' => ['create','store']]);
         $this->middleware('permission:edit-combo', ['only' => ['edit','update']]);
         $this->middleware('permission:delete-combo', ['only' => ['destroy']]);
    }

    public function create($id)
    {

        return view(
            'content.pages.test_combo.create',

            [
                'laboratories' => Laboratory::findorfail($id),

                'allTests' => Laboratory_Test::where('laboratory_id', $id)->get(),

                'samples' => Sample::get()

                // 'testDetails' => Test::findorfail($id),


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
        $request->validate(
            [
                'combo_name' => 'required|unique:test_combos',
                'combo_tags' => ['required'],
                'combo_sample' => ['required'],
                'turn_around_time' => ['required', 'numeric',],
                'combo_test' => 'required',
                'combo_price' => ['required', 'numeric'],
                'combo_target_gender' => ['required',],
                'combo_description' => 'required',
                'accurate_from' => 'required',
            ]
        );
        //  Getting request field 
        $laboratory_id = $request->laboratory_id;
        $combo_name = $request->combo_name;
        $combo_tags = $request->combo_tags;
        $combo_sample = $request->combo_sample;
        $turn_around_time = $request->turn_around_time;
        $combo_test = $request->combo_test;
        $combo_price = $request->combo_price;
        $accurate_from = $request->accurate_from;
        $combo_target_gender = $request->combo_target_gender;
        $combo_description = $request->combo_description;


        $testCombo = new TestCombo();
        $testCombo->combo_name = $combo_name;
        $testCombo->laboratory_id = $laboratory_id;
        $testCombo->combo_tags = $combo_tags;
        $testCombo->turn_around_time = $turn_around_time;
        $testCombo->combo_price = $combo_price;
        $testCombo->accurate_from = $accurate_from;
        $testCombo->combo_target_gender = $combo_target_gender;
        $testCombo->combo_description = $combo_description;

        $testCombo->save();

        foreach ($combo_sample as $sample) {

            $testCombo->combo_sample()->attach($sample);
        }
        foreach ($combo_test as $comboTest) {

            $testCombo->tests()->attach($comboTest);
        }

        return redirect(route('laboratories.show', $request->laboratory_id))->with('flush_message', 'Combo Created Successfully!!!');
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
