<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;

class ProductController extends Controller
{
    public function update(Request $request)
    {
        $rules = [
            'pcode' => 'required',
            'vendorid' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->errors()->first();    
            $err['error'] = $error;
            return response()->json($err, 201);
        }

        $product = Product::where('pcode', '=', $request->pcode)->get()->first();

        if ($product) {
            $desc = isset($request->description) && $request->description ? $request->description : '';

            $product->update([
                        'vendorid' => $request->vendorid,
                        'description' => $desc
                    ]);

            $success['success'] = 'ok';
            return response()->json($success, 201);
        }
        else {
            $err['error'] = "pcode $request->pcode doesn't exist.";
            return response()->json($err, 201);
        }
    }
}
