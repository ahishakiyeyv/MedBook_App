<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
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
        //creating a patient
        $patient = new Patient([
            'nom_patient'=>$request->get('nom_patient'),
            'prenom_patient'=>$request->get('prenom_patient'),
            'email'=>$request->get('email'),
            'telephone'=>$request->get('telephone'),
            'adresse'=>$request->get('adresse'),
            'password'=>$request->get('password'),
            'status'=>0,
            'rendezvous_id'=>$request->get('rendezvous_id')
        ]);
        $patient->save();
        $reponse= [
            'success'=>true,
            'data'=>$patient,
            'message'=>"Patient enregistre avec succes"
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
        //showing the patient's data
        $patient = Patient::all();
        return  $patient;
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
        //updating the patient's data
        $patient = new Patient([
            'nom_patient'=>$request->get('nom_patient'),
            'prenom_patient'=>$request->get('nom_etu'),
            'email'=>$request->get('email'),
            'telephone'=>$request->get('telephone'),
            'adresse'=>$request->get('adresse'),
            'password'=>$request->get('password'),
            'status'=>0,
            'rendezvous_id'=>$request->get('rendezvous_id')
        ]);
        $patient = Patient::findOrFail($id);
        $patient->update();
        $reponse= [
            'success'=>true,
            'data'=>$patient,
            'message'=>"Patient modifie avec succes"
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
        //Deleting the patient's data
        $delete = Patient::findOrFail($id);
         $delete->delete();
    }
}
