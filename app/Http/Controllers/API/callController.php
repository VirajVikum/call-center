<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CallCount;
use Illuminate\Support\Facades\Validator;
// use Dotenv\Validator;
use Illuminate\Http\Request;

class callController extends Controller
{
    public function createNewCall(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id'=>'required',
            'uniqueid'=>'required',
        ]);

        if($validator->fails())
        {
            $data=[
                "status"=>422,
                "message"=>$validator->message()
            ];
            return response()->json($data,422);
        }

        else
        {
            $call= new CallCount;

            $call->id=$request->id;
            $call->uniqueid=$request->uniqueid;
            $call->callcount=$request->callcount;
            $call->direction=$request->direction;
            $call->status=$request->status;
            $call->ani=$request->ani;
            $call->dnis=$request->dnis;
            $call->date=now();

            $call->save();

            $data=[
                "status"=>200,
                "message"=>'Data saved successfully'
            ];
            return response()->json($data,200);

        }

    }
}
