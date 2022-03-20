<?php

namespace App\Http\Controllers\API;

use DB;   
use Carbon\Carbon;
use App\Http\Requests;/*Route for client requests*/
use Illuminate\Http\Request;
use App\Http\Resources\CustomerResource;
use App\Http\Controllers\API\BaseController as BaseController;
//DbModels
use App\Models\{Customer,Commune};


class CustomerController extends BaseController
{

    //Returns the customer data according to the query established in CustomerResource
    public function getData()
    {
        $customers = Customer::join('regions','customers.id_reg','=','regions.id_reg')
        ->join('communes','communes.id_com','=','customers.id_com')
        ->where('customers.status','A')
        ->select('customers.dni','customers.name','customers.last_name','customers.address',DB::raw("CONCAT(regions.description,' - ',communes.description) AS description"))
        ->get();
        return [CustomerResource::collection($customers),'success'=>true];
    }

    //The data in CustomerRequest is validated, AND the customer data is saved
    public function store(Requests\CustomerRequest $request){
        if (Commune::find($request->id_com)->id_reg != $request->id_reg) {
            return ['error'=>'Error! Failed to save the client. The commune has no relationship with the region.','success'=>false];
        }
        $customer = new Customer;
        $customer->dni = $request->dni;
        $customer->id_com = $request->id_com;
        $customer->id_reg = $request->id_reg;
        $customer->email = $request->email;
        $customer->name = $request->name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->status = 'A';
        $customer->date_reg = Carbon::now();
        if($customer->save()){
            return [new CustomerResource($customer),'success'=>true];
        }else{
            return ['error'=>'Error! Failed to save the client.','success'=>false];
        }
    } 

    //Returns the user's data according to their ID or email
    public function show(Request $request, $column)
    {
        //a union of the clients, regions and common tables is performed. Only the data indicated in the requirements are selected
        $customers= Customer::join('regions','customers.id_reg','=','regions.id_reg')
        ->join('communes','communes.id_com','=','customers.id_com')
        ->where('customers.status','A')
        ->where(function($query) use ($column,$request){
            $column==1 ? $query->where('dni',$request->dni):$query->where('email',$request->email);
        })
        ->select('customers.dni','customers.name','customers.last_name','customers.address',DB::raw("CONCAT(regions.description,' - ',communes.description) AS description"))
        ->get();
        return [CustomerResource::collection($customers),'success'=>true];
    }
   
    //Delete the client logically
    public function destroy($dni)
    {
        //check that the client exists   
        if (Customer::where('dni',$dni)->exists()) {
            if (Customer::find($dni)->delete()) {
                return ['success'=>true,'message'=>'Client removed successfully'];
            }else{
                return ['success'=>false,'message'=>'Registro no existe'];
            }  
        }else{
            return ['success'=>false,'message'=>'Registro no existe'];
        }
        
    }
}