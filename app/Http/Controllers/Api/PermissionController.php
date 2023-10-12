<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Carbon; 
use DB;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    

    // public function __construct(){
        
    // }

    public function createpermission(Request $request,$id){
        
        $validateData = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|unique:users',
            'phone'=>'required|unique:users|min:10',
            'password'=>'required|min:6|confirmed',
        ]);

        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['company_name']=$request->company_name;
        $data['company_reg']=$request->company_reg;
        $data['role']= $request->role;
        $data['status']= $request->status;;
        $data['password']= Hash::make($request->password);
        $data['created_at']=Carbon::now();
        $data['created_by']=$id;

        DB::table('users')->insert($data);
    }

    public function viewpermission(){

        // $this->authorize('isSuperadmin');

        $users = DB::table('users')->get();
                        
        return response()->json($users);
    
       
    }

    public function viewusers($id){

        // $this->authorize('isSuperadmin');
        
        $users = DB::table('users')
        ->where('users.company_reg',$id)
        ->get();
                        
        return response()->json($users);
    }

    public function showpermission($id){
        
        $permission = User::find($id);

        return response()->json($permission);
    }

    public function updatepermission(Request $request, $id){



        if($request->password === null){
            $data = array();
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['phone']=$request->phone;
            $data['company_name']=$request->company_name;
            $data['company_reg']=$request->company_reg;
            $data['role']= $request->role;
            $data['status']= $request->status;
            $data['updated_at']=Carbon::now();
    
    
            DB::table('users')->where('id',$id)->update($data);
        }else{
            $data = array();
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['phone']=$request->phone;
            $data['company_name']=$request->company_name;
            $data['company_reg']=$request->company_reg;
            $data['role']= $request->role;
            $data['status']= $request->status;;
            $data['password']= Hash::make($request->password);
            $data['updated_at']=Carbon::now();
    
    
            DB::table('users')->where('id',$id)->update($data);
        }


        // User::find($id)->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'company_name' => $request->company_name,
        //     'company_reg' => $request->company_reg,
        //     'role' => $request->role,
        //     'status' => $request->status,
        //     'password' => Hash::make($request->password),
        // ]);
    }

    public function destroypermission($id){
        
        User::find($id)->delete();
    }
}
