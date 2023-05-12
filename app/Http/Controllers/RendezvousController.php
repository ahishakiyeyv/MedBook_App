<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'status'=>$request->get('status'),
            'remarque'=>$request->get('remarque'),
            'user_id'=>$request->get('user_id')
 
        ]);
        $appointment->save();
        $response= [
            'success'=>true,
            'data'=>$appointment,
            'message'=>"Rendezvous enregistre avec succes"
        ];
        return response()->json($response,200);
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
        $query= Rendezvous::query();
    if($request->has('nom')){
        $query->where('nom','like','%'.$request->get('nom').'%');
    }
    $result=$query->get();
    return response()->json($result);
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
        //getting the appointment details
        $details=Rendezvous::where('id','=',$id)->get();
        
        return $details;
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
    // public function updateMessage(Request $request, $id){
    //     $updateMessage=Rendezvous::find($id);
    //     $updateMessage->status=$request->get('status');
    //     $updateMessage->remarque=$request->get('remarque');
    
    //     // $updateMessage->status=$status;
    //     // $updateMessage->remarque=$message;
    //     $updateMessage->save();
    //     return $updateMessage;

    // }
    public function updateMessage(Request $request, $id){
        // $validatedData = $request->validate([
        //     'status' => 'required',
        //     'remarque' => 'required',
        // ]);
    
        $updateMessage = Rendezvous::findOrFail($id);
        $updateMessage->update([
            'status' => $request->status,
            'remarque' => $request->remarque,
        ]);
    
        return $updateMessage;
    }
    public function select0(){
        $result=Rendezvous::where('status',0)->get();
        return $result;
    }
    public function select1(){
        $result=Rendezvous::where('status',1)->get();
        return $result;
    }
    public function select2(){
        $result=Rendezvous::where('status',2)->get();
        return $result;
    }
    public function select3(){
        $result=Rendezvous::where('status',null)->get();
        return $result;
    }
    public function count1(Request $request){
        $user_id=$request->get('user_id');
        $count= Rendezvous::
                where('status','=',1)
                ->where('user_id',$user_id)
                ->count();
        return $count;
    }
    public function count0(Request $request){
        $user_id=$request->get('user_id');
        $count=Rendezvous::
                    where('status','=',0)
                    ->where('user_id',$user_id)
                    ->count();
        return $count;
    }
    public function count2(Request $request){
        $user_id=$request->get('user_id');
        $count=Rendezvous::
                where('status','=',2)
                ->where('user_id',$user_id)
                ->count();
        return $count;
    }
    public function count(Request $request){
        $user_id=$request->get('user_id');
        $count=Rendezvous::
                where('user_id',$user_id)
                ->count();
        return $count;
    }
    public function allCount(){
        $count=Rendezvous::whereDate('date_arrive','=',now()->toDateString())->count();
        return $count;
    }
}
