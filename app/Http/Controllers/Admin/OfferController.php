<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OfferController extends Controller
{
    //show page offer product
    public function showOffer()
    {
        $dataProduct = DB::table('product')
        ->join('categories','categories.id','=','product.pro_category_id')
        ->get();
        return view('pages.admin.offer');
    }
    //get Data Product
    public function getDataProduct()
    {
        $dataTable = DB::table('product')
        ->join('categories','product.pro_category_id','=','categories.id')
        ->join('suppliers','product.supplier_id','=','suppliers.id')
        ->select('product.*','categories.c_name','suppliers.s_name')
        ->where('pro_status',1)
        ->orderBy('id','desc')
        ->get();
        // dd($dataTable);
        return response()->json([
            'data' => $dataTable
        ]);
    }
}
