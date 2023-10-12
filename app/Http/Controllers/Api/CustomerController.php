<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function createcustomer(Request $request){

        $validateData = $request->validate([
            'customer_name' => 'required|unique:customers',
            'office_address' => 'required',
            'contact_name' => 'required',
            'contact_level' => 'required',
            'contact_phone' => 'required|min:10',
            'contact_email' => 'required',
            'tin' => 'required',
            'account_manager' => 'required',
        ]);

        $userid = DB::table('users')->where('name',$request->userName)->first()->id;

        $customer = new Customer;
        $customer->customer_name = $request->customer_name;
        $customer->office_address = $request->office_address;
        $customer->contact_name = $request->contact_name;
        $customer->contact_level = $request->contact_level;
        $customer->contact_phone = $request->contact_phone;
        $customer->contact_email = $request->contact_email;
        $customer->tin = $request->tin;
        $customer->account_manager = $request->account_manager;
        $customer->company_name = $request->userCompany;

        $customer->save();
    }


    public function viewcustomers($id){
        

        $customers = DB::table('customers')
                    ->join('employees','customers.account_manager','employees.id')
                    ->where('customers.company_name',$id)
                    ->select('employees.name','customers.*')
                    ->orderBy('customers.id','DESC')
                    ->get();

            return response()->json($customers);
    }

    public function showcustomer($id){


        $customer = Customer::find($id);

            return response()->json($customer);
    }

    public function updatecustomer(Request $request,$id){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['office_address'] = $request->office_address;
        $data['contact_name'] = $request->contact_name;
        $data['contact_level'] = $request->contact_level;
        $data['contact_phone'] = $request->contact_phone;
        $data['contact_email'] = $request->contact_email;
        $data['tin'] = $request->tin;
        $data['account_manager'] = $request->account_manager;
        $user = DB::table('customers')->where('id',$id)->update($data);
    
    }


    public function destroycustomer($id){
        DB::table('customers')->where('id',$id)->delete();
}
}
