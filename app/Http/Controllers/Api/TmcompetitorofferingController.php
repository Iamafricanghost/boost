<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use App\Models\Tmcompetitoroffering;

class TmcompetitorofferingController extends Controller
{
    public function createtmoffering(Request $request){

        $validateData = $request->validate([
            'competitor_id' => 'required',
            'sku_name' => 'required',
            'sku_brief' => 'required',

        ]);
        if($request->photo){
            $position = strpos($request->photo,';');
            $sub = substr($request->photo,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(500,500);

            $upload_path = 'backend/images/competitor_skus/';
            $image_url = $upload_path.$name;
            $img->save($image_url);


            $sku = new Tmcompetitoroffering;
            $sku->competitor_id = $request->competitor_id;
            $sku->sku_name = $request->sku_name;
            $sku->sku_brief = $request->sku_brief;
            $sku->photo = $image_url;
            $sku->company_name = $request->userCompany;
            $sku->save();


        }else{
            $sku = new Tmcompetitoroffering;
            $sku->competitor_id = $request->competitor_id;
            $sku->sku_name = $request->sku_name;
            $sku->sku_brief = $request->sku_brief;
            $sku->company_name = $request->userCompany;
            $sku->save();
        } 
    }


    public function viewtmofferings($id){
        $offerings = DB::table('tmcompetitorofferings')
                    ->join('tmcompetitors','tmcompetitorofferings.competitor_id','tmcompetitors.id')
                    ->where('tmcompetitorofferings.company_name',$id)
                    ->select('tmcompetitors.competitor_name','tmcompetitorofferings.*')
                    ->orderBy('tmcompetitorofferings.id','DESC')
                    ->get();

            return response()->json($offerings);
    }

    public function showtmoffering($id){
        $offerings = Tmcompetitoroffering::find($id);
        return response()->json($offerings);
    }

    public function updatetmoffering(Request $request,$id){
        $data = array();
        $data['competitor_id'] = $request->competitor_id;
        $data['sku_name'] = $request->sku_name;
        $data['sku_brief'] = $request->sku_brief;
        
        $image = $request->newphoto;

        if($image){
            $position = strpos($image,';');
            $sub = substr($image,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($image)->resize(500,500);

            $upload_path = 'backend/images/competitor_skus/';
            $image_url = $upload_path.$name;
            $successImg =  $img->save($image_url);

            if($successImg){
                $data['photo'] = $image_url;
                $img = DB::table('tmcompetitorofferings')->where('id',$id)->first();
                $image_path = $img->photo;

                $done = unlink($image_path);
                $user = DB::table('tmcompetitorofferings')->where('id',$id)->update($data);
            }
        }
        else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('tmcompetitorofferings')->where('id',$id)->update($data);
        }
    
    }


    public function destroytmoffering($id){
    //Unlink an image from storage
    $sku = DB::table('tmcompetitorofferings')->where('id',$id)->first();
    $photo = $sku->photo;
    if($photo){
        unlink($photo);
        DB::table('tmcompetitorofferings')->where('id',$id)->delete();
    }
    else{
        DB::table('tmcompetitorofferings')->where('id',$id)->delete();
    }
}
}
