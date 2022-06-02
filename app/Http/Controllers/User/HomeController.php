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
        ->where('product.pro_status', '1')
        ->where('description_detail.status','1')
        ->whereNotExists(function($query){ 
            $date = Carbon::now();
            $today = $date->toDateString(); 
            $query->from('sale')
            ->select('*')
            ->where('sale.product_id','=',DB::raw('product.id'))
            ->where('sale.start_sale','<=',$today)
            ->where('sale.end_sale','>=',$today)
            ->where('sale.status',1);           
        })
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
        //mua nhieu
        $muanhieu = DB::table('bill_detail')
        ->crossJoin('product')
        ->crossJoin('description_detail')
        ->select('bd_amount', 'product.*', 'description_detail.price','description_detail.type','description_detail.product_id')
        ->where('bill_detail.bd_product_id','=',DB::raw('product.id'))
        ->where('description_detail.product_id','=',DB::raw('product.id'))
        ->orderBy('bd_amount','desc')
        ->limit(6)
        ->get();
        if(count($muanhieu)<6){
            $muanhieu = DB::table('bill_detail')
            ->crossJoin('product')
            ->crossJoin('description_detail')
            ->select('bd_amount', 'product.*', 'description_detail.price','description_detail.type','description_detail.product_id')
            ->where('bill_detail.bd_product_id','=',DB::raw('product.id'))
            ->where('description_detail.product_id','=',DB::raw('product.id'))
            ->inRandomOrder()
            ->limit(6)
            ->get();
        } 
        // dd($muanhieu);  
        //DE XUAT
        $dexuat = DB::table('bill_detail')
            ->crossJoin('product')
            ->crossJoin('description_detail')
            ->select('bd_amount', 'product.*', 'description_detail.price','description_detail.type','description_detail.product_id')
            ->where('bill_detail.bd_product_id','=',DB::raw('product.id'))
            ->where('description_detail.product_id','=',DB::raw('product.id'))
            ->inRandomOrder()
            ->limit(6)
            ->get();   
        //sale
        $product_sale = DB::table('product')
        ->join('sale','sale.product_id','=','product.id')
        ->join('description_detail','product.id','=','description_detail.product_id')
        ->select('product.*','description_detail.type','description_detail.price','description_detail.product_id','sale.status','sale.discount')
        ->where('product.pro_status', '1')
        ->where('description_detail.status','1')
        ->where('sale.start_sale','<=',$today)
        ->where('sale.end_sale','>=',$today)
        ->where('sale.status',1)
        ->get();
        // dd($product_sale);
        $idUser = session('id_user');
        $dataOrder = $this->getDataUserOrder($idUser);
        $numberOrder = count($dataOrder);
        
        return view('pages.top-page.index', compact('dataProduct','dataCategories','offer','dataOrder','numberOrder','product_sale','muanhieu','dexuat'));
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

    //search bar - get data result
    public function search(Request $request)
    {
            $render = '<div class="resultcontent">';
            //lấy dữ liệu dựa trên chuỗi nhập vào từ thanh search bar
            $products = DB::table('product')
            ->select('product.pro_name','product.pro_avatar','description_detail.price')
            ->leftJoin('description_detail','product.id','=','description_detail.product_id')
            ->where('pro_name', 'LIKE', '%' . $request->pro_name . '%')
            ->get();
            //render các thẻ html cho giao diện
            foreach ($products as $key => $value) {
                $render .= '<div class="result-item">
                                <div class="item-img"><a href=""><img src="{{asset('.$value->pro_avatar.')}}" ></a></div>
                                <div class="item-title">
                                    <a href="">'.$value->pro_name.'</a>
                                    <p>'.$value->price.'</p>
                                </div>
                            </div>';
            }
            $render .= "</div>";
            //trả data về cho 
            return response()->json([
                "render" => $render,
            ]);
    }
}   

