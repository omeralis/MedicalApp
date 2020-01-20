<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\UserApp;

class UserAppContrpller extends Controller
{
    // get User
    public function getUser(Request $request)
    {
        $userApp =  UserApp::find($request->id);
        
        return response()->json($userApp,200);
    }
    //  post User 
    public function postUser(Request $request)
    {
        $data =  $request->all();
        $validate = Validator::make($request->all(), [
            'phone'  => 'required',
            'imageUser'  => 'image|mimes:jpg,png,gif',
           ]);
           if ($validate->fails()) {
            return response()->json(['data'=>['validate error'=>$validate->errors()]],400);
        }
         // save Images 
         $image = $request->file('imageUser');
         $new_name = $request->user_name. '.' . $image->getClientOriginalExtension();
         $path = 'images';
         $image->move(public_path($path), $new_name);
         $data['imageUser']=url('/').'/'.$path.'/'.$new_name;
         // end image

        if ($data) {
            $userApp = UserApp::create($data);
            return response()->json($userApp,200);
        }
        return response()->json(['message'=> 'error'],404); 
    }
    // find phone or create
    public function FindPhoneCreate(Request $request){
        $phone = $request->phone;
        $user = UserApp::where('phone', $phone)->first();
        if (isset($user)) {
            return response()->json($user,200);
        } else {
           $user = UserApp::create(['phone'=>$phone]);
        }
        return response()->json($user,200); 
    }
    // update data of user
    public function Edituser(Request $request){
        $id = $request->id;  
        $user = UserApp::where('id', $id)->first();
        $this->validate($request, [
            'imageUser'  => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        // save Images  user_name.rand()
        $image = $request->file('imageUser');
        $new_name = $request->id. '.' . $image->getClientOriginalExtension();
        $path = 'UserImage';
        $image->move(public_path($path), $new_name);
        $data = $request->all();
        $data['imageUser'] = url('/') . '/' . $path . '/' . $new_name;
        if (isset($user)) {
            $user->update($data);
            return response()->json($user,200);
        }else {
        return response()->json(['message'=> 'error'],404);            
         }
        
        return response()->json($user,200);
    }


}
