<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Productbrand;

class BrandController extends Controller
{
    public function createbrand(Request $request){

        $validateData = $request->validate([
            'product_brand' => 'required',
            'subcategory_id' => 'required',
        ]);

        

        $brand = new Productbrand;
        $brand->product_brand = $request->product_brand;
        $brand->subcategory_id = $request->subcategory_id;
        $brand->company_name = $request->userCompany;

        $brand->save();
    }


    public function viewbrands($id){
        

        $brands = DB::table('productbrands')
                    ->join('productsubcategories','productbrands.subcategory_id','productsubcategories.id')
                    ->where('productbrands.company_name',$id)
                    ->select('productsubcategories.product_subcategory','productbrands.*')
                    ->orderBy('productbrands.id','DESC')
                    ->get();

            return response()->json($brands);
    }

    public function showbrand($id){


        $brand = Productbrand::find($id);

            return response()->json($brand);
    }

    public function updatebrand(Request $request,$id){
        $data = array();
        $data['product_brand'] = $request->product_brand;
        $data['subcategory_id'] = $request->subcategory_id;
        $user = DB::table('productbrands')->where('id',$id)->update($data);
    
    }


    public function destroybrand($id){
        DB::table('productbrands')->where('id',$id)->delete();
}
}
