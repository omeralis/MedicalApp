<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultating;
use Validator;
class ConsultingContrpller extends Controller
{
    public function getConsultating(Request $request)
    {
        $consultat = 
        Consultating::with('ConsultatingPatients')->
        with('ConsultatingSpecialtiones')->
        with('ConsultatingSpecialtiones')->
        with('ConsultatingDoctor')->
        get();
        return response()->json($consultat,200);
    }
// 
    public function postConsultating(Request $request)
    {
        $data =  $request->all();
        $validate = Validator::make($request->all(), [
            'patient_id'  => 'required|exists:patients,id',
            'specialtiones_id' => 'required|exists:specialtiones,id',
            'doctor_id'  => 'required|exists:doctors,id',
            'consultation_text_ar'  => 'required',
            'consultation_text_eng'  => 'required',
            'consultation_status'  => 'required',
            'payment_status'  => 'required',
            'consultation_date'  => 'required',
           ]);
           if ($validate->fails()) {
               return response()->json(['data'=>['validate error'=>$validate->errors()]],400);
               # code...
           }

        if ($data) {
            $consultat = Consultating::create($data);
            return response()->json($consultat,200);
        }
        return response()->json(['message'=> 'error'],404);
        
    }
}
