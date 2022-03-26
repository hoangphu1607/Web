<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class manageController extends Controller
{
    public function manageCategories()
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

    public function form_addSuppliers()
    {
        return view('pages.admin.add_suppliers');
    }

    public function addSuppliers(Request $request){
        $request->validate([
            'suppliers_name' => 'required',
            'suppliers_mail' =>'required',
            'suppliers_phonenumber' => 'required',
            'suppliers_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ],
        [
            'suppliers_name.required' => 'Tên nhà cung cấp không được bỏ trống',
            'suppliers_mail.required' => 'Email nhà cung cấp không được bỏ trống',
            'suppliers_phonenumber.required' => 'Số điện thoại nhà cung cấp không được bỏ trống',
            'suppliers_image.image' => 'Avatar không đúng định dạng !!!',
            'suppliers_image.mimes' => 'Avatar không đúng định dạng !!!',
        ]
        );

        if ($request->hasFile('suppliers_image')) {
            $file = $request->suppliers_image; //Lấy file từ form sang -- image là dữ liệu nhập vào  
           // $fileName =  $request->categories_name .'.'. $file->getClientOriginalExtension();//$request->categories_name đổi tên hình theo tên loại sản phẩm
            $imageName = time().'.'.$request->suppliers_image->extension();      // nên làm cách này cho ko trùng tên ảnh      
            $file->move('img\suppliers', $imageName); 
            $path_img = 'img\suppliers\\'. $imageName;
            $dataInsert = [
                $s_name = $request->suppliers_name,
                $s_mail = $request->suppliers_mail,
                $s_phonenumber = $request->suppliers_phonenumber,
                $s_image = $path_img,
            ];

            DB::insert('insert into suppliers (s_name, s_email, s_phone, s_avt) values (?, ?, ?, ?)', $dataInsert);
        }

    }


}
