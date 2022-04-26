<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Http\Response;
class Order extends Controller
{
    private $table = 'product';
    //user order
    public function userOrder(Request $request)
    {   
        $user_ip = $request->ip();
        dd($user_ip);
        return true;  
    }

    //get a product by id
    public function getProductById (Request $request)
    {
        $dataProduct = DB::table($this->table)
        ->join('description_detail','product.id','=','description_detail.product_id')
        ->select('product.*','description_detail.*','description_detail.id as idDes')
        ->where('description_detail.status','1')
        ->where('product.id', '=', $request->id)
        ->get();
        return response()->json([
            'product' => $dataProduct
        ]);
    }

    public function showProductDetailById($id)
    {    
        $data_query = DB::table($this->table)
        ->where('product.id','=',$id)
        ->leftjoin('description_detail','product.id','=', 'description_detail.product_id')
        ->first();
        //dd($data_query);
        return view("pages.users.details",compact('data_query'));
    }
    //Get a description by id
    public function getDesById(Request $request)
    {   
        $dataDes = DB::table('description_detail')
        ->where('id','=',$request->id)
        ->first();
        return response()->json([
            'product' => $dataDes
        ]);
    }
    // user order product login
    public function orderProduct(Request $request)
    {
        $rules = [
            'amount' =>'required',
            'amount' => 'between:1,100'
        ];
        $mess = [
            'amount.required' => 'Phải có dữ liệu',
            'amount.between' => 'Dữ liệu sai'
        ];
        $check = Validator::make($request->all(),$rules,$mess);
        $check->validate(); 
        if(!$check->fails()){
            $idProduct = $request->id;
            $minutes = 1440; //1 day
            $check = false;
            $price = $request->price;
            $amount = $request->amount;
            $description_detail_id = $request->description_detail_id;
            // Cookie::get('idCookie')!== null
            if($request->session()->has('user_id')){
                $check = true;
                $user_id = $request->session()->get('user_id');
                //get data user
                $dataUser = DB::table('user')
                ->where('id',$user_id)
                ->first();
                //get All Bill User
                $getAllBillUser = DB::table('bill')
                ->where('b_user_id','=',$user_id)
                ->where('b_status',0)
                ->get();
                //Last Insert Id 
                $lastInsertId = "";
                //No bill 
                if($getAllBillUser->count() == 0){
                    DB::table('bill')
                    ->insert([
                        'b_user_id'     => $dataUser->id,
                        'b_total'       => 0,
                        'b_phone'       => $dataUser->u_phone,
                        'city'          => 1,
                        'district'      => 1,
                        'ward'          => 1,
                        'b_status'      => 0, //Đang Đặt = 0, Đang đợi xác nhận đơn hàng = 1, Hoàn thành = 2
                        'b_note'        => 0, 
                        'cookie'        => 1
                    ]);
                    $lastInsertId = DB::getPdo()->lastInsertId();
                    DB::table('bill_detail')
                    ->insert([
                        'bd_bill_id' => $lastInsertId,
                        'bd_product_id' => $idProduct,
                        'description_detail_id' => $description_detail_id,
                        'bd_price' => $price,
                        'bd_amount' => $amount,
                        'bd_total_amount' => $price * $amount
                    ]);
                    //Has Bill
                }else{ 
                    DB::table('bill_detail')
                    ->insert([
                        'bd_bill_id' => $getAllBillUser[0]->b_id,
                        'bd_product_id' => $idProduct,
                        'description_detail_id' => $description_detail_id,
                        'bd_price' => $price,
                        'bd_amount' => $amount,
                        'bd_total_amount' => $price * $amount
                    ]);
                }                
            }else{
                $check = false;
                // Cookie::queue('idCookie', $idCookie, $minutes);        
                // DB::ww
            }
            return response()->json([
                // 'a' => time()+$request->id,
                // 'cookie' => Cookie::get('idCookie'),
                'check' => $check,
                'getAllBillUser' => $getAllBillUser,
                'dataUser' => $dataUser,
                '$getAllBillUser[0]->id' => $getAllBillUser[0]->b_id,                
            ]);
        }
    }
    //user order product has login
    public function OrderProductHasLogin()
    {
        return response()->json([
            'a' => 'Hi'
        ]);
    }
}
