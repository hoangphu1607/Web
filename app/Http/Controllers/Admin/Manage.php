<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
class Manage extends Controller
{
    public function showCategories()
    {
        return view('pages.admin.categories');
    }

    public function addCategories(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->image; //Lấy file từ form sang -- image là dữ liệu nhập vào  
            $fileName =  $request->categories_name .'.'. $file->getClientOriginalExtension();//$request->categories_name đổi tên hình theo tên loại sản phẩm
            $file->move('img\categories', $fileName); //chuyển file đến thư mục mong muốn 
            // dd($img_path);
        }
            

        // $path = $request->file('image')->store('avatars');
        // $path = $request->file('image')->path();
        // $fullInfo = $request->file('image');
        // $name = $fullInfo[0]->name;
        // dd($fullInfo);
        // dd($path);
        // Storage::move($path, asset('img/categories/'));
        // return $path;
    }
}
