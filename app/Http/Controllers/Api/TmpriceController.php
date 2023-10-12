<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tmprice;

class TmpriceController extends Controller
{
    public function createtmprice(Request $request){

        $validateData = $request->validate([
            'sku_id' => 'required', 
            'sku_price' => 'required',
            'sku_strategy' => 'required',
        ]);
        $item = new Tmprice;
        $item->sku_id = $request->sku_id;
        $item->sku_price = $request->sku_price;
        $item->sku_strategy = $request->sku_strategy;
        $item->company_name = $request->userCompany;

        $item->save();
    }


    public function viewtmprices($id){
        $items = DB::table('tmprices')
                    ->join('tmcompetitorofferings','tmprices.sku_id','tmcompetitorofferings.id')
                    ->where('tmprices.company_name',$id)
                    ->select('tmcompetitorofferings.sku_name','tmprices.*')
                    ->orderBy('tmprices.id','DESC')
                    ->get();

            return response()->json($items);
    }

    public function showtmprice($id){
        $item = Tmprice::find($id);

            return response()->json($item);
    }

    public function updatetmprice(Request $request,$id){

        Tmprice::find($id)->update([
            'sku_id' => $request->sku_id,
            'sku_price' => $request->sku_price,
            'sku_strategy' => $request->sku_strategy,
        ]);

    }

    public function destroytmprice($id){
        Tmprice::find($id)->delete();
}
}
