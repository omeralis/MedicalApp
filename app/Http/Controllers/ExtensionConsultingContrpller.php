<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConsultatingExtension;
use Validator;

class ExtensionConsultingContrpller extends Controller
{
    public function getConsultatingExtension(Request $request)
    {
        $consultat = ConsultatingExtension::with('ConsultatingExtension')-> get();
        return response()->json($consultat,200);
    }

    public function postConsultatingExtension(Request $request)
    {
        $data =  $request->all();
        $validate = Validator::make($request->all(), [
            'consultation_id'  => 'required|exists:consultatings,id',
            'coding' => 'required',
            'image_report'  => 'required',
            'consultation_status'  => 'required',
            'try_number'  => 'required',
           
           ]);
           if ($validate->fails()) {
               return response()->json(['data'=>['validate error'=>$validate->errors()]],400);
               # code...
           }
        if ($data) {
            $consultat = ConsultatingExtension::create($data);
            return response()->json($consultat,200);
        }
        return response()->json(['message'=> 'error'],404);
        
    }
}
