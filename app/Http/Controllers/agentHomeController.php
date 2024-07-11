<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class agentHomeController extends Controller
{
    public function dashboard(Request $request)
    {
        $variable = $request->query('var');
        view()->share('variable', $variable);
        return view('agent/dashboard')->with('variable', $variable);

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
