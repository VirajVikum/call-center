<?php

namespace App\Http\Controllers;

use App\Models\ac_extension;
use Illuminate\Http\Request;

class acExtensionController extends Controller
{
    
    public function extension_store(Request $request)
    {
        // dd($request); //(dumping & die)

	$data=$request->validate(
            [
                'extension'=>'required',
                'extension_type'=>'required',
                'context'=>'required'
                
            ]
            );
            
            $newProduct = ac_extension::create($data);

            // return redirect((route('companies')));	
            return redirect()->route('extensions');	
    }

    public function extensions_edit(ac_extension $extension)
    {
        return view('extensions.extension_edit',['extension'=>$extension]);
    }
    public function extension_update(ac_extension $extension , Request $request)
    {
        $data=$request->validate(
            [
                'extension'=>'required',
                'extension_type'=>'required',
                'context'=>'required',
                
            ]
            );
            $extension->update($data);
        return redirect(route('extensions'));
    }
    public function extensions_destroy(ac_extension $extension)
    {
        $extension->delete();
        return redirect(route('extensions'));
    }
}
