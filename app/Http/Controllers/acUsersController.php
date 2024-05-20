<?php

namespace App\Http\Controllers;

use App\Models\ac_extension;
use App\Models\ac_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class acUsersController extends Controller
{
    public function acUser_store(Request $request)
    {
        $data=$request->validate(
            [
                	
                'name'=>'required',	
                'email'=>['required','email','unique:ac_users,email'],
                'user_name'=>'required',
                'phone'=>'required',
                'nic'=>'required',
                'gender'=>'required',	
                'address'=>'required',
                'user_type_id'=>'required|integer'
            ]
            );
            $data['password'] = Hash::make('12345678'); //should create in agents part
            $data['extension'] = '1';
            $newUser = User::create($data); 
      
            //$guardName = 'web';
            // dd($newUser);

            //Log::info('New user created:', ['user' => $newUser]);


            if($data['user_type_id']==1)
            {
                $newUser->assignRole('admin');
            }
            else{
                $newUser->assignRole('agent');
            }
            
            return redirect()->route('users');
    }

    public function acUser_edit(User $user)
    {
        return view('users.user_update',['user'=>$user]);
    }

    public function acUser_update(User $user,Request $request)
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

    public function acusers_delete(User $user)
    {
        // $user->delete();
        $user->update(['del_status'=>1]);
        return redirect()->route('users');
    }

    public function assign_extension()
    {
        $users = User::with('userType')->get();
        $extensions=ac_extension::where('del_status',0); 
        return view('users.asign_extensions',compact('users','extensions'));
    }

    public function set_extension(ac_extension $ext,Request $request)
    {
        $data= $request->validate([
            'extension'=>'required'
        ]);
    }

    

}
