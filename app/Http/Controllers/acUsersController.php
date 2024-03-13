<?php

namespace App\Http\Controllers;

use App\Models\ac_extension;
use App\Models\ac_user;
use Illuminate\Http\Request;

class acUsersController extends Controller
{
    public function acUser_store(Request $request)
    {
        $data=$request->validate(
            [
                	
                'name'=>'required',	
                'email'=>'required',
                'user_name'=>'required',
                'phone'=>'required',
                'nic'=>'required',
                'gender'=>'required',	
                'address'=>'required',
                'user_type_id'=>'required|integer'
            ]
            );
            $data['password'] = '12345678';
            $data['extension'] = '1';
            $newUser = ac_user::create($data);
            return redirect()->route('users');
    }

    public function acUser_edit(ac_user $user)
    {
        return view('users.user_update',['user'=>$user]);
    }

    public function acUser_update(ac_user $user,Request $request)
    {
     
        $data=$request->validate(
            [
                	
                'name'=>'required',	
                'email'=>'required',
                'user_name'=>'required',
                'phone'=>'required',
                'nic'=>'required',
                'gender'=>'required',	
                'address'=>'required',
                'user_type_id'=>'required|integer'
            ]
            );

        // dd($company);
        $user->update($data);

        return redirect(route('users'))->with('success','Product created successfully');

	
    }

    public function acusers_delete(ac_user $user)
    {
        $user->delete();
        return redirect()->route('users');
    }

    public function assign_extension()
    {
        $users = ac_user::with('userType')->get();
        $extensions=ac_extension::all(); 
        return view('users.asign_extensions',compact('users','extensions'));
    }

    public function set_extension(ac_extension $ext,Request $request)
    {
        $data= $request->validate([
            'extension'=>'required'
        ]);
    }

    

}
