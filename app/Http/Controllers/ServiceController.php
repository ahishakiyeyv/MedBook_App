<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $service=Service::where('nom_service',$request->get('nom_service'))->first();

        if($service){
            //service already exists
            $reponse=[
                'success'=>false,
                'data'=>null,
                'message'=>'Service existe deja',
            ];
            return response()->json('exists');
        }
        //creating the service if it doesn't exist
        $service=Service::create([
            'nom_service'=>$request->get('nom_service')
        ]);
        $reponse=[
            'success'=>true,
            'data'=>$service,
            'message'=>'service enregistre avec succes'
        ];
        return response()->json($reponse,200);

            // $service = new Service([
            //     'nom_service'=>$request->get('nom_service')
    
            // ]);
            // $service->save();
            // $reponse= [
            //     'success'=>true,
            //     'data'=>$service,
            //     'message'=>"Service enregistre avec succes"
            // ];
            // return response()->json($reponse,200);
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
        //showing the service
        $service = Service::paginate(5);
        return $service;
        
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
        $details=Service::where('id','=',$id)->get();
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
        //updating the service
        $updateSer = Service::findOrFail($id);
        $input = $request->all();
        $updateSer->fill($input)->update();
        $updateSer->update();
        $reponse = [
           'success'=>true,
           'data'=>$updateSer,
           'message'=>"Service modifie avec succes"
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
        //deleting the service
        $delete = Service::findOrFail($id);
        $delete->delete();
    }
    public function paginate(Request $request){
        $data=Service::paginate(3);
        return response()->json($data);
    }
    public function countService(){
        $count=Service::count();
        return $count;
    }
}
