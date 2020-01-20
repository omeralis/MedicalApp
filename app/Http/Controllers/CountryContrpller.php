<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
class CountryContrpller extends Controller
{

    public function getCountry(Request $request)
    {
        $country =  Country::with('DoctorCountry')->get();
        return response()->json($country,200);
    }

    public function postCountry(Request $request)
    {
        $data =  $request->all();
        $this->validate($request, [
            'country_flag'  => 'required|image|mimes:jpg,png,gif',
            'country_name_eng'  => 'required',
            'country_name_ar'  => 'required',
           ]);
           
        // save Images 
        $image = $request->file('country_flag');
        $new_name = $request->country_name_eng. '.' . $image->getClientOriginalExtension();
        $path = 'images';
        $image->move(public_path($path), $new_name);
        $data['country_flag']=url('/').'/'.$path.'/'.$new_name;
        // 
        if ($data) {
            $country = Country::create($data);
            return response()->json($country,200);
        }
        return response()->json(['message'=> 'error'],404);
        
    }
}
