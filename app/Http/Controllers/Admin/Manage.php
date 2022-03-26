<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class Manage extends Controller
{
    public function showCategories()
    {
        return view('pages.admin.categories');
    }

    public function addCategories(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'categories_name' => 'required',
        ],[
            'image.image' => 'Định dạng không đúng!!!',
            'image.mimes' => 'Định dạng không đúng!!!',
            'categories_name.required' => 'Không được trống',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image; //Lấy file từ form sang -- image là dữ liệu nhập vào  
           // $fileName =  $request->categories_name .'.'. $file->getClientOriginalExtension();//$request->categories_name đổi tên hình theo tên loại sản phẩm
            $imageName = time().'.'.$request->image->extension();      // nên làm cách này cho ko trùng tên ảnh      

            $file->move('img\categories', $imageName); //chuyển file đến thư mục mong muốn 
            $path_img = 'img\categories\\'. $imageName; //lấy đường dẫn file đang tồn tại (img\categories\)
            
            $dataInsert = [
                $c_name = $request->categories_name,
                $c_avatar = $path_img,
                $c_active = 0
            ];
            
            DB::insert('insert into categories (c_name, c_avatar, c_active) values (?, ?, ?)', $dataInsert);
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
