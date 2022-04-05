<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Process;

class manageController extends Controller
{
    private $admin;
    public function __construct()
    {        
        $this->admin = new Process();        
    }
    public function form_login()
    {
        return view('pages.admin.login');
    }
    //đăng nhập quản trị
    public function login_admin(Request $request)
    {
        $lists = DB::table('admin')
        ->where('a_email', $request->admin_mail)
        ->where('a_password', sha1($request->admin_password))
        ->get();
        //Để dữ liệu vào session
        $dataAdmin = [
             'id_admin'=> $lists[0]->id,
             'admin_name' => $lists[0]->a_name,
        ];
        session($dataAdmin);
        return redirect()->route('form_addProduct');
    }
    //Xóa đăng nhập admin
    public function adminLogout()
    {
        session()->pull('id_admin');        
        return redirect()->route('adminLogin');
    }
    public function form_register()
    {
        return view('pages.admin.register');
    }
    //đăng ký quyền quản trị
    public function register_admin(Request $request)
    {
        $rules = [  
            'admin_name' => 'required',        
            'admin_mail' => 'required|unique:admin,a_email',
            'admin_phone' => 'required',
            'admin_password' => 'required|min:8',
            'admin_password_repeat' => 'required|same:admin_password|min:8',
        ];
        $messages = [
            'admin_name.required' => 'Phải có tên người quản trị',
            'admin_mail.required' => 'Gmail chưa nhập',
            'admin_phone.required' => 'Số điện thoại không được trống',
            'admin_password.required' => 'Mật khẩu không được trống',
            'admin_password_repeat.required' => 'Mật khẩu không được trống',            
            'admin_mail.unique' => 'Email đã được sử dụng',
            'admin_password_repeat.same' => 'Mật khẩu không đúng',
            'admin_password.min' => 'Mật Khẩu phải từ :min ký tự trở lên',
            'admin_password_repeat.min' => 'Mật Khẩu phải từ :min ký tự trở lên'
        ];
        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 
        if(!$check->fails()){
            $dataInsert = [
                $a_name = $request->admin_name,
                $a_email = $request->admin_mail,
                $a_phone = $request->admin_phone,
                $a_password	= sha1($request->admin_password),
                $a_active = 1
            ];
            DB::insert('insert into admin (a_name, a_email, a_phone, a_password, a_active) values (?, ?, ?, ?, ?)', $dataInsert);
            // session($dataInsert);
            return redirect()->route('adminLogin');  
        }
    }
    public function manageCategories()
    {
        return view('pages.admin.categories');
    }

    public function addCategories(Request $request)
    {
        
        $rules = [  
            'image' => 'required',        
            'categories_name' => 'required',
        ];
        $messages = [
            'image.required' => 'Cần phải có ảnh',
            'categories_name.required' => 'Phải đặt tên loại sản phẩm'
        ];
        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 
        if(!$check->fails()){
            $file = $request->image; //Lấy file từ form sang -- image là dữ liệu nhập vào  
           // $fileName =  $request->categories_name .'.'. $file->getClientOriginalExtension();//$request->categories_name đổi tên hình theo tên loại sản phẩm
            $imageName = time().'.'.$request->image->extension();      // nên làm cách này cho ko trùng tên ảnh      

            $file->move('img\categories', $imageName); //chuyển file đến thư mục mong muốn 
            $path_img = 'img\categories\\'. $imageName; //lấy đường dẫn file đang tồn tại (img\categories\)
            
            $dataInsert = [
                $c_name = $request->categories_name,
                $c_avatar = $path_img,
                $c_active = 1
            ];            
            DB::insert('insert into categories (c_name, c_avatar, c_active) values (?, ?, ?)', $dataInsert);
            return response()->json([
                "success" => 'true'                
            ]); 
        }  
    }

    public function form_addSuppliers()
    {
        return view('pages.admin.add_suppliers');
    }

