<?php

namespace App\Http\Controllers;

use App\Models\ac_company;
use App\Models\ad_campaign;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


use function Laravel\Prompts\alert;

class adCampaignController extends Controller
{

    public function campaign_assign(ac_company $company)
    {
        return view('companies.campaign_asign',['company'=>$company]);
    }


    // public function data_store(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xls,xlsx'

    //     ]);

    //     // Get the uploaded file
    //     $file = $request->file('file');
    //     // dd($file);
        
    //     // Process the Excel file
    //     $data = Excel::toArray([], $file);

    //     $y= is_array($data);
    //     $x=isset($row['contact_no']);
    //     $z = $request->selected_company_id;
    //     $dataType = gettype($z);
    //     //dd($dataType);

    //     //dd($data[0][0]);
        
    //     // colum titles
    //     $keys[]=$data[0][0];

    //     $contIndex = array_search("contact_no",$keys);

    //     if (isset($keys['language'])) {
    //         $lanIndex = array_search("language",$keys);
    //     }

    //     //  no of rows
    //     $values[]=$data[0];

    //     $data_set = [];

    //     for($i=1;$i<count($values);$i++)
    //     {
    //         $row_values[] = $values[$i];

    //         for($j=0;$j<count($row_values);$j++)
    //         {
    //             $data_set[$keys[$j]] = $row_values[$i];

    //             $json_data_set= json_encode($data_set);

    //             $storeData =[
    //                 'campaign_id'=>'4',
    //                 'contact_1'=>$row_values[$contIndex],
    //                 'contact_2'=>'119',
    //                 'status',
    //                 'language'=>$row_values[$lanIndex],
    //                 'data'=>$json_data_set,
    //             ];

    //             $newRecord =ad_campaign::create($storeData);
    //         }

            
    //     }

        

    

    //     // return redirect()->back()->with('success', 'Excel data stored successfully.');
    //     return redirect(route('companies'));
        
    // }
  






    public function data_store(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xls,xlsx'
    ]);
    // dd($request->selected_company_id);

    
    $file = $request->file('file');
    
    
    $data = Excel::toArray([], $file);

    
    if (!is_array($data) || empty($data)) {
        
        return redirect()->back()->with('error', 'Invalid Excel data.');
    }

    // column titles
    $keys = $data[0][0];

    
    $contIndex = array_search("contact_no", $keys);
    $lanIndex = array_search("language", $keys);

    
    $data_set = [];

    
    $skipFirstIteration = true; // to skip first iteration
    foreach ($data[0] as $row_values) {
        if ($skipFirstIteration) {
            $skipFirstIteration = false; 
            continue; 
        }
        
        if (!isset($row_values[$contIndex])) {
            continue;
        }

        
        $data_set = [];
        
        foreach ($keys as $index => $key) {
            
            
            $data_set[$key] = $row_values[$index];
        }

        
        $json_data_set = json_encode($data_set);

        
        $newRecord = ad_campaign::create([
            'campaign_id' => $request->selected_company_id,
            'contact_1' => $row_values[$contIndex],
            'contact_2' => '0119687954',
        
            'language' => isset($row_values[$lanIndex]) ? $row_values[$lanIndex] : '', 
            'data' => $json_data_set,
        ]);
    }

    
    return redirect(route('companies'));
}

    
}
