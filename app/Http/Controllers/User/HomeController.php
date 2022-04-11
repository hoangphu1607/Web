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
        ->where('pro_status', '1')
        ->orderBy('id','desc')
        ->get();
        //categories
        $dataCategories = DB::table('categories')
        ->where('c_active','1')
        ->get();
        //offer to day
        $date = Carbon::now();
        $today = $date->toDateString();
        $offer = DB::table('offer')
        ->join('product','product.id','=','offer.product_id')
        ->select('product.id', 'day_offer', 'product.pro_avatar' )
        ->where('day_offer',$today)
        ->get();
        // dd($offer);
        return view('pages.top-page.index', compact('dataProduct','dataCategories','offer'));
    }
}