    public function addSuppliers(Request $request){
       
        $request->validate([
            'suppliers_name' => 'required',
            'suppliers_mail' =>'required',
            'suppliers_phonenumber' => 'required|digits:10|numeric',
            'suppliers_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ],
        [
            'suppliers_name.required' => 'Tên nhà cung cấp không được bỏ trống',
            'suppliers_mail.required' => 'Email nhà cung cấp không được bỏ trống',
            'suppliers_phonenumber.required' => 'Số điện thoại nhà cung cấp không được bỏ trống',
            'suppliers_phonenumber.digits' => 'Số điện thoại không hợp lệ',
            'suppliers_phonenumber.numeric' => 'Số điện thoại không hợp lệ',
            'suppliers_image.image' => 'Avatar không đúng định dạng !!!',
            'suppliers_image.mimes' => 'Avatar không đúng định dạng !!!',
        ]);        
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
         // DB::insert('insert into categories (c_name, c_avatar, c_active) values (?, ?, ?)', $dataInsert);
            return response()->json([
                "mess" => "true",
                "s_name" => $request->suppliers_name
            ]);
        }
        else
            return response()->json([
                "mess" => "false"
            ]);
    }
    //show form add Product
    public function form_addProduct()
    {
        //lấy dữ liệu từ model qua nè
        $dataCategories = $this->admin->getCategories();
        $dataSuppliers = $this->admin->getSuppliers();

        return view('pages.admin.add_product',compact('dataCategories','dataSuppliers'));
    }
    //function add product
    public function addProduct(Request $request)
    {
        $rules = [  
            'pro_name' => 'required',        
            'pro_price' => 'required',
            'pro_descriptions' => 'required',
            'pro_content' => 'required',
            'image' => 'required',
        ];
        $messages = [
            'image.required' => 'Cần phải có ảnh',
            'pro_content.required' => 'Phải có nội dung',
            'pro_descriptions.required' => 'Phải có nội dung',
            'pro_name.required' => 'Phải đặt tên',
            'pro_price.required' => 'Phải có giá tiền'
        ];
        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 
        if(!$check->fails()){
            $file = $request->image; //Lấy file từ form sang -- image là dữ liệu nhập vào  
           // $fileName =  $request->categories_name .'.'. $file->getClientOriginalExtension();//$request->categories_name đổi tên hình theo tên loại sản phẩm
            $imageName = time().'.'.$request->image->extension();      // nên làm cách này cho ko trùng tên ảnh      

            $file->move('img\product', $imageName); //chuyển file đến thư mục mong muốn 
            $path_img = 'img\product\\'. $imageName; //lấy đường dẫn file đang tồn tại (img\categories\)

            $dataInsert = [
                $pro_name = $request->pro_name,
                $pro_categories_id = $request->pro_categories,
                $pro_price = $request->pro_price,
                $suppliers_id = $request->pro_suppliers,
                $pro_descriptions = $request->pro_descriptions,
                $pro_content = $request->pro_content,
                $image = $path_img              
            ];  
            DB::insert('insert into product (pro_name, 	pro_category_id, pro_price, supplier_id, pro_description, pro_content, pro_avatar) 
            values (?, ?, ?, ?, ?, ?, ?)', $dataInsert);
            return response()->json([
                "success" => 'true' ,
                "name" =>    $request->pro_name            
            ]); 
        }
    }

    //show form edit
    public function form_editCategories()
    {
        //lấy dữ liệu từ model qua nè
        $dataCategories = $this->admin->getCategories();    
        return view("pages.admin.editCategories",compact('dataCategories'));
    }
    //get All Categories
    public function getAllCategories()
    {
        //lấy dữ liệu từ model qua nè
        $dataCategories = $this->admin->getCategories();      
        // $json_data['data'] = $dataCategories;  
        // dd($dataCategories);
        $button = [
            'test' => 'button'
        ];
        return response()->json([
            'data' => $dataCategories,
            'button' => $button
        ]);
    }
    //get 1 Categories
    public function getOneCategori(Request $request)
    {
        $categories = DB::table('categories')
        ->where('id',$request->id)
        ->get();
        // dd($categories);
        return response()->json([
            'categories' => $categories
        ]);
    }

    //Update categories
    public function updateCategories(Request $request)
    {
        $rules = [  
            'c_name' => 'required',
            'new_img' => 'file|max:500000|image'  
        ];
        $messages = [
            'c_name.required' => 'Phải đặt tên loại sản phẩm',  
            'new_img.file' => 'Định dạng ảnh không đúng',
            'new_img.size' => 'Tệp tin quá lớn',
            'new_img.image' => 'Định dạng ảnh không đúng' 
        ];

        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 
        if(!$check->fails()){  
            //lấy tên loại
            $name = $request->c_name;
            if($request->hasFile('new_img')){
                $path = 'img\categories\\'; //nơi lưu ảnh

                $imageName = time().'.'.$request->new_img->extension(); //đổi tên ảnh

                $fullPath = $path . $imageName; // lấy full path

                $file = $request->file('new_img')->move( $path , $imageName);
                
                //Update dữ liệu
                
                $update = DB::table('categories')
                ->where('id', $request->id)
                ->update([
                    'c_name' => $name,
                    'c_avatar' => $fullPath
                ]);
                return response()->json([
                   "name" => $name,
                   "url" => $fullPath
                ]);
            }      
            else{
                $update = DB::table('categories')
                ->where('id', $request->id)
                ->update([
                    'c_name' => $name,                    
                ]);
                return response()->json([
                   "name" => $name,                   
                ]);
            }            
        }
        
    }

    //delete categories 
    public function deleteCategories(Request $request)  
    {
        // $delete = DB::table('categories')
        // ->where('id', $request->id)
        // ->update([
        //     'c_active' => 0,                    
        // ]);
        return response()->json([
            'success' => $request->id,
            // 'sl' => $delete
        ]);
    }



}
