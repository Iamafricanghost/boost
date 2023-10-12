<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Lead;

class LeadController extends Controller
{
    public function createlead(Request $request){

        $validateData = $request->validate([
            'lead_name' => 'required|unique:leads',
            'office_address' => 'required',
            'contact_name' => 'required',
            'contact_level' => 'required',
            'contact_phone' => 'required|min:10',
            'contact_email' => 'required',
            'lead_type' => 'required',
            'employee_handling' => 'required',
        ]);

        $userid = DB::table('users')->where('name',$request->userName)->first()->id;

        $lead = new Lead;
        $lead->lead_name = $request->lead_name;
        $lead->office_address = $request->office_address;
        $lead->contact_name = $request->contact_name;
        $lead->contact_level = $request->contact_level;
        $lead->contact_phone = $request->contact_phone;
        $lead->contact_email = $request->contact_email;
        $lead->lead_type = $request->lead_type;
        $lead->employee_handling = $request->employee_handling;
        $lead->created_by = $userid;

        $lead->save();
    }


    public function viewleads($id){
        $userid = DB::table('users')->where('name',$id)->first()->id;

        $leads = DB::table('leads')
                    ->join('employees','leads.employee_handling','employees.id')
                    ->where('leads.created_by',$userid)
                    ->select('employees.name','leads.*')
                    ->orderBy('leads.id','DESC')
                    ->get();

            return response()->json($leads);
    }

    public function showlead($id){


        $lead = Lead::find($id);

            return response()->json($lead);
    }

    public function updatelead(Request $request,$id){
        $data = array();
        $data['lead_name'] = $request->lead_name;
        $data['office_address'] = $request->office_address;
        $data['contact_name'] = $request->contact_name;
        $data['contact_level'] = $request->contact_level;
        $data['contact_phone'] = $request->contact_phone;
        $data['contact_email'] = $request->contact_email;
        $data['lead_type'] = $request->lead_type;
        $data['employee_handling'] = $request->employee_handling;
        $user = DB::table('leads')->where('id',$id)->update($data);
    
    }


    public function destroylead($id){
        DB::table('leads')->where('id',$id)->delete();
}
}
