<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchandiser;
use Image;
use DB;

class MerchandiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchandisers = Merchandiser::all();
        return response()->json($merchandisers);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'name' => 'required',
            'email' => 'required|unique:merchandisers',
            'phone' => 'required|unique:merchandisers',
            'id_number' => 'required|unique:merchandisers',
            'expected_salary' => 'required',
            'residence' => 'required',
        ]);

        if($request->photo){
            $position = strpos($request->photo,';');
            $sub = substr($request->photo,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(500,500);

            $upload_path = 'backend/images/merchandiser/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            $merchandisers = new Merchandiser;
            $merchandisers->name = $request->name;
            $merchandisers->email = $request->email;
            $merchandisers->gender = $request->gender;
            $merchandisers->phone = $request->phone;
            $merchandisers->phone_type = $request->phone_type;
            $merchandisers->age = $request->age;
            $merchandisers->look_feel = $request->look_feel;
            $merchandisers->id_number = $request->id_number;
            $merchandisers->residence = $request->residence;
            $merchandisers->english_fluency = $request->english_fluency;
            $merchandisers->languages = $request->languages;
            $merchandisers->education_level = $request->education_level;
            $merchandisers->work_experience = $request->work_experience;
            $merchandisers->transferable_skills = $request->transferable_skills;
            $merchandisers->reporting_capability = $request->reporting_capability;
            $merchandisers->role_applied_for = $request->role_applied_for;
            $merchandisers->expected_salary = $request->expected_salary;
            $merchandisers->recommendation = $request->recommendation;
            $merchandisers->remarks = $request->remarks;
            $merchandisers->general_rating = $request->general_rating;
            $merchandisers->photo = $image_url;
            $merchandisers->save();

        }else{
            $merchandisers = new Merchandiser;
            $merchandisers->name = $request->name;
            $merchandisers->email = $request->email;
            $merchandisers->gender = $request->gender;
            $merchandisers->phone = $request->phone;
            $merchandisers->phone_type = $request->phone_type;
            $merchandisers->age = $request->age;
            $merchandisers->look_feel = $request->look_feel;
            $merchandisers->id_number = $request->id_number;
            $merchandisers->residence = $request->residence;
            $merchandisers->english_fluency = $request->english_fluency;
            $merchandisers->languages = $request->languages;
            $merchandisers->education_level = $request->education_level;
            $merchandisers->work_experience = $request->work_experience;
            $merchandisers->transferable_skills = $request->transferable_skills;
            $merchandisers->reporting_capability = $request->reporting_capability;
            $merchandisers->role_applied_for = $request->role_applied_for;
            $merchandisers->expected_salary = $request->expected_salary;
            $merchandisers->recommendation = $request->recommendation;
            $merchandisers->remarks = $request->remarks;
            $merchandisers->general_rating = $request->general_rating;
            $merchandisers->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merchandisers = Merchandiser::find($id);
        return response()->json($merchandisers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['gender'] = $request->gender;
        $data['phone'] = $request->phone;
        $data['phone_type'] = $request->phone_type;
        $data['look_feel'] = $request->look_feel;
        $data['id_number'] = $request->id_number;
        $data['residence'] = $request->residence;
        $data['english_fluency'] = $request->english_fluency;
        $data['languages'] = $request->languages;
        $data['education_level'] = $request->education_level;
        $data['work_experience'] = $request->work_experience;
        $data['transferable_skills'] = $request->transferable_skills;
        $data['reporting_capability'] = $request->reporting_capability;
        $data['role_applied_for'] = $request->reporting_capability;
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

            $upload_path = 'backend/images/merchandiser/';
            $image_url = $upload_path.$name;
            $successImg =  $img->save($image_url);

            if($successImg){
                $data['photo'] = $image_url;
                $img = DB::table('merchandisers')->where('id',$id)->first();
                $image_path = $img->photo;

                $done = unlink($image_path);
                $user = DB::table('merchandisers')->where('id',$id)->update($data);
            }
        }
        else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('merchandisers')->where('id',$id)->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                //Unlink an image from storage
                $merchandiser = DB::table('merchandisers')->where('id',$id)->first();
                $photo = $merchandiser->photo;
                if($photo){
                    unlink($photo);
                    DB::table('merchandisers')->where('id',$id)->delete();
                }
                else{
                    DB::table('merchandisers')->where('id',$id)->delete();
                }
    }
}
