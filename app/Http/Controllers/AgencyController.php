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
        $agency->registereddate = date('Y-m-d');
        $agency->save();

        $success['success'] = 'ok';
        return response()->json($success, 201);
    }
}