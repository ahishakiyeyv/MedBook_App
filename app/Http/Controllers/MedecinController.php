<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;

class MedecinController extends Controller
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
        //creating the medecin
        $medecin = new Medecin([
            'matricule'=>$request->get('matricule'),
            'nom_med'=>$request->get('nom_med'),
            'prenom_med'=>$request->get('prenom_med'),
            'email'=>$request->get('email'),
            'telephone'=>$request->get('telephone'),
            'sexe'=>$request->get('sexe'),
            'service'=>$request->get('service'),
            'password'=>$request->get('password'),
            'status'=>0
 
        ]);
        $medecin->save();
        $reponse= [
            'success'=>true,
            'data'=>$medecin,
            'message'=>"Medecin enregistre avec succes"
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
        //showing the medecin's data
        $medecin = Medecin::all();
        return $medecin;
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
        //updating the medecin's data
        
        $updateMed = Medecin::findOrFail($id);
        $input = $request->all();
        $updateMed->fill($input)->update();
        $updateMed->update();
        $reponse = [
           'success'=>true,
           'data'=>$updateMed,
           'message'=>"Medecin modifie avec succes"
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
        //deleting the medecin's data
        $delete = Medecin::findOrFail($id);
        $delete->delete();
    }
}
