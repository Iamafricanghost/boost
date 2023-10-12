<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tmcompetitor;

class TmcompetitorController extends Controller
{
    public function createtmcompetitor(Request $request){

        $validateData = $request->validate([
            'campaign_id' => 'required', 
            'competitor_name' => 'required',
            'competitor_brief' => 'required',
        ]);

        

        $competitor = new Tmcompetitor;
        $competitor->campaign_id = $request->campaign_id;
        $competitor->competitor_name = $request->competitor_name;
        $competitor->competitor_brief = $request->competitor_brief;
        $competitor->company_name = $request->userCompany;

        $competitor->save();
    }


    public function viewtmcompetitors($id){


        $competitors = DB::table('tmcompetitors')
                    ->join('campaigns','tmcompetitors.campaign_id','campaigns.id')
                    ->where('tmcompetitors.company_name',$id)
                    ->select('campaigns.campaign_name','tmcompetitors.*')
                    ->orderBy('tmcompetitors.id','DESC')
                    ->get();

            return response()->json($competitors);
    }

    public function showtmcompetitor($id){
        $competitor = Tmcompetitor::find($id);
        return response()->json($competitor);
    }

    public function updatetmcompetitor(Request $request,$id){
        $data = array();

        $data['campaign_id'] = $request->campaign_id;
        $data['competitor_name'] = $request->competitor_name;
        $data['competitor_brief'] = $request->competitor_brief;
        $user = DB::table('tmcompetitors')->where('id',$id)->update($data);
    
    }


    public function destroytmcompetitor($id){
        DB::table('tmcompetitors')->where('id',$id)->delete();
}
}
