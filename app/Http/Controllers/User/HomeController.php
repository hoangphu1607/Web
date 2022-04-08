<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function get_product()
    {
        $dataProduct = DB::table('product')
        ->where('pro_status', '1')
        ->orderBy('id','desc')
        ->get();
        $dataCategories = DB::table('categories')
        ->where('c_active','1')
        ->get();
        // dd($data);
        // dd($dataProduct);
        // dd($dataCategories);
        return view('pages.top-page.index', compact('dataProduct','dataCategories'));
    }
}
