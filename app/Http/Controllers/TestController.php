<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
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
    public function create(Request $request)
    {
        $test=Test::where('nom_test',$request->get('nom_test'))->first();

        if($test){
            //nom test existe deja
            return response()->json('exists');
        }
        //creating test
        $test = new Test([
            'nom_test'=>$request->get('nom_test'),
            'prix_test'=>$request->get('prix_test'),
            'description'=>$request->get('description')
 
        ]);
        $test->save();
        $reponse= [
            'success'=>true,
            'data'=>$test,
            'message'=>"Test enregistre avec succes"
        ];
        return response()->json($reponse,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //showing the test
        $test = Test::paginate(5);
        return $test;
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
        //updating the test
        $updateTest = Test::findOrFail($id);
        $input = $request->all();
        $updateTest->fill($input)->update();
        $updateTest->update();
        $reponse = [
           'success'=>true,
           'data'=>$updateTest,
           'message'=>"Test modifie avec succes"
       ];
        return response()->json($reponse,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deleting the test
        $delete = Test::findOrFail($id);
        $delete->delete();
    }
    public function countTest(){
        $count=Test::count();
        return $count;
    }
}
