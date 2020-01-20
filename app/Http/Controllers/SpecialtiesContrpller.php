<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Http\Request;
use App\Specialtiones;

class SpecialtiesContrpller extends Controller
{
    public function getSpecialties(Request $request)
    {
        $specialties =  Specialtiones::with('SpecialtionesDoctor')->get();
        return response()->json($specialties,200);
    }

    public function postSpecialties(Request $request)
    {
        $data =  $request->all();
        $validate = Validator::make($request->all(), [
            'special_name_ar'  => 'required',
            'special_name_eng'  => 'required',
           ]);
           if ($validate->fails()) {
            return response()->json(['data'=>['validate error'=>$validate->errors()]],400);
        }

        if ($data) {
            $specialties = Specialtiones::create($data);
            return response()->json($specialties,200);
        }
        return response()->json(['message'=> 'error'],404);
        
    }
}
