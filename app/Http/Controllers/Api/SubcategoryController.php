<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Productsubcategory;

class SubcategoryController extends Controller
{
    public function createsubcategory(Request $request){

        $validateData = $request->validate([
            'product_subcategory' => 'required',
            'category_id' => 'required',
        ]);

       
        $subcategory = new Productsubcategory;
        $subcategory->product_subcategory = $request->product_subcategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->company_name = $request->userCompany;

        $subcategory->save();
    }


    public function viewsubcategories($id){

        $subcategories = DB::table('productsubcategories')
                    ->join('productcategories','productsubcategories.category_id','productcategories.id')
                    ->where('productsubcategories.company_name',$id)
                    ->select('productcategories.product_category','productsubcategories.*')
                    ->orderBy('productcategories.id','DESC')
                    ->get();

            return response()->json($subcategories);
    }

    public function showsubcategory($id){


        $subcategory = Productsubcategory::find($id);

            return response()->json($subcategory);
    }

    public function updatesubcategory(Request $request,$id){
        $data = array();
        $data['product_subcategory'] = $request->product_subcategory;
        $data['category_id'] = $request->category_id;
        $user = DB::table('productsubcategories')->where('id',$id)->update($data);
    
    }


    public function destroysubcategory($id){
        DB::table('productsubcategories')->where('id',$id)->delete();
}
}
