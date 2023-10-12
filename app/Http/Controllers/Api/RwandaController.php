<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class RwandaController extends Controller
{
    public function provincedetails(){
            $provinces = DB::table('rwanda_provinces')
                        ->join('countries','rwanda_provinces.country_id','countries.id')
                        ->select('countries.country_name','rwanda_provinces.*')
                        ->get();

            return response()->json($provinces);
    }

    public function viewdistricts($id){
        $districts = DB::table('rwanda_districts')
                    ->join('rwanda_provinces','rwanda_districts.province_id','rwanda_provinces.id')
                    ->where('rwanda_districts.province_id',$id)
                    ->select('rwanda_provinces.province','rwanda_districts.*')
                    ->get();

        return response()->json($districts);
}

public function viewsectors($id){ 
    $sectors = DB::table('rwanda_sectors')
                ->join('rwanda_districts','rwanda_sectors.district_id','rwanda_districts.id')
                ->where('rwanda_sectors.district_id',$id)
                ->select('rwanda_districts.district_name','rwanda_sectors.*')
                ->get();

    return response()->json($sectors);
}

public function viewcells($id){
    $cells = DB::table('rwanda_cells')
                ->join('rwanda_sectors','rwanda_cells.sector_id','rwanda_sectors.id')
                ->where('rwanda_cells.sector_id',$id)
                ->select('rwanda_sectors.sector_name','rwanda_cells.*')
                ->get();

    return response()->json($cells);
}

public function viewstreets($id){
    $streets = DB::table('rwanda_streets')
                ->join('rwanda_cells','rwanda_streets.cell_id','rwanda_cells.id')
                ->where('rwanda_streets.cell_id',$id)
                ->select('rwanda_cells.cell_name','rwanda_streets.*')
                ->get();

    return response()->json($streets);
}






}
