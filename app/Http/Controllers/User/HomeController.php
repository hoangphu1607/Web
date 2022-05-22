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
            $query->from('sale')
            ->select('*')
            ->where('sale.product_id','=',DB::raw('product.id'));           
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
        
        return view('pages.top-page.index', compact('dataProduct','dataCategories','offer','dataOrder','numberOrder','product_sale'));
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
