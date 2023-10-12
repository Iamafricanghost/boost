<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RoutePermissionController extends Controller
{
    public function checkpermission($userName){ 

        $role = DB::table('users')->where('name',$userName)->first()->role;

        return response()->json($role);
    }
}
