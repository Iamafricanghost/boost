<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\SisterCompany;

class SistercompanyController extends Controller
{
    public function createsister(Request $request){

        $validateData = $request->validate([
            'company_name' => 'required|unique:sister_companies',
            'office_address' => 'required',
            'contact_name' => 'required',
            'contact_level' => 'required',
            'contact_phone' => 'required|min:10',
            'contact_email' => 'required',
            'tin' => 'required',
            'relation_type' => 'required',
        ]);

        $userid = DB::table('users')->where('name',$request->userName)->first()->id;

        $sistercompany = new SisterCompany;
        $sistercompany->company_name = $request->company_name;
        $sistercompany->office_address = $request->office_address;
        $sistercompany->contact_name = $request->contact_name;
        $sistercompany->contact_level = $request->contact_level;
        $sistercompany->contact_phone = $request->contact_phone;
        $sistercompany->contact_email = $request->contact_email;
        $sistercompany->tin = $request->tin;
        $sistercompany->relation_type = $request->relation_type;
        $sistercompany->created_by = $userid;

        $sistercompany->save();
    }


    public function viewsisters($id){
        $userid = DB::table('users')->where('name',$id)->first()->id;

        $sistercompany = DB::table('sister_companies')
                    ->join('users','sister_companies.created_by','users.id')
                    ->where('sister_companies.created_by',$userid)
                    ->select('users.name','sister_companies.*')
                    ->orderBy('sister_companies.id','DESC')
                    ->get();

            return response()->json($sistercompany);
    }

    public function showsister($id){


        $sister = SisterCompany::find($id);

            return response()->json($sister);
    }

    public function updatesister(Request $request,$id){
        $data = array();
        $data['company_name'] = $request->company_name;
        $data['office_address'] = $request->office_address;
        $data['contact_name'] = $request->contact_name;
        $data['contact_level'] = $request->contact_level;
        $data['contact_phone'] = $request->contact_phone;
        $data['contact_email'] = $request->contact_email;
        $data['tin'] = $request->tin;
        $data['relation_type'] = $request->relation_type;
        $user = DB::table('sister_companies')->where('id',$id)->update($data);
    
    }


    public function destroysister($id){
        DB::table('sister_companies')->where('id',$id)->delete();
    }
}
