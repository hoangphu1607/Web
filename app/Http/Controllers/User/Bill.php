<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Bill extends Controller
{
    public function showBill(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $dataBill = DB::table('bill_detail')
        ->select('bill_detail.*','product.pro_name', 'description_detail.type','product.pro_avatar')
        ->join('description_detail','description_detail.id','=','bill_detail.description_detail_id')
        ->join('product','product.id','=','bill_detail.bd_product_id')
        ->join('bill','bill.b_id','=','bill_detail.bd_bill_id')
        ->where('b_user_id',$user_id)
        ->where('b_status',0) //lấy ra bill đang đặt
        ->get();
        // dd(count($dataBill) == 0);
        return view('pages.users.bill',compact('dataBill'));
    }

    //show check out page
    public function showCheckOut(Request $request)
    {
        //city data
        $dataCity = DB::table('city')
        ->get();

        //district data by city data id first
        $dataDistrict = DB::table('district')
        ->where('city_code',$dataCity[0]->id)
        ->get();
        //wards data by district data id first
        $dataWards = DB::table('wards')
        ->where('district_code',$dataDistrict[0]->id)
        ->get();
        
        $user_id = $request->session()->get('user_id');
        $dataBill = DB::table('bill_detail')
        ->select('bill_detail.*','product.pro_name', 'description_detail.type','product.pro_avatar','bill.b_total')
        ->join('description_detail','description_detail.id','=','bill_detail.description_detail_id')
        ->join('product','product.id','=','bill_detail.bd_product_id')
        ->join('bill','bill.b_id','=','bill_detail.bd_bill_id')
        ->where('b_user_id',$user_id)
        ->where('b_status',0) //lấy ra bill đang đặt
        ->get();
        
        $dataUser=[
            $userName = $request->session()->get('user_name'),
            $email = $request->session()->get('user_email'),
            $user_phone = $request->session()->get('user_phone'),
            $city = $request->session()->get('city'),
            $district = $request->session()->get('district'),
            $wards = $request->session()->get('wards'),
        ];
        // dd(($dataUser[0]) != null);
        return view('pages.users.checkout', compact('dataBill','dataUser','dataCity','dataDistrict','dataWards'));
    }
}
