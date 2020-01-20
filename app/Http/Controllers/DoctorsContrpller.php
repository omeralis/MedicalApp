<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctors;
use Validator;

class DoctorsContrpller extends Controller
{
    public function getDoctors(Request $request)
    {
        $doctors =  Doctors::with('Doctorsspecial')->with('Doctorscountry')->get();
        return response()->json($doctors,200);
    }

    public function postDoctors(Request $request)
    {
        $data =  $request->all();
        $validate = Validator::make($request->all(), [
        // $this->validate($request, [
            'image_doctor'  => 'required|image|mimes:jpeg,jpg,png,gif',
            'doctor_name_ar'  => 'required',
            'doctor_name_eng'  => 'required',
            'specialtiones_id'  => 'required|exists:specialtiones,id',
            'country_id'  => 'required|exists:countries,id',
            'cv_ar'  => 'required',
            'cv_eng'  => 'required',
            'phone'  => 'required',
            'email'  => 'required',
           ]);
           if ($validate->fails()) {
            return response()->json(['data'=>['validate error'=>$validate->errors()]],400);
               }
        // save Images 
        $image = $request->file('image_doctor');
        $new_name = $request->doctor_name_eng.rand(). '.' . $image->getClientOriginalExtension();
        $path = 'imageDoctor';
        $image->move(public_path($path), $new_name);
        $data['image_doctor']=url('/').'/'.$path.'/'.$new_name;
        // 
        

        // $data =  $request->all();
        if ($data) {
            $doctors = Doctors::create($data);
            return response()->json($doctors,200);
        }
        return response()->json(['message'=> 'error'],404);
        
    }
}
