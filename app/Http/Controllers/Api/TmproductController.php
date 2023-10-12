<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\TmProduct;

class TmproductController extends Controller
{
    public function createtmproduct(Request $request){

        $validateData = $request->validate([
            'campaign_id' => 'required',
            'sku_id' => 'required',
        ]);

        
        $variant = DB::table('productskus')->where('id',$request->sku_id)->first()->variant_id;

        $product = new TmProduct;
        $product->campaign_id = $request->campaign_id;
        $product->variant_id = $variant;
        $product->sku_id = $request->sku_id;
        $product->company_name = $request->userCompany;

        $product->save();
    }


    public function viewtmproducts($id){
        

        $products = DB::table('tm_products')
                    ->join('campaigns','tm_products.campaign_id','campaigns.id')
                    ->join('productvariants','tm_products.variant_id','productvariants.id')
                    ->join('productskus','tm_products.sku_id','productskus.id')
                    ->where('tm_products.company_name',$id)
                    ->select('campaigns.campaign_name','productvariants.product_variant','productskus.*','tm_products.*')
                    ->orderBy('tm_products.id','DESC')
                    ->get();

            return response()->json($products);
    }

    public function showtmproduct($id){


        $products = TmProduct::find($id);

            return response()->json($products);
    }

    public function updatetmproduct(Request $request,$id){
        $variant = DB::table('productskus')->where('id',$request->sku_id)->first()->variant_id;
        $data = array();

        $data['campaign_id'] = $request->campaign_id;
        $data['sku_id'] = $request->sku_id;
        $data['variant_id'] = $variant;
        $user = DB::table('tm_products')->where('id',$id)->update($data);
    }


    public function destroytmproduct($id){
        DB::table('tm_products')->where('id',$id)->delete();
}
}
