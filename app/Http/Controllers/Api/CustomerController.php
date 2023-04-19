<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\StoreCutomerRequest;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function store(){ //StoreCutomerRequest $request

        $validate = Validator::make(request()->all(), [
			'fullname'  => 'required|max:255',
			'phone'     => 'required', //regex:/^\+?\d{1,3}[- ]?\d{9,}$/
			'city_id'   => 'required|exists:cities,id',
		]);

        if ($validate->fails()) {
            return response(['status' => false,'data' => null,'message'=>$validate->errors()], 422);
        }

        $customer = new Customer();

        $customer->fullname = request()->fullname;
        $customer->phone = request()->phone;
        $customer->city_id = request()->city_id;
        $customer->save();

        //pass customer to resource if you need extra data
        return response(['status' => true,'data' => $customer,'message'=>'successfully!!'], 200);



    }
}
