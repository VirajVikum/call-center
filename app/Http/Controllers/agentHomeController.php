<?php

namespace App\Http\Controllers;

use App\Models\ac_company;
use Illuminate\Http\Request;

class agentHomeController extends Controller
{
    public function dashboard(Request $request)
    {
        $variable = $request->query('var');
        view()->share('variable', $variable);

        $campaigns=ac_company::where('del_status', 0)->get();
        view()->share('campaigns', $campaigns);

        return view('agent/dashboard', compact('variable','campaigns'));

    }

    public function leads(Request $request)
    {
        $variable = $request->query('var');
        view()->share('variable', $variable);
        return view('agent/leads')->with('variable', $variable);
    }

    public function orders(Request $request)
    {
        $variable = $request->query('var');
        view()->share('variable', $variable);
        return view('agent/orders')->with('variable', $variable);;
    }

    public function tickets(Request $request)
    {
        $variable = $request->query('var');
        view()->share('variable', $variable);
        return view('agent/tickets')->with('variable', $variable);
    }
}
