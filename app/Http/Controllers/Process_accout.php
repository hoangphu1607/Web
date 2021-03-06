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
            'user_name.required' => 'H??? v?? t??n kh??ng ???????c tr???ng',
            'user_name.min' => 'H??? v?? t??n kh??ng d?????i :min k?? t???',
            'user_mail.required'=> 'Email kh??ng ???????c tr???ng',
            'user_mail.email' => 'Email kh??ng ????ng ?????nh d???ng',
            'user_mail.unique' => 'Email ???? t???n t???i',
            'user_phone.digits' => 'S??? ??i???n Tho???i kh??ng h???p l???',
            'user_phone.required' => 'S??? ??i???n Tho???t b???t bu???c nh???p',            
            'user_phone.unique' => 'S??? ??i???n tho???i ???? t???n t???i',
            'user_password.required' => 'M???t Kh???u b???t bu???c nh???p',
            'user_password.min' => 'M???t Kh???u ph???i t??? :min k?? t??? tr??? l??n',
            'user_password_repeat.required' => 'M???t Kh???u b???t bu???c nh???p',
            'user_password_repeat.min' => 'M???t Kh???u ph???i t??? :min k?? t??? tr??? l??n',
            'user_password_repeat.same' =>'M???t kh???u kh??ng kh???p'
        ];
        $check = Validator::make($request->all(),$rules,$mess);
        $check->validate(); 
        if (!$check->fails()) {
            $dataUser = [
                'u_name' => $request->user_name,
                'u_email' => $request->user_mail,
                'u_password' => sha1($request->user_password),
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
            $query = $this->user->userLogin($request->user_mail,sha1($request->user_password) );  
            // save session login          
            $dataUser = [
                "id_user" => $query[0]->id,
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
        // $request->validate([
        //     'user_email' => 'required',
        //     'user_password' => 'required',
        // ],[
        //     'user_email.required' => 'T??n ????ng nh???p kh??ng ???????c tr???ng',
        //     'user_password.required' => 'M???t kh???u kh??ng ???????c tr???ng',
        // ]);
        $rules = [
            'user_email' => 'required',
            'user_password' => 'required',
        ];
        $messages = [
            'user_email.required' => 'T??n t??i kho???n kh??ng ???????c b??? tr???ng',
            'user_password.required' => 'M???t kh???u kh??ng ???????c b??? tr???ng',
        ];
        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 
        if(!$check->fails()){
            $lists = DB::table('user')
            ->select('user.*','city.city_name','city.city_code','district.district_name','district.district_code','wards.wards_name','wards.wards_code')
            ->join('city', 'city.city_code', '=', 'user.city_id')  
            ->join('district', 'district.district_code', '=', 'user.district_id')
            ->join('wards', 'wards.wards_code', '=', 'user.wards_id')
            ->where('u_email',$request->user_email)
            ->where('u_password',sha1($request->user_password))
            ->get();
            //????? d??? li???u v??o session
            if(count($lists) != 0){
                $data = [
                    "id_user" => $lists[0]->id,
                    "user_email" => $lists[0]->u_email,
                    "user_name" => $lists[0]->u_name,
                    "user_phone" => $lists[0]->u_phone,
                    "city" => $lists[0]->city_name,
                    "city_id" => $lists[0]->city_code,
                    "district" => $lists[0]->district_name,
                    "district_id" => $lists[0]->district_code,
                    "wards" => $lists[0]->wards_name,
                    "wards_id" => $lists[0]->wards_code
                ];
                session($data);
                return response()->json([
                    'success' => true,
                    'data' => $data,
                    'count' => count($lists),
                ]);
            }
            else{
                return response()->json([
                    'fail' => false,
                ]);
            }  
    }
}
    //logout
    public function logout()
    {
        session()->pull('id_user');        
        return redirect()->route('home');
    }
}
