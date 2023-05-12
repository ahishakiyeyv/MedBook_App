<?php

namespace App\Http\Controllers;

use App\Models\Infirmier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfirmierController extends Controller
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

    public function RegisterInf(Request $request){
        $input=$request->all();
        $input['password']= bcrypt($input['password']);
        $infirmier = Infirmier::create($input);
        $success['nom_inf']=$infirmier->nom_inf;
        $success['matricule']=$infirmier->matricule;
        $success['status']=$infirmier->status;

        $response=[
            'success'=>true,
            'data'=>$success,
            'message'=>"Infirmier registed successfully"
        ];
        return response()->json($response,200);
    }

    public function loginInf(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' =>$request-> password])){
            $infirmier = Auth::user();
            $success['Infirmier'] = $infirmier;
            $success['nom_inf'] = $infirmier->nom_inf;
            $response = [
                'success' => true,
                'data' => $success,
                'message' => "Infirmier connecté avec succès"
            ];
            return response()->json($response,200);
        }else{
            $response=[
                'success' => false,
                'message' => "Veuillez vérifier vos identifiants"
            ];
            return response()->json($response,401);
        }
    }

    public function me(Request $request)
    {
        // code...
        return response()->json(Auth::user());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //creating an infirmier
        $infirmier = new Infirmier([
            'matricule'=>$request->get('matricule'),
            'nom_inf'=>$request->get('nom_inf'),
            'prenom_inf'=>$request->get('prenom_inf'),
            'email'=>$request->get('email'),
            'telephone'=>$request->get('telephone'),
            'password'=>$request->get('password'),
            'status'=>0,
            'rendezvous_id'=>$request->get('rendezvous_id')
 
        ]);
        $infirmier->save();
        $reponse= [
            'success'=>true,
            'data'=>$infirmier,
            'message'=>"Infirmier enregistre avec succes"
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
        //showing an infirmier
        $infirmier = Infirmier::all();
        return $infirmier;
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
        //updating an infirmier
        $updateInf = Infirmier::findOrFail($id);
        $input = $request->all();
        $updateInf->fill($input)->update();
        $updateInf->update();
        $reponse = [
           'success'=>true,
           'data'=>$updateInf,
           'message'=>"Infirmier modifie avec succes"
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
        //deleting an infirmier
        $delete = Infirmier::findOrFail($id);
        $delete->delete();
    }
}
