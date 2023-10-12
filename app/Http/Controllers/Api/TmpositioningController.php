<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tmmarketposition;

class TmpositioningController extends Controller
{
    public function createtmposition(Request $request){

        $validateData = $request->validate([
            'sku_id' => 'required', 
            'position' => 'required',
        ]);
        $position = new Tmmarketposition;
        $position->sku_id = $request->sku_id;
        $position->position = $request->position;
        $position->company_name = $request->userCompany;

        $position->save();
    }


    public function viewtmpositions($id){
        $positions = DB::table('tmmarketpositions')
                    ->join('tmcompetitorofferings','tmmarketpositions.sku_id','tmcompetitorofferings.id')
                    ->where('tmmarketpositions.company_name',$id)
                    ->select('tmcompetitorofferings.sku_name','tmmarketpositions.*')
                    ->orderBy('tmmarketpositions.id','DESC')
                    ->get();

            return response()->json($positions);
    }

    public function showtmposition($id){
        $position = Tmmarketposition::find($id);

            return response()->json($position);
    }

    public function updatetmposition(Request $request,$id){
        $data = array();

        $data['sku_id'] = $request->sku_id;
        $data['position'] = $request->position;
        $user = DB::table('tmmarketpositions')->where('id',$id)->update($data);
    
    }

    public function destroytmposition($id){
        DB::table('tmmarketpositions')->where('id',$id)->delete();
}
}
