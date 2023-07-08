<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLastMonth;

class DataLastMonthController extends Controller
{

    public function store(Request $request){

        $check = DataLastMonth::where('month', $request->month)->first();

        if($check){
            return response()->json([
                'message' => 'Đã có dữ liệu '.$request->month. ' rồi',
                'data' => null
            ],403);
        }

        DataLastMonth::create([
            'month' => $request->month,
            'data' => serialize($request->data)
        ]);

        return  response()->json([
            'message' => 'Tạo mới thành công',
            'data' => null
        ],201);
    }
}
