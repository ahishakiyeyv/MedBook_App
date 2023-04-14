<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nom_patient' => 'required',
            'prenom_patient' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'adresse' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            #code...
            $response = [
                'success' => false,
                'message' => $validator->errors(),

            ];
            return response()->json($response, 400);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['nom_patient'] = $user->nom_patient;
        $success['telephone'] = $user->telephone;
        $success['status'] = $user->status;

        $response = [
            'success'=>true,
            'data'=>$success,
            'message'=>"User register successfully"
        ];

        return response()->json($response,200);
    }
    public function login(Request $request)
    {
        # code...
        if(Auth::attempt(['email' => $request->email, 'password' =>$request-> password])){
            $user=Auth::user();
            $success['user']=$user;
            $success['nom_patient']=$user->nom_patient;
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $response = [
                'success'=>true,
                'data'=>$success,
                'message'=>"User Login successfully"
            ];

             return response()->json($response,200);
        }else{
            $response = [
                'success'=>false,
               
                'message'=>"Verifier vos identifiants!"
            ];

             return response()->json($response,400);
        }
    }
    public function me(Request $request)
    {
        // code...
        return response()->json(Auth::user());
    }
}
