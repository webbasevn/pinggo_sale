<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDms;

class DataDmsController extends Controller
{

    public function store(Request $request){

        $check = DataDms::where('date', $request->date)->first();

        if($check){
            DataDms::where('date', $request->date)->update([
                'data' => serialize($request->data)
            ]);
            return response()->json([
                'message' => 'cập nhật dữ liệu '.$request->date. ' thành công',
                'data' => null
            ],200);
        }

        DataDms::create([
            'date' => $request->date,
            'data' => serialize($request->data)
        ]);

        return  response()->json([
            'message' => 'Tạo mới thành công',
            'data' => null
        ],201);

    }
}
