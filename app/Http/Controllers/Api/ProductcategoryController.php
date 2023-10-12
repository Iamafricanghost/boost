<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Productcategory;

class ProductcategoryController extends Controller
{
    public function createcategory(Request $request){

        $validateData = $request->validate([
            'product_category' => 'required',
        ]);

        

        $category = new Productcategory;
        $category->product_category = $request->product_category;
        $category->company_name = $request->userCompany;

        $category->save();
    }


    public function viewcategories($id){
        

        $categories = DB::table('productcategories')
                    ->where('productcategories.company_name',$id)
                    ->orderBy('productcategories.id','DESC')
                    ->get();

            return response()->json($categories);
    }

    public function showcategory($id){


        $category = Productcategory::find($id);

            return response()->json($category);
    }

    public function updatecategory(Request $request,$id){
        $data = array();
        $data['product_category'] = $request->product_category;
        $user = DB::table('productcategories')->where('id',$id)->update($data);
    
    }


    public function destroycategory($id){
        DB::table('productcategories')->where('id',$id)->delete();
}
}
