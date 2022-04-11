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
    

    
            
    
    

    

}
