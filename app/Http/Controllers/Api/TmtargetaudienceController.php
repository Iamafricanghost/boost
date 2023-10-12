<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tmtargetaudience;

class TmtargetaudienceController extends Controller
{
    public function createtmaudience(Request $request){

        $validateData = $request->validate([
            'sku_id' => 'required', 
            'demographic' => 'required',
            'preference' => 'required',
        ]);
        $audience = new Tmtargetaudience;
        $audience->sku_id = $request->sku_id;
        $audience->demographic = $request->demographic;
        $audience->preference = $request->preference;
        $audience->company_name = $request->userCompany;

        $audience->save();
    }


    public function viewtmaudiences($id){



        $audiences = DB::table('tmtargetaudiences')
                    ->join('tmcompetitorofferings','tmtargetaudiences.sku_id','tmcompetitorofferings.id')
                    ->where('tmtargetaudiences.company_name',$id)
                    ->select('tmcompetitorofferings.sku_name','tmtargetaudiences.*')
                    ->orderBy('tmtargetaudiences.id','DESC')
                    ->get();

            return response()->json($audiences);
    }

    public function showtmaudience($id){


        $audience = Tmtargetaudience::find($id);

            return response()->json($audience);
    }

    public function updatetmaudience(Request $request,$id){
        $data = array();

        $data['sku_id'] = $request->sku_id;
        $data['demographic'] = $request->demographic;
        $data['preference'] = $request->preference;
        $user = DB::table('tmtargetaudiences')->where('id',$id)->update($data);
    
    }

    public function destroytmaudience($id){
        DB::table('tmtargetaudiences')->where('id',$id)->delete();
}
}
