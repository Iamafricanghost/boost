<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use App\Models\BrandAmbassador;

class BrandAmbassadorController extends Controller
{
    public function createambassador(Request $request){

        $validateData = $request->validate([
            'name' => 'required|unique:brand_ambassadors',
            'email' => 'required|unique:brand_ambassadors',
            'gender'  => 'required',
            'phone' => 'required|unique:brand_ambassadors',
            'phone_type'  => 'required',
            'age'  => 'required',
            'look_feel'  => 'required',
            'id_number'  => 'required|unique:brand_ambassadors',
            'residence'  => 'required',
            'english_fluency'  => 'required',
            'languages'  => 'required',
            'education_level'  => 'required',
            'work_experience'  => 'required',
            'transferable_skills'  => 'required',
            'reporting_capability'  => 'required',
            'role_applied_for'  => 'required',
            'expected_salary'  => 'required',
            'recommendation'  => 'required',
            'remarks'  => 'required',
            'general_rating'  => 'required',
        ]);

        $userid = DB::table('users')->where('name',$request->userName)->first()->id;




        if($request->photo){
            $position = strpos($request->photo,';');
            $sub = substr($request->photo,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(500,500);

            $upload_path = 'backend/images/ambassadors/';
            $image_url = $upload_path.$name;
            $img->save($image_url);


            $ambassador = new BrandAmbassador;
            $ambassador->name = $request->name;
            $ambassador->email = $request->email;
            $ambassador->gender = $request->gender;
            $ambassador->phone = $request->phone;
            $ambassador->phone_type = $request->phone_type;
            $ambassador->age = $request->age;
            $ambassador->look_feel = $request->look_feel;
            $ambassador->id_number = $request->id_number;
            $ambassador->residence = $request->residence;
            $ambassador->english_fluency = $request->english_fluency;
            $ambassador->languages = $request->languages;
            $ambassador->education_level = $request->education_level;
            $ambassador->work_experience = $request->work_experience;
            $ambassador->transferable_skills = $request->transferable_skills;
            $ambassador->reporting_capability = $request->reporting_capability;
            $ambassador->role_applied_for = $request->role_applied_for;
            $ambassador->expected_salary = $request->expected_salary;
            $ambassador->recommendation = $request->recommendation;
            $ambassador->remarks = $request->remarks;
            $ambassador->general_rating = $request->general_rating;
            $ambassador->photo = $image_url;
            $ambassador->created_by = $userid;
            $ambassador->save();


        }else{
            $ambassador = new BrandAmbassador;
            $ambassador->name = $request->name;
            $ambassador->email = $request->email;
            $ambassador->gender = $request->gender;
            $ambassador->phone = $request->phone;
            $ambassador->phone_type = $request->phone_type;
            $ambassador->age = $request->age;
            $ambassador->look_feel = $request->look_feel;
            $ambassador->id_number = $request->id_number;
            $ambassador->residence = $request->residence;
            $ambassador->english_fluency = $request->english_fluency;
            $ambassador->languages = $request->languages;
            $ambassador->education_level = $request->education_level;
            $ambassador->work_experience = $request->work_experience;
            $ambassador->transferable_skills = $request->transferable_skills;
            $ambassador->reporting_capability = $request->reporting_capability;
            $ambassador->role_applied_for = $request->role_applied_for;
            $ambassador->expected_salary = $request->expected_salary;
            $ambassador->recommendation = $request->recommendation;
            $ambassador->remarks = $request->remarks;
            $ambassador->general_rating = $request->general_rating;
            $ambassador->created_by = $userid;
            $ambassador->save();
        } 
    }


    public function viewambassadors($id){

        $ambassadors = DB::table('brand_ambassadors')->get();
            return response()->json($ambassadors);
    }

    public function showambassador($id){


        $ambassador = BrandAmbassador::find($id);

            return response()->json($ambassador);
    }

    public function updateambassador(Request $request,$id){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['gender'] = $request->gender;
        $data['phone'] = $request->phone;
        $data['phone_type'] = $request->phone_type;
        $data['age'] = $request->age;
        $data['look_feel'] = $request->look_feel;
        $data['id_number'] = $request->id_number;
        $data['residence'] = $request->residence;
        $data['english_fluency'] = $request->english_fluency;
        $data['languages'] = $request->languages;
        $data['education_level'] = $request->education_level;
        $data['work_experience'] = $request->work_experience;
        $data['transferable_skills'] = $request->transferable_skills;
        $data['reporting_capability'] = $request->reporting_capability;
        $data['role_applied_for'] = $request->role_applied_for;
        $data['expected_salary'] = $request->expected_salary;
        $data['recommendation'] = $request->recommendation;
        $data['remarks'] = $request->remarks;
        $data['general_rating'] = $request->general_rating;
        
        $image = $request->newphoto;

        if($image){
            $position = strpos($image,';');
            $sub = substr($image,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($image)->resize(500,500);

            $upload_path = 'backend/images/ambassadors/';
            $image_url = $upload_path.$name;
            $successImg =  $img->save($image_url);

            if($successImg){
                $data['photo'] = $image_url;
                $img = DB::table('brand_ambassadors')->where('id',$id)->first();
                $image_path = $img->photo;

                $done = unlink($image_path);
                $user = DB::table('brand_ambassadors')->where('id',$id)->update($data);
            }
        }
        else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('brand_ambassadors')->where('id',$id)->update($data);
        }
    
    }


    public function destroyambassador($id){
                //Unlink an image from storage
                $ambassador = DB::table('brand_ambassadors')->where('id',$id)->first();
                $photo = $ambassador->photo;
                if($photo){
                    unlink($photo);
                    DB::table('brand_ambassadors')->where('id',$id)->delete();
                }
                else{
                    DB::table('brand_ambassadors')->where('id',$id)->delete();
                }
    }
}
