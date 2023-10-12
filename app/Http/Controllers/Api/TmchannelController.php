<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\TmChannel;

class TmchannelController extends Controller
{
    public function createtmchannel(Request $request){

        $validateData = $request->validate([
            'campaign_id' => 'required',
            'country_id' => 'required',
            'channel' => 'required',
            'channel_description' => 'required',
        ]);


        $userid = DB::table('users')->where('name',$request->userName)->first()->id;

        $channel = new TmChannel;
        $channel->campaign_id = $request->campaign_id;
        $channel->country_id = $request->country_id;
        $channel->channel = $request->channel;
        $channel->channel_description = $request->channel_description;
        $channel->company_name = $request->userCompany;

        $channel->save();
    }


    public function viewtmchannels($id){
    
        $channels = DB::table('tm_channels')
                    ->join('campaigns','tm_channels.campaign_id','campaigns.id')
                    ->join('countries','tm_channels.country_id','countries.id')
                    ->where('tm_channels.company_name',$id)
                    ->select('campaigns.campaign_name','countries.country_name','tm_channels.*')
                    ->orderBy('tm_channels.id','DESC')
                    ->get();

            return response()->json($channels);
    }

    public function showtmchannel($id){


        $channels = TmChannel::find($id);

            return response()->json($channels);
    }

    public function updatetmchannel(Request $request,$id){
        $data = array();

        $data['campaign_id'] = $request->campaign_id;
        $data['country_id'] = $request->country_id;
        $data['channel'] = $request->channel;
        $data['channel_description'] = $request->channel_description;
        $user = DB::table('tm_channels')->where('id',$id)->update($data);

    }


    public function destroytmchannel($id){
        DB::table('tm_channels')->where('id',$id)->delete();
}
}
