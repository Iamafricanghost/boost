<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tmstrategy;

class TmstrategyController extends Controller
{
    public function createtmstrategy(Request $request){

        $validateData = $request->validate([
            'competitor_id' => 'required', 
            'strategy' => 'required',
            'description' => 'required',
        ]);
        $item = new Tmstrategy;
        $item->competitor_id = $request->competitor_id;
        $item->strategy = $request->strategy;
        $item->description = $request->description;
        $item->company_name = $request->userCompany;

        $item->save();
    }


    public function viewtmstrategies($id){
        $items = DB::table('tmstrategies')
                    ->join('tmcompetitors','tmstrategies.competitor_id','tmcompetitors.id')
                    ->where('tmstrategies.company_name',$id)
                    ->select('tmcompetitors.competitor_name','tmstrategies.*')
                    ->orderBy('tmstrategies.id','DESC')
                    ->get();

            return response()->json($items);
    }

    public function showtmstrategy($id){
        $item = Tmstrategy::find($id);

            return response()->json($item);
    }

    public function updatetmstrategy(Request $request,$id){

        Tmstrategy::find($id)->update([
            'competitor_id' => $request->competitor_id,
            'strategy' => $request->strategy,
            'description' => $request->description,
        ]);

    }

    public function destroytmstrategy($id){
        Tmstrategy::find($id)->delete();
}
}
