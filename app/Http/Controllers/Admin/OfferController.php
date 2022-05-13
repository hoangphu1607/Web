<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class OfferController extends Controller
{
    //show page offer product
    public function showOffer()
    {
        return view('pages.admin.offer');
    }
}
