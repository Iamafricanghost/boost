<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function createvendor(Request $request){

        $validateData = $request->validate([
            'vendor_name' => 'required',
            'office_address' => 'required',
            'service_type' => 'required',
            'contact_name' => 'required',
            'country_id' => 'required',
            'contact_level' => 'required',
            'contact_phone' => 'required|min:10',
            'contact_email' => 'required',
            'tin' => 'required',
        ]);


        $item = new Vendor;
        $item->vendor_name = strtolower($request->vendor_name);
        $item->country_id = $request->country_id;
        $item->service_type = strtolower($request->service_type);
        $item->office_address = strtolower($request->office_address);
        $item->contact_name = strtolower($request->contact_name);
        $item->contact_level = strtolower($request->contact_level);
        $item->contact_phone = strtolower($request->contact_phone);
        $item->contact_email = strtolower($request->contact_email);
        $item->tin = $request->tin;
        $item->company_name = strtolower($request->userCompany);

        $item->save();
    }


    public function viewvendors($id){
        
        $items = DB::table('vendors')
                    ->join('countries','vendors.country_id','countries.id')
                    ->where('vendors.company_name',$id)
                    ->select('countries.country_name','vendors.*')
                    ->orderBy('vendors.id','DESC')
                    ->get();

            return response()->json($items);
    }

    public function showvendor($id){
        $item = Vendor::find($id);

            return response()->json($item);
    }

    public function updatevendor(Request $request,$id){
        Vendor::find($id)->update([
            'vendor_name' => strtolower($request->vendor_name),
            'country_id' => $request->country_id,
            'service_type' => strtolower($request->service_type),
            'office_address' => strtolower($request->office_address),
            'contact_name' => strtolower($request->contact_name),
            'contact_level' => strtolower($request->contact_level),
            'contact_phone' => $request->contact_phone,
            'contact_email' =>strtolower($request->contact_email),
            'tin' => $request->tin,
        ]);
    
    }


    public function destroyvendor($id){
        Vendor::find($id)->delete();
    }
}
