<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CallData;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class callDataController extends Controller
{
    public function createNewCallData(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'agent_id'=>'required'
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
            $call= new CallData();

            $call->agent_id=$request->agent_id;
            $call->phone_no=$request->phone_no;
            $call->language=$request->language;
            $call->center=$request->center;
            $call->call_status=$request->call_status;
            $call->job_status=$request->job_status;
            $call->customer_status=$request->customer_status;
            $call->comment=$request->comments;
            $call->score=$request->score;

            $call->save();

            $data=[
                "status"=>200,
                "message"=>'Data saved successfully'
            ];
            return response()->json($data,200);

        }
    }
}
