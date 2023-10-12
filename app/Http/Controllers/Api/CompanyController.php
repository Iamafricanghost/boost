<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;



class CompanyController extends Controller
{
    public function createcompany(Request $request){

        $validateData = $request->validate([
            'country_id' => 'required',
            'company_name' => 'required|unique:companies',
            'legal_type' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required|min:10',
            'tin' => 'required|min:8',
            'address' => 'required',
        ]);
    

        if($request->photo){
            $position = strpos($request->photo,';');
            $sub = substr($request->photo,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(500,500);

            $upload_path = 'backend/images/companylogos/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            $company = new Company;
            $company->company_setup_name = $id;
            $company->country_id = $request->country_id;
            $company->company_name = $request->company_name;
            $company->legal_type = $request->legal_type;
            $company->company_email = $request->company_email;
            $company->company_phone = $request->company_phone;
            $company->tin = $request->tin;
            $company->address = $request->address;
            $company->logo = $image_url;

            $company->save();

        }else{
            $company = new Company;
            $company->company_setup_name = $id;
            $company->country_id = $request->country_id;
            $company->company_name = $request->company_name;
            $company->legal_type = $request->legal_type;
            $company->company_email = $request->company_email;
            $company->company_phone = $request->company_phone;
            $company->tin = $request->tin;
            $company->address = $request->address;

            $company->save();
        }
    }

    public function viewcompany($id){
        // $userid = DB::table('users')->where('name',$id)->first()->id;

        $companies = DB::table('companies')
                    ->join('countries','companies.country_id','countries.id')
                    ->where('companies.company_setup_name',$id)
                    ->select('countries.country_name','companies.*')
                    ->orderBy('companies.id','DESC')
                    ->get();

            return response()->json($companies);
    }

    public function destroycompany($id){
                //Unlink an image from storage
                $company = DB::table('companies')->where('id',$id)->first();
                $photo = $company->logo;
                if($photo){
                    unlink($photo);
                    DB::table('companies')->where('id',$id)->delete();
                }
                else{
                    DB::table('companies')->where('id',$id)->delete();
                }
    }

    public function showcompany($id){
        // $companies = DB::table('companies')
        //             ->join('users','companies.created_by','users.id')
        //             ->join('countries','companies.country_id','countries.id')
        //             ->where('companies.id',$id)
        //             ->select('users.name','countries.country_name','companies.*')
        //             ->orderBy('companies.id','DESC')
        //             ->get();

        $companies = Company::find($id);

            return response()->json($companies);
    }

    public function updatecompany(Request $request,$id){
        $data = array();
        $data['country_id'] = $request->country_id;
        $data['company_name'] = $request->company_name;
        $data['legal_type'] = $request->legal_type;
        $data['company_email'] = $request->company_email;
        $data['company_phone'] = $request->company_phone;
        $data['tin'] = $request->tin;
        $data['address'] = $request->address;
        
        $image = $request->newphoto;

        if($image){
            $position = strpos($image,';');
            $sub = substr($image,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($image)->resize(500,500);

            $upload_path = 'backend/images/companylogos/';
            $image_url = $upload_path.$name;
            $successImg =  $img->save($image_url);

            if($successImg){
                $data['logo'] = $image_url;
                $img = DB::table('companies')->where('id',$id)->first();
                $image_path = $img->logo;

                $done = unlink($image_path);
                $user = DB::table('companies')->where('id',$id)->update($data);
            }
        }
        else{
            $user = DB::table('companies')->where('id',$id)->update($data);
        }
    }
}
