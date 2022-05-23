<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ManageOrder extends Controller
{
    //show page manage order
    public function showListOrder(Request $request)
    {
        $code = 1;
        return view('pages.admin.list_order',compact('code'));
    }
    //bill đang chờ duyệt
    public function allBillUserOrder(Request $request)
    {
        $dataBill = DB::table('bill')
        ->join('user','user.id','=','bill.b_user_id')
        ->join('city','city.city_code','=','bill.city')
        ->join('district','district.district_code','=','bill.district')
        ->join('wards','wards.wards_code','=','bill.ward')
        ->select('bill.*','user.u_name', 
        DB::raw("CONCAT(city.city_name,', ', district.district_name,', ', wards.wards_name) as address"),
        )
        ->where('bill.b_status',$request->code)
        ->orderBy('bill.b_id','DESC')
        ->get();        
        return response()->json([
            'data' =>  $dataBill,
        ]);

    }
    
    public function getBillDetailById(Request $request)
    {
        $Bill_id = $request->id;
        $dataBillDetail = DB::table('bill')
        ->join('bill_detail','bill_detail.bd_bill_id','=','bill.b_id')
        ->join('product','product.id','=','bill_detail.bd_product_id')
        ->join('description_detail','description_detail.id','=','bill_detail.description_detail_id')
        ->where('bill_detail.bd_bill_id',$Bill_id)
        ->get();

        $modal = '';
        foreach($dataBillDetail as $item){
            $modal .= '<div class="single-review">
                            <div class="single-review-img">
                                <a href="#"><img src="'.asset('').$item->pro_avatar.'" alt="review" style="width:90px;height: 90px;" class="img_product" ></a>
                            </div>
                            <div class="single-review-content fix">
                                <h2 class="product_name" ><a href="#"> Tên Sản Phẩm: '.$item->pro_name .'</a></h2>
                                <p class="product_des" > Giá: '. number_format($item->bd_price, 0, ',', '.'). " vnđ"  .'<span></span></p>
                                <p class="product_amount"> Loại: '. $item->type . '<span></span> </p>
                                <h3>Tổng: '.number_format($item->bd_total_amount, 0, ',', '.'). " vnđ"  .' </h3>
                            </div>
                        </div>';
        }

        return response()->json([
            'pd' => $modal
        ]);
    }

    public function processBillById(Request $request)
    {
        $action = $request->action;
        $code = $request->code;
        if($action == "getNote"){
            $dataNote = DB::table('bill')
            ->select('b_note')
            ->where('b_id', $request->id)
            ->first();
            $html ="<p class='note-body'>".$dataNote->b_note."</p>";
            return response()->json([   
                'note' => $html,
            ]);
        }if($action == "updateStatus"){
            DB::table('bill')
            ->where('b_id', $request->id)
            ->update([
                'b_status' => $code + 1
            ]);
            return response()->json([
                'updateStatus' => 'updateStatus',
            ]);
        }
        
    }
    //show delivery
    public function showDelivery()
    {
        $code = 2;
        return view('pages.admin.list_order',compact('code'));
    }

    //show xác nhận giao Hàng
    public function delivery_confirmation()
    {
        $code = 3;
        return view('pages.admin.list_order',compact('code'));
    }
}
