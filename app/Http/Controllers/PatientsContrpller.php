<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use Validator;

class PatientsContrpller extends Controller
{
    public function getPatients(Request $request)
    {
        $patients =  Patients::all();
        return response()->json($patients,200);
    }

    public function postPatients(Request $request)
    {
        $data =  $request->all();
        $validate = Validator::make($request->all(), [
            'patient_name_ar'  => 'required',
            'patient_name_eng'  => 'required',
            'gender'  => 'required',
            'age'  => 'required',
           ]);
           if ($validate->fails()) {
            return response()->json(['data'=>['validate error'=>$validate->errors()]],400);
               }
        if ($data) {
            $patients = Patients::create($data);
            return response()->json($patients,200);
        }
        return response()->json(['message'=> 'error'],404);
        
    }
}
