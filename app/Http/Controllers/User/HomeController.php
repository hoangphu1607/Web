<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function get_product()
    {
        $data = DB::table('product')
        ->where('pro_category_id', '2')
        ->get();
        // dd($data);
        return view('pages.top-page.index', compact('data'));
    }
}
