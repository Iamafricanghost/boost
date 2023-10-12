<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use App\Models\Productsku;

class SkuController extends Controller
{
    public function createsku(Request $request){

        $validateData = $request->validate([
            'product_sku' => 'required',
            'variant_id' => 'required',

        ]);

        




        if($request->photo){
            $position = strpos($request->photo,';');
            $sub = substr($request->photo,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(500,500);

            $upload_path = 'backend/images/skus/';
            $image_url = $upload_path.$name;
            $img->save($image_url);


            $sku = new Productsku;
            $sku->product_sku = $request->product_sku;
            $sku->variant_id = $request->variant_id;
            $sku->photo = $image_url;
            $sku->company_name = $request->userCompany;
            $sku->save();


        }else{
            $sku = new Productsku;
            $sku->product_sku = $request->product_sku;
            $sku->variant_id = $request->variant_id;
            $sku->company_name = $request->userCompany;
            $sku->save();
        } 
    }


    public function viewskus($id){

       

        $skus = DB::table('productskus')
                    ->join('productvariants','productskus.variant_id','productvariants.id')
                    ->where('productskus.company_name',$id)
                    ->select('productvariants.product_variant','productskus.*')
                    ->orderBy('productskus.id','DESC')

                    ->get();

            return response()->json($skus);
    }

    public function showsku($id){


        $sku = Productsku::find($id);

            return response()->json($sku);
    }

    public function updatesku(Request $request,$id){
        $data = array();
        $data['product_sku'] = $request->product_sku;
        $data['variant_id'] = $request->variant_id;
        
        $image = $request->newphoto;

        if($image){
            $position = strpos($image,';');
            $sub = substr($image,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($image)->resize(500,500);

            $upload_path = 'backend/images/skus/';
            $image_url = $upload_path.$name;
            $successImg =  $img->save($image_url);

            if($successImg){
                $data['photo'] = $image_url;
                $img = DB::table('productskus')->where('id',$id)->first();
                $image_path = $img->photo;

                $done = unlink($image_path);
                $user = DB::table('productskus')->where('id',$id)->update($data);
            }
        }
        else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('productskus')->where('id',$id)->update($data);
        }
    
    }


    public function destroysku($id){
                //Unlink an image from storage
                $sku = DB::table('productskus')->where('id',$id)->first();
                $photo = $sku->photo;
                if($photo){
                    unlink($photo);
                    DB::table('productskus')->where('id',$id)->delete();
                }
                else{
                    DB::table('productskus')->where('id',$id)->delete();
                }
    }
}
