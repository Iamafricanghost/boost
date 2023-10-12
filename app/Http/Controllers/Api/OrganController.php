<?php

namespace App\Http\Controllers\Api;

use App\Models\Organ;
use App\Models\AssignOrgan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;



class OrganController extends Controller
{
    public function createorgan(Request $request){

        $validateData = $request->validate([
            'title' => 'required',
        ]);

        $userid = DB::table('users')->where('name',$request->userName)->first()->id;

        $organ = new Organ;
        $organ->user_id = $userid;
        $organ->title = $request->title;

        $organ->save();
    }

    public function vieworgans($id){
        $userid = DB::table('users')->where('name',$id)->first()->id;

        $organs = DB::table('organs')
                    ->join('users','organs.user_id','users.id')
                    ->where('organs.user_id',$userid)
                    ->select('users.name','organs.*')
                    ->orderBy('organs.id','DESC')
                    ->get();

            return response()->json($organs);
    }

    public function destroyorgan($id){
                //Unlink an image from storage
                DB::table('organs')->where('id',$id)->delete();
    }

    public function showorgan($id){


        $organs = Organ::find($id);

            return response()->json($organs);
    }

    public function updateorgan(Request $request,$id){
        $data = array();
        $data['title'] = $request->title;
        $user = DB::table('organs')->where('id',$id)->update($data);
        
    
    }

    public function assignorgan(Request $request){

        $validateData = $request->validate([
            'organ_id' => 'required',
            'company_id' => 'required',
        ]);

        $userid = DB::table('users')->where('name',$request->userName)->first()->id;

     $AssignOrgan = new AssignOrgan;
     $AssignOrgan->organ_id = $request->organ_id;
     $AssignOrgan->company_id = $request->company_id;
     $AssignOrgan->created_by = $userid;

     $AssignOrgan->save();


    }

    public function vieworgandetails($id){
        // $userid = DB::table('users')->where('name',$id)->first()->id;

        $details = DB::table('assign_organs')
                    ->join('companies','assign_organs.company_id','companies.id')
                    ->join('organs','assign_organs.organ_id','organs.id')
                    ->where('assign_organs.organ_id',$id)
                    ->select('companies.company_name','organs.title','assign_organs.*')
                    ->orderBy('assign_organs.id','DESC')
                    ->get();

            return response()->json($details);
    }

    public function destroyorganassignment($id){
        //Unlink an image from storage
        DB::table('assign_organs')->where('id',$id)->delete();
}
}
