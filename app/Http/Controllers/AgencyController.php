<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Agency;

class AgencyController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'agcode' => 'required',
            'agname' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->errors()->first();    
            $err['error'] = $error;
            return response()->json($err, 201);
        }

        //check if agcode already exists
        $agency = Agency::where('agcode', $request->agcode)->get()->first();
        if ($agency) {
            $err['error'] = "agcode $request->agcode already exists.";
            return response()->json($err, 201);
        }

        //create agency
        $agency = new Agency();
        $agency->agcode = $request->agcode;
        $agency->agname = $request->agname;
        $agency->phone = isset($request->phone) && $request->phone ? $request->phone : '';
        $agency->add1 = isset($request->add1) && $request->add1 ? $request->add1 : '';
        $agency->add2 = isset($request->add2) && $request->add2 ? $request->add2 : '';
        $agency->city = isset($request->city) && $request->city ? $request->city : '';
        $agency->state = isset($request->state) && $request->state ? $request->state : '';
        $agency->ZIP = isset($request->ZIP) && $request->ZIP ? $request->ZIP : '';
        $agency->country = isset($request->country) && $request->country ? $request->country : '';
        $agency->email = isset($request->email) && $request->email ? $request->email : '';
        $agency->URL = isset($request->URL) && $request->URL ? $request->URL : '';
        $agency->active = isset($request->active) && $request->active ? $request->active : '';
        $agency->registereddate = date('Y-m-d');
        $agency->save();

        $success['success'] = 'ok';
        return response()->json($success, 201);
    }
}