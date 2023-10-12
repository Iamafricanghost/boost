<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\TmObjective;

class TmObjectiveController extends Controller
{
    public function createtmobjective(Request $request){

        $validateData = $request->validate([
            'campaign_id' => 'required',
            'kpi_type' => 'required',
            'objective' => 'required',
            'description' => 'required',
        ]);

        $userid = DB::table('users')->where('name',$request->userName)->first()->id;

        $objective = new TmObjective;
        $objective->campaign_id = $request->campaign_id;
        $objective->kpi_type = $request->kpi_type;
        $objective->objective = $request->objective;
        $objective->description = $request->description;
        $objective->company_name = $request->userCompany;

        $objective->save();
    }


    public function viewtmobjectives($id){
        

        $objective = DB::table('tm_objectives')
                    ->join('campaigns','tm_objectives.campaign_id','campaigns.id')
                    ->where('tm_objectives.company_name',$id)
                    ->select('campaigns.campaign_name','tm_objectives.*')
                    ->orderBy('tm_objectives.id','DESC')
                    ->get();

            return response()->json($objective);
    }

    public function showtmobjective($id){


        $objective = TmObjective::find($id);

            return response()->json($objective);
    }

    public function updatetmobjective(Request $request,$id){
        $data = array();

        $data['campaign_id'] = $request->campaign_id;
        $data['kpi_type'] = $request->kpi_type;
        $data['objective'] = $request->objective;
        $data['description'] = $request->description;
        $user = DB::table('tm_objectives')->where('id',$id)->update($data);

        



    
    }


    public function destroytmobjective($id){
        DB::table('tm_objectives')->where('id',$id)->delete();
}
}
