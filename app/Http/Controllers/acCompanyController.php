<?php

namespace App\Http\Controllers;

use App\Models\ac_company;
use Illuminate\Http\Request;

class acCompanyController extends Controller
{
    public function company_store(Request $request)
    {
        // dd($request); (dumping & die)

	$data=$request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                
            ]
            );
            $newProduct = ac_company::create($data);

            // return redirect((route('companies')));	
            return redirect()->route('companies');	
    }



    public function company_edit(ac_company $company)
    {
     //dd($company);
     //$company_data = ac_company::find($company);
	return view('companies.company_edit',['company'=>$company]);

	
    }

    public function company_update(ac_company $company,Request $request)
    {
     
        $data=$request->validate(
        [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            
        ]
        );
        // dd($company);
        $company->update($data);

        return redirect(route('companies'))->with('success','Product created successfully');

	
    }

    public function company_destroy(ac_company $company)
    {
        $company->delete();
        return redirect(route('companies'))->with('success','product deleted successfully');
    }
}
