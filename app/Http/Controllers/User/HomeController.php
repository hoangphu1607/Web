<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function get_product()
    {
        //product
        $dataProduct = DB::table('product')
        ->join('description_detail','product.id','=','description_detail.product_id')
        ->select('product.*','description_detail.type','description_detail.price','description_detail.product_id')
        ->where('pro_status', '1')
        ->where('status','1')
        ->orderBy('product.id','desc')
        ->get();
        // dd($dataProduct);
        //categories
        $dataCategories = DB::table('categories')
        ->where('c_active','1')
        ->get();
        //offer to day
        $date = Carbon::now();
        $today = $date->toDateString();
        $offer = DB::table('offer')
        ->join('product','product.id','=','offer.product_id')
        ->select('product.id', 'day_offer', 'product.pro_avatar')
        ->where('day_offer',$today)
        ->get();
        
        $idUser = session('id_user');
        // dd($idUser);
        $dataOrder = $this->getDataUserOrder($idUser);
        $numberOrder = count($dataOrder);
        // $mp = '';
        // if(isset($numberOrder) && $numberOrder != 0){
        //     if($numberOrder < 3){
        //         $mp .= '<div class="header-chart-dropdown" >';
        //     }else{
        //         $mp .= '<div class="header-chart-dropdown list-data" >';
        //     }
        //     foreach($dataOrder as $item){
        //         $mp .= '<div class="header-chart-dropdown-list ">
        //                     <div class="dropdown-chart-left floatleft">
        //                         <a href="#"><img src="{{asset("$item->pro_avatar")}}" alt="list" style="width:80px;height: 80px;"></a>
        //                     </div>
        //                     <div class="dropdown-chart-right">
        //                         <h2><a href="#">{{$item->pro_name}}</a></h2>
        //                         <h3>Số Lượng: {{$item->bd_amount}}</h3>
        //                         <h4>{{number_format($item->bd_total_amount, 0, ",", ".") . " vnđ"}}</h4>
        //                     </div>
        //                 </div>';
        //     }
        //     $mp .= '</div>';
        // }
        // dd(count($dataOrder));
        return view('pages.top-page.index', compact('dataProduct','dataCategories','offer','dataOrder','numberOrder'));
    }

    //get data bill user order
    public function getDataUserOrder($idUser)
    {
        $user_id = $idUser;
        $dataBill = DB::table('bill_detail')
        ->select('bill_detail.*','product.pro_name', 'description_detail.type','product.pro_avatar','bill.b_total')
        ->join('description_detail','description_detail.id','=','bill_detail.description_detail_id')
        ->join('product','product.id','=','bill_detail.bd_product_id')
        ->join('bill','bill.b_id','=','bill_detail.bd_bill_id')
        ->where('b_user_id',$user_id)
        ->where('b_status',0) //lấy ra bill đang đặt
        ->get();
        return $dataBill;
    }
    
}
