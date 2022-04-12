<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        ->where('id','=',$id)
        ->first();
        // dd($data_query);
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

    
}
