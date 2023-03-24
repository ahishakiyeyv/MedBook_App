<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use Illuminate\Http\Request;

class RendezvousController extends Controller
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
        //creating the appointment
        $appointment = new Rendezvous([
            'nom'=>$request->get('nom'),
            'prenom'=>$request->get('prenom'),
            'age'=>$request->get('age'),
            'sexe'=>$request->get('sexe'),
            'numero_ordre'=>$request->get('numero_ordre'),
            'date_arrive'=>$request->get('date_arrive'),
            'service'=>$request->get('service'),
            'remarque'=>$request->get('remarque'),
 
        ]);
        $appointment->save();
        $reponse= [
            'success'=>true,
            'data'=>$appointment,
            'message'=>"Rendezvous enregistre avec succes"
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
        //showing the appointment
        $appointment = Rendezvous::all();
        return $appointment;
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
        //updating the appointment
        $updateApp = Rendezvous::findOrFail($id);
        $input = $request->all();
        $updateApp->fill($input)->update();
        $updateApp->update();
        $reponse = [
           'success'=>true,
           'data'=>$updateApp,
           'message'=>"Rendez vous modifie avec succes"
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
        //deleting the appointment
        $delete = Rendezvous::findOrFail($id);
        $delete->delete();
    }
}
