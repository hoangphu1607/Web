<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\Process;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        //city data
        $dataCity = DB::table('city')
        ->get();

        //district data by city data id first
        $dataDistrict = DB::table('district')
        ->where('city_code',$dataCity[0]->id)
        ->get();
        //wards data by district data id first
        $dataWards = DB::table('wards')
        ->where('district_code',$dataDistrict[0]->id)
        ->get();
        // dd($dataWards);
        return view('pages.users.register',compact('dataCity','dataDistrict','dataWards'));
    }
    //option city to district 
    public function districtByIdCity(Request $request)
    {
        $dataDistrict = DB::table('district')
        ->where('city_code',$request->id_city)
        ->get();
        return response()->json([
            'district' => $dataDistrict
        ]);
    }
    public function wardsByIdDistrict(Request $request)
    {
        $dataWards = DB::table('wards')
        ->where('district_code',$request->district_code)
        ->get();
        return response()->json([
            'wards' => $dataWards
        ]);
    }
    // display interface login
    public function index_login()
    {
        return view('pages.users.login');
    }
    // process register
    public function register(Request $request)
    {


        $rules = [
            'user_name' => 'required|min:8',
            'user_mail' => 'required|email|unique:user,u_email',
            'user_phone' => 'required|digits:10|unique:user,u_phone',
            'user_password' => 'required|min:8',
            'user_password_repeat' => 'required|min:8|same:user_password',
            'city' => 'required',
            'district' => 'required',
            'wards' => 'required'
        ];
        $mess = [
            'user_name.required' => 'Họ và tên không được trống',
            'user_name.min' => 'Họ và tên không dưới :min ký tự',
            'user_mail.required'=> 'Email không được trống',
            'user_mail.email' => 'Email không đúng định dạng',
            'user_mail.unique' => 'Email đã tồn tại',
            'user_phone.digits' => 'Số Điện Thoại không hợp lệ',
            'user_phone.required' => 'Số Điện Thoạt bắt buộc nhập',            
            'user_phone.unique' => 'Số điện thoại đã tồn tại',
            'user_password.required' => 'Mật Khẩu bắt buộc nhập',
            'user_password.min' => 'Mật Khẩu phải từ :min ký tự trở lên',
            'user_password_repeat.required' => 'Mật Khẩu bắt buộc nhập',
            'user_password_repeat.min' => 'Mật Khẩu phải từ :min ký tự trở lên',
            'user_password_repeat.same' =>'Mật khẩu không khớp'
        ];
        $check = Validator::make($request->all(),$rules,$mess);
        $check->validate(); 
        if (!$check->fails()) {
            $dataUser = [
                'u_name' => $request->user_name,
                'u_email' => $request->user_mail,
                'u_password' => $request->user_password,
                'u_phone' => $request->user_phone,
                'city_id' => $request->city,
                'district_id' => $request->district,
                'wards_id' => $request->wards,
                'u_avatar' => ''
            ];
            // insert data user
            DB::table('user')
            ->insert($dataUser);
            //get last insert id
            $lastInsertId = DB::getPdo()->lastInsertId();
            $query = $this->user->userLogin($request->user_mail, $request->user_password);  
            // save session login          
            $dataUser = [
                "user_id" => $query[0]->id,
                "user_email" => $query[0]->u_email,
                "user_name" => $query[0]->u_name,
                "user_phone" => $query[0]->u_phone,
                "city" => $query[0]->city_name,
                "city_id" => $query[0]->city_code,
                "district" => $query[0]->district_name,
                "district_id" => $query[0]->district_code,
                "wards" => $query[0]->wards_name,
                "wards_id" => $query[0]->wards_code
            ];
            if(!empty($query)){
                session($dataUser);
                return redirect()->route('home');  
            }
        }
        // return redirect()->route('home');
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
        
        $email = $request->user_email;
        $pass = sha1($request->user_password);//mã hóa bằng sha1           
        $query = $this->user->userLogin($email, $pass);  
        // save session login          
        $dataUser = [
            "user_id" => $query[0]->id,
            "user_email" => $query[0]->u_email,
            "user_name" => $query[0]->u_name,
            "user_phone" => $query[0]->u_phone,
            "city" => $query[0]->city_name,
            "city_id" => $query[0]->city_code,
            "district" => $query[0]->district_name,
            "district_id" => $query[0]->district_code,
            "wards" => $query[0]->wards_name,
            "wards_id" => $query[0]->wards_code
        ];
        if(!empty($query)){
            session($dataUser);
            return redirect()->route('home');  
        }               
        // else
        //     return redirect()->route('post_login')->with('message','Tên Đăng Nhập hoặc Mật Khẩu không chính xác');
    }
    //logout
    public function logout()
    {
        session()->pull('user_id');        
        return redirect()->route('home');
    }
}
