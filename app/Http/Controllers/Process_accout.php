<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users\Process;
class Process_accout extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new Process();
    }
    //display interface register
    public function index_register()
    {
        return view('pages.users.register');
    }
    // display interface login
    public function index_login()
    {
        return view('pages.users.login');
    }
    // process register
    public function register(Request $request)
    {
        $request->validate([
            'user_name' => 'required|min:8',
            'user_mail' => 'required|email',
            'user_phone' => 'required|digits:10',
            'user_password' => 'required|min:8',
            'user_password_repeat' => 'required|min:8|same:user_password',
            'user_address' => 'required'
        ],[
            'user_name.required' => 'Họ và tên không được trống',
            'user_name.min' => 'Họ và tên không dưới :min ký tự',
            'user_phone.digits' => 'Số Điện Thoại không hợp lệ',
            'user_phone.required' => 'Số Điện Thoạt bắt buộc nhập',
            'user_password.required' => 'Mật Khẩu bắt buộc nhập',
            'user_password.min' => 'Mật Khẩu phải từ :min ký tự trở lên',
            'user_password_repeat.required' => 'Mật Khẩu bắt buộc nhập',
            'user_password_repeat.min' => 'Mật Khẩu phải từ :min ký tự trở lên',
            'user_address.required' => 'Địa chỉ không được trống',
        ]);

        $dataInsert=[
            $request->user_name,
            $request->user_mail,
            sha1($request->user_password), //mã hóa bằng sha1
            $request->user_phone,
            $request->user_address
        ];
        $this->user->register($dataInsert);
        
        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_email' => 'required',
            'user_password' => 'required',
        ],[
            'user_email.required' => 'Tên đăng nhập không được trống',
            'user_password.required' => 'Mật khẩu không được trống',
        ]);
        $dataInsert=[           
            $request->user_email,
            sha1($request->user_password), //mã hóa bằng sha1           
        ];
        $query = $this->user->userLogin($dataInsert);
        // dd($query);
        if($query)
            return redirect()->route('home');
        else
            return back();
    }
}
