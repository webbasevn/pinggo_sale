<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLastMonth;

class DataLastMonthController extends Controller
{
    public function store(DataLastMonth $dataLastMonth){
        $dataLastMonth->create([
            'month' => 6,
            'data' => 'hello world'
        ]);

        return  response()->json([
            'message' => 'Tạo mới thành công',
            'data' => null
        ],201);
    }
}
