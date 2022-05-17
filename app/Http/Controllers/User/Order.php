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
        // dd($data_query);
        $details = DB::table('description_detail')
        ->select('price','type','id')
        ->where('product_id',$id)
        ->get();
        // dd(count($details));
        return view("pages.users.details",compact('data_query','details'));
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
            if($request->session()->has('id_user')){
                $check = true;
                $user_id = $request->session()->get('id_user');
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
                    $num = $this->getQuantityOrder($lastInsertId);
                }else{ //Has Bill
                    DB::table('bill_detail')
                    ->insert([
                        'bd_bill_id' => $getAllBillUser[0]->b_id,
                        'bd_product_id' => $idProduct,
                        'description_detail_id' => $description_detail_id,
                        'bd_price' => $price,
                        'bd_amount' => $amount,
                        'bd_total_amount' => $price * $amount
                    ]);
                    $num = $this->getQuantityOrder($getAllBillUser[0]->b_id);
                }
                $dataBill = $this->getDataUserOrder($user_id); 
                $dataTranfer = $this->transferDataOrder($dataBill,$num);               
            }else{
                $check = false;
                // Cookie::queue('idCookie', $idCookie, $minutes);        
                // DB::ww
            }
            return response()->json([
                'idProduct' => $request->id,
                'num' => $num,
                'dataBill' => $dataBill,
                'dataTranfer'=> $dataTranfer,
            ]);
        }
    }
    //user order product no login
    public function OrderProductHasLogin()
    {
        return response()->json([
            'a' => 'Hi'
        ]);
    }
    //get quantity order
    public function getQuantityOrder($id_bill)
    {
        return DB::table('bill_detail')
        ->where('bd_bill_id', $id_bill)
        ->count();
    }
    //order data transfer
    public function transferDataOrder($dataBill,$numberOrder)
    {
        $mp = '';
        if(isset($numberOrder) && $numberOrder != 0){
            if($numberOrder < 3){
                $mp .= '<div class="header-chart-dropdown" >';
            }else{
                $mp .= '<div class="header-chart-dropdown list-data" >';
            }
            foreach($dataBill as $item){
                $mp .= '<div class="header-chart-dropdown-list ">
                            <div class="dropdown-chart-left floatleft">
                                <a href="#"><img src="'.asset("$item->pro_avatar").'" alt="list" style="width:80px;height: 80px;"></a>
                            </div>
                            <div class="dropdown-chart-right">
                                <h2><a href="#">'.$item->pro_name .'</a></h2>
                                <h3>Số Lượng: '.$item->bd_amount .'</h3>
                                <h4>'. number_format($item->bd_total_amount, 0, ",", ".") . " vnđ" .'</h4>
                            </div>
                        </div>';
            }
            $mp .= '<div class="chart-checkout">
                        <p>TỔNG CỘNG<span>'. number_format($item->b_total, 0, ',', '.') . " vnđ". '</span></p>
                        <button type="button" class="btn btn-default">THANH TOÁN</button>
                    </div>';
            $mp .= '</div>';
        }else{
            $mp .= '<div class="header-chart-dropdown" style="text-align: center; color:blue">
                        No Data
                    </div>';
        }
        return $mp;
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
    //get price by id
    public function getPriceById(Request $request)
    {
        $details = DB::table('description_detail')
        ->where('id',$request->id)
        ->first();
        return response()->json([
            'data' => $details
        ]);
    }
}
