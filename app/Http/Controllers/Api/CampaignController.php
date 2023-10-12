<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function createtmcampaign(Request $request){

        $validateData = $request->validate([
            'campaign_name' => 'required|unique:campaigns', 
            'customer_id' => 'required',
            'campaign_lead' => 'required',
            'campaign_brief' => 'required',
            'campaign_start' => 'required',
            'campaign_approx_end' => 'required',
        ]);

        

        $campaign = new Campaign;
        $campaign->campaign_name = $request->campaign_name;
        $campaign->customer_id = $request->customer_id;
        $campaign->campaign_lead = $request->campaign_lead;
        $campaign->campaign_brief = $request->campaign_brief;
        $campaign->campaign_start = $request->campaign_start;
        $campaign->campaign_approx_end = $request->campaign_approx_end;
        $campaign->company_name = $request->userCompany;

        $campaign->save();
    }


    public function viewtmcampaigns($id){
        // $userid = DB::table('users')->where('name',$id)->first()->id;


        $campaigns = DB::table('campaigns')
                    ->join('customers','campaigns.customer_id','customers.id')
                    ->join('employees','campaigns.campaign_lead','employees.id')
                    ->where('campaigns.company_name',$id)
                    ->select('customers.customer_name','employees.name','campaigns.*')
                    ->orderBy('campaigns.id','DESC')
                    ->get();

            return response()->json($campaigns);
    }

    public function showtmcampaign($id){


        $campaign = Campaign::find($id);

            return response()->json($campaign);
    }

    public function updatetmcampaign(Request $request,$id){
        $data = array();

        $data['campaign_name'] = $request->campaign_name;
        $data['customer_id'] = $request->customer_id;
        $data['campaign_lead'] = $request->campaign_lead;
        $data['campaign_brief'] = $request->campaign_brief;
        $data['campaign_start'] = $request->campaign_start;
        $data['campaign_approx_end'] = $request->campaign_approx_end;
        $user = DB::table('campaigns')->where('id',$id)->update($data);
    
    }


    public function destroytmcampaign($id){
        DB::table('campaigns')->where('id',$id)->delete();
}
}
