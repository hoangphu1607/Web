<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ManageOrder extends Controller
{
    //show page manage order
    public function showListOrder(Request $request)
    {
        return view('pages.admin.list_order');
    }

    public function allBillUserOrder()
    {
        $dataBill = DB::table('bill')
        ->join('user','user.id','=','bill.b_user_id')
        ->join('city','city.city_code','=','bill.city')
        ->join('district','district.district_code','=','bill.district')
        ->join('wards','wards.wards_code','=','bill.ward')
        ->select('bill.*','user.u_name', DB::raw("CONCAT(city.city_name,', ', district.district_name,', ', wards.wards_name) as address"))
        ->get();
        
        return response()->json([
            'data' =>  $dataBill
        ]);
    }
}
