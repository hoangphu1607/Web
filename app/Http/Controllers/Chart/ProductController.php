<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    public function showChartProduct(Request $request)
    {
        $total = DB::table('product')
        ->select(DB::raw('COUNT(product.id) as soluong'))
        ->first();
        // dd($total->soluong);
        return view('pages.chart.product',compact('total'));
    }

    //get data product
    public function getDataProduct(Request $request)
    {
        $data = DB::table('product')
        ->join('categories','categories.id','=','product.pro_category_id')
        ->groupBy('categories.c_name','pro_category_id')
        ->select('pro_category_id','categories.c_name',DB::raw('COUNT(product.id) as soluong'))
        ->get();
       
        return response()->json([
            'test' => 'Hi',
            'product' => $data,
            // 'total_product' => $total,
        ]);
    }
}
