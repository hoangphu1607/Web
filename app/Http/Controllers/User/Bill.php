<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use NumberFormatter;
use Carbon;
use function PHPSTORM_META\type;

class Bill extends Controller
{
    public function showBill(Request $request)
    {
        $user_id = $request->session()->get('id_user');
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
    //data bill
    public function dataBill(Request $request)
    {
        $user_id = $request->session()->get('id_user');
        $dataBillPlaced = DB::table('bill_detail')
        ->select('bill_detail.*','product.pro_name', 'description_detail.type','product.pro_avatar')
        ->join('description_detail','description_detail.id','=','bill_detail.description_detail_id')
        ->join('product','product.id','=','bill_detail.bd_product_id')
        ->join('bill','bill.b_id','=','bill_detail.bd_bill_id')
        ->where('b_user_id',$user_id)
        ->where('b_status',0) //lấy ra bill đang đặt
        ->get();
        return response()->json([
            'data' => $dataBillPlaced
        ]);
    }
    //data bill placed
    public function dataBillPlace(Request $request)
    {
        $user_id = $request->session()->get('id_user');
        $dataBillPlaced = DB::table('bill')
        ->select('bill.*', DB::raw("CONCAT(city.city_name, ', ',district.district_name,', ',wards.wards_name )as fullAddress") )
        ->join('city', 'city.city_code', '=','bill.city')
        ->join('district', 'district.district_code', '=','bill.district')
        ->join('wards', 'wards.wards_code', '=','bill.ward')
        ->where('b_user_id',$user_id)
        ->where('b_status',1) //lấy ra bill đã đặt
        ->get();
        
        $total = DB::table('bill_detail')
        ->join('bill','bill.b_id','=','bill_detail.bd_bill_id')
        ->where('b_user_id',$user_id)
        ->where('b_status',1) //lấy ra bill đã đặt
        ->sum('bill_detail.bd_total_amount');
        return response()->json([
            'data' => $dataBillPlaced,
            'total' => $total
        ]);
    }
    public function showBillPlaced(Request $request)
    {
        return view('pages.users.orderPlaced');
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
        
        $user_id = $request->session()->get('id_user');
        $dataBill = DB::table('bill_detail')
        ->select('bill_detail.*','product.pro_name', 'description_detail.type','product.pro_avatar','bill.b_total','bill.b_id')
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
        $number = $dataBill[0]->b_total;
        // dd(($number));
        // $wordPrice = $this->converPriceToWord($number->b_total);
        // dd(($dataUser[0]) != null);
        $word = new NumberFormatter("vi", NumberFormatter::SPELLOUT);
        $wordPrice = ucwords($word->format($number));
        return view('pages.users.checkout', compact('dataBill','dataUser','dataCity','dataDistrict','dataWards','wordPrice'));
    }
    
    public function orderConfirm(Request $request)
    {
        $select = DB::table('user')
        ->where('id', $request->id_user)
        ->first();

        DB::table('bill')
        ->where('b_id', $request->id_bill)
        ->where('b_user_id', $request->id_user)
        ->update([
            'b_status' => 1,
            'create_at' => date('Y-d-m'),
            'city' => $select->city_id,
            'district' => $select->district_id,
            'ward' => $select->wards_id
        ]);
        return response()->json([
            // 'Hi' => $request->id_bill,
            // "b" => $request->id_user,
            'data' => true,
            'city' => $select->city_id
        ]);
    }

    //delete product in bill placed
    public function deleteProductPlace(Request $request)
    {
        $delete = DB::table('bill_detail')
        ->where('bd_bill_id', $request->id_bil)
        ->where('bd_product_id', $request->id_pd)
        ->delete();

        return response()->json([
            'id_pd' => $request->id_pd,            
            'id_bill' => $request->id_bil,
            'delete' => $delete,
        ]);

    }
    
}
