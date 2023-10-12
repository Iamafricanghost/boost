<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tmpartnership;

class TmpartnershipController extends Controller
{
    public function createtmpartnership(Request $request){

        $validateData = $request->validate([
            'competitor_id' => 'required', 
            'partner' => 'required',
            'description' => 'required',
        ]);
        $item = new Tmpartnership;
        $item->competitor_id = $request->competitor_id;
        $item->partner = $request->partner;
        $item->description = $request->description;
        $item->company_name = $request->userCompany;

        $item->save();
    }


    public function viewtmpartnerships($id){
        $items = DB::table('tmpartnerships')
                    ->join('tmcompetitors','tmpartnerships.competitor_id','tmcompetitors.id')
                    ->where('tmpartnerships.company_name',$id)
                    ->select('tmcompetitors.competitor_name','tmpartnerships.*')
                    ->orderBy('tmpartnerships.id','DESC')
                    ->get();

            return response()->json($items);
    }

    public function showtmpartnership($id){
        $item = Tmpartnership::find($id);

            return response()->json($item);
    }

    public function updatetmpartnership(Request $request,$id){

        Tmpartnership::find($id)->update([
            'competitor_id' => $request->competitor_id,
            'partner' => $request->partner,
            'description' => $request->description,
        ]);

    }

    public function destroytmpartnership($id){
        Tmpartnership::find($id)->delete();
}
}
