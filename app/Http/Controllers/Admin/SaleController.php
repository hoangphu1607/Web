<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SaleController extends Controller
{
    //show page sale product
    public function showPageSale()
    {
        $dataProduct = DB::table('product')
        ->join('categories','categories.id','=','product.pro_category_id')
        ->get();
        return view('pages.admin.sale');
    }
    //get Data Product
    public function getDataProductSale()
    {
        $dataTable = DB::table('product')
        ->join('categories','product.pro_category_id','=','categories.id')
        ->join('suppliers','product.supplier_id','=','suppliers.id')
        ->join('description_detail','description_detail.product_id','=','product.id')
        ->select('product.*','categories.c_name','suppliers.s_name','description_detail.price','description_detail.type','description_detail.id as des_id')
        ->where('pro_status',1)
        ->where('description_detail.status',1)
        ->orderBy('id','desc')
        ->get();
        // dd($dataTable);
        return response()->json([
            'data' => $dataTable
        ]);
    }
}
