<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function results($datatype='', $from='', $to='') {
        if (!$datatype || !$from || !$to) {
            $err['error'] = 'Please provide all data required.';
            return response()->json($err, 201);
        }

        if (in_array($datatype, array('booking', 'travel'))) {
            $results = DB::table('tblitem as i')
                        ->join('tblbooking as b', 'b.resnum', '=', 'i.resnum')
                        ->join('tblagency as a', 'a.agcode', '=', 'b.agcode')
                        ->select(DB::raw("a.agname, i.vendorid, i.resnum, i.pcode, i.price, i.nights, i.occupancy, i.status"));

            if ($datatype == 'travel')
                $results = $results->whereBetween('i.depdate', [$from, $to]);
            else
                $results = $results->whereBetween('b.bookingdate', [$from, $to]);
            
            $results = $results->get();

            $res = array();
            foreach ($results as $rs) {
                $rs = (array) $rs;
                $rs['from'] = $from;
                $rs['to'] = $to;
                $res[] = $rs;
            }
            
            $json = json_encode($res);
            return $json;
        }
        else {
            $err['error'] = 'Please provide a valid data type.';
            return response()->json($err, 201);
        }
    }
}
