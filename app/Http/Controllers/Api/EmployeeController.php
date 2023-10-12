<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function createemployee(Request $request){

        $validateData = $request->validate([
            'name' => 'required|unique:employees',
            'email' => 'required|unique:employees',
            'phone' => 'required|unique:employees',
            'id_number'  => 'required|unique:employees',
            'salary'  => 'required',
            'residence'  => 'required',
        ]);

        




        if($request->photo){
            $position = strpos($request->photo,';');
            $sub = substr($request->photo,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(500,500);

            $upload_path = 'backend/images/employee/';
            $image_url = $upload_path.$name;
            $img->save($image_url);


            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->id_number = $request->id_number;
            $employee->salary = $request->salary;
            $employee->residence = $request->residence;
            $employee->photo = $image_url;
            $employee->joining_date = $request->joining_date;
            $employee->company_name = $request->company_name;
            $employee->save();


        }else{
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->id_number = $request->id_number;
            $employee->salary = $request->salary;
            $employee->residence = $request->residence;
            $employee->joining_date = $request->joining_date;
            $employee->company_name = $request->company_name;
            $employee->save();
        }  
    }


    public function viewemployees($id){
        $employees = DB::table('employees')
                ->where('company_name',$id)
                ->get();
            return response()->json($employees);
    }

    public function showemployee($id){


        $employee = Employee::find($id);

            return response()->json($employee);
    }

    public function updateemployee(Request $request,$id){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['id_number'] = $request->id_number;
        $data['salary'] = $request->salary;
        $data['residence'] = $request->residence;
        $data['joining_date'] = $request->joining_date;
  
        
        $image = $request->newphoto;

        if($image){
            $position = strpos($image,';');
            $sub = substr($image,0,$position);
            $ext = explode('/',$sub)[1];

            $name = time().".".$ext;
            $img = Image::make($image)->resize(500,500);

            $upload_path = 'backend/images/employee/';
            $image_url = $upload_path.$name;
            $successImg =  $img->save($image_url);

            if($successImg){
                $data['photo'] = $image_url;
                $img = DB::table('employees')->where('id',$id)->first();
                $image_path = $img->photo;

                $done = unlink($image_path);
                $user = DB::table('employees')->where('id',$id)->update($data);
            }
        }
        else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('employees')->where('id',$id)->update($data);
        }
    
    }


    public function destroyemployee($id){
                //Unlink an image from storage
                $employee = DB::table('employees')->where('id',$id)->first();
                $photo = $employee->photo;
                if($photo){
                    unlink($photo);
                    DB::table('employees')->where('id',$id)->delete();
                }
                else{
                    DB::table('employees')->where('id',$id)->delete();
                }
    }
}
