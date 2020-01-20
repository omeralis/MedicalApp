<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use Validator;

class EvaluationContrpller extends Controller
{
    public function getEvaluation(Request $request)
    {
        $evaluation =  Evaluation::with('EvaluationDoctors')->get();
        return response()->json($evaluation,200);
    }

    public function postEvaluation(Request $request)
    {
        $data =  $request->all();
        $validate = Validator::make($request->all(), [
                'evaluate_num'  => 'required',
                'evaluate_text'  => 'required',
                'doctor_id'  => 'required|exists:doctors,id',
                'evaluate_date'  => 'required',
               ]);
               if ($validate->fails()) {
                return response()->json(['data'=>['validate error'=>$validate->errors()]],400);
                   }
        if ($data) {
            $evaluation = Evaluation::create($data);
            return response()->json($evaluation,200);
        }
        return response()->json(['message'=> 'error'],404);
        
    }
}
