<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;
use DB;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = DB::table('levels')
                    ->join('countries','levels.country_id','countries.id')
                    ->select('countries.country_name','levels.*')
                    ->orderBy('levels.id','ASC')
                    ->get();
                    return response()->json($levels);
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
            'level_category' => 'required',
            'level_name' => 'required',
            'country_id' => 'required',
        ]);

        $levels = new Level;
        $levels->level_category = $request->level_category;
        $levels->level_name = $request->level_name;
        $levels->country_id = $request->country_id;
        $levels->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $levels = Level::find($id);
        return response()->json($levels);
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
        $data['level_category'] = $request->level_category;
        $data['level_name'] = $request->level_name;
        $data['country_id'] = $request->country_id;
        $user = DB::table('levels')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Level::find($id)->delete();
    }
}
