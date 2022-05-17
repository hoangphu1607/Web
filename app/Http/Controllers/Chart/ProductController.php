<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
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
        $now = Carbon::now();
        $order = DB::table('bill_detail')
        ->join('bill','bill.b_id','=','bd_bill_id')
        ->join('product','product.id','=','bill_detail.bd_product_id')
        ->where('bill.b_status',1)
        ->whereMonth('create_at',$now->month)
        ->selectRaw('sum(bill_detail.bd_amount) as soluong, product.pro_name')
        ->groupBy('product.pro_name')
        ->get();
        return response()->json([
            'test' => 'Hi',
            'product' => $data,
            'order' => $order,
        ]);
    }
}
