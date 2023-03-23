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
        $test = Test::all();
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
        $test = new Test([
            'nom_test'=>$request->get('nom_test'),
            'prix_test'=>$request->get('prix_test'),
            'description'=>$request->get('description')
 
        ]);
        $test = Test::findOrFail($id);
        $test->update();
        $reponse= [
            'success'=>true,
            'data'=>$test,
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
        return $delete;
    }
}
