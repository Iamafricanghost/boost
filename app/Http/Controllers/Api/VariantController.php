<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Productvariant;

class VariantController extends Controller
{
    public function createvariant(Request $request){

        $validateData = $request->validate([
            'product_variant' => 'required',
            'brand_id' => 'required',
        ]);

        $userid = DB::table('users')->where('name',$request->userName)->first()->id;

        $variant = new Productvariant;
        $variant->product_variant = $request->product_variant;
        $variant->brand_id = $request->brand_id;
        $variant->company_name = $request->userCompany;

        $variant->save();
    }


    public function viewvariants($id){
        

        $variants = DB::table('productvariants')
                    ->join('productbrands','productvariants.brand_id','productbrands.id')
                    ->where('productvariants.company_name',$id)
                    ->select('productbrands.product_brand','productvariants.*')
                    ->orderBy('productvariants.id','DESC')

                    ->get();

            return response()->json($variants);
    }

    public function showvariant($id){


        $variant = Productvariant::find($id);

            return response()->json($variant);
    }

    public function updatevariant(Request $request,$id){
        $data = array();
        $data['product_variant'] = $request->product_variant;
        $data['brand_id'] = $request->brand_id;
        $user = DB::table('productvariants')->where('id',$id)->update($data);
    
    }


    public function destroyvariant($id){
        DB::table('productvariants')->where('id',$id)->delete();
}
}
