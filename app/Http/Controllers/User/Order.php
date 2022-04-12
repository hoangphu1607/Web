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
        ->where('id', '=', $request->id)
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
}
