<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Carbon; 
use DB;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['login','signup','userdetails']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email'=>'required',
            'password'=>'required'

        ]);


        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or Password is incorrect'], 401);
        }
                return $this->respondWithToken($token);
        
    }

    public function userdetails(){
       $userid = auth()->user()->id;
       $user = DB::table('users')->where('id',$userid)->get();

       return response()->json($user); 
    }

    // User Signup function
    public function signup(Request $request){
        $validateData = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|unique:users',
            'phone'=>'required|unique:users|min:10',
            'company_name'=>'required',
            'company_reg'=>'required',
            'password'=>'required|min:6|confirmed',
        ]);

        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['company_name']=$request->company_name;
        $data['company_reg']=$request->company_reg;
        $data['role']="user";
        $data['status']="inactive";
        $data['password']= Hash::make($request->password);
        $data['created_at']=Carbon::now();

        DB::table('users')->insert($data);

        return $this->login($request);

    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([ 
            'access_token' => $token,
            'token_type' => 'bearer',
            'name' => auth()->user()->name,
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
            'role' => auth()->user()->role,
            'status' => auth()->user()->status,
            'phone' => auth()->user()->phone,
            'company_name' => auth()->user()->company_name,
            'company_reg' => auth()->user()->company_reg,
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
        
    }


}
