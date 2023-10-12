<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tmmessage;

class TmmessageController extends Controller
{
    public function createtmmessage(Request $request){

        $validateData = $request->validate([
            'sku_id' => 'required', 
            'message' => 'required',
            'tone' => 'required',
        ]);
        $message = new Tmmessage;
        $message->sku_id = $request->sku_id;
        $message->message = $request->message;
        $message->tone = $request->tone;
        $message->company_name = $request->userCompany;

        $message->save();
    }


    public function viewtmmessages($id){
        $messages = DB::table('tmmessages')
                    ->join('tmcompetitorofferings','tmmessages.sku_id','tmcompetitorofferings.id')
                    ->where('tmmessages.company_name',$id)
                    ->select('tmcompetitorofferings.sku_name','tmmessages.*')
                    ->orderBy('tmmessages.id','DESC')
                    ->get();

            return response()->json($messages);
    }

    public function showtmmessage($id){
        $message = Tmmessage::find($id);

            return response()->json($message);
    }

    public function updatetmmessage(Request $request,$id){

        Tmmessage::find($id)->update([
            'sku_id' => $request->sku_id,
            'message' => $request->message,
            'tone' => $request->tone,
        ]);

    }

    public function destroytmmessage($id){
        Tmmessage::find($id)->delete();
}
}
