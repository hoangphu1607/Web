<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Process;
class ProductsController extends Controller
{
    private $admin;
    public function __construct()
    {        
        $this->admin = new Process();        
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
            'pro_description' => 'required',
            // 'pro_content' => 'required',
            'image' => 'required',
        ];
        $messages = [
            'image.required' => 'Cần phải có ảnh',
            // 'pro_content.required' => 'Phải có nội dung',
            'pro_description.required' => 'Phải có nội dung',
            'pro_name.required' => 'Phải đặt tên',
            'pro_price.required' => 'Phải có giá tiền'
        ];
        $check = Validator::make($request->all(),$rules,$messages);
        $check->validate(); 
        //tách chuỗi đơn vị tính (description)
        $arr_des = explode(",",$request->pro_description);
        $arr_price = explode(",",$request->pro_price);
        if(!$check->fails() && count($arr_des) == count($arr_price)){
            $file = $request->image; //Lấy file từ form sang -- image là dữ liệu nhập vào  
           // $fileName =  $request->categories_name .'.'. $file->getClientOriginalExtension();//$request->categories_name đổi tên hình theo tên loại sản phẩm
            $imageName = time().'.'.$request->image->extension();      // nên làm cách này cho ko trùng tên ảnh      
            $file->move('img\product', $imageName); //chuyển file đến thư mục mong muốn 
            $path_img = 'img\product\\'. $imageName; //lấy đường dẫn file đang tồn tại (img\categories\)
            $dataInsert = [
                $pro_name = $request->pro_name,
                $pro_categories_id = $request->pro_categories,
                $suppliers_id = $request->pro_suppliers,
                $image = $path_img, 
                $pro_status = 1,
                $pro_description_id = 0,
                $pro_content = ""
            ];  
            DB::insert('insert into product (pro_name, pro_category_id, supplier_id, pro_avatar, pro_status, pro_description_id, pro_content) 
            values (?, ?, ?, ?, ?, ?, ?)', $dataInsert);
            $id = DB::getPdo()->lastInsertId();
            // update pro_description_id
            DB::table('product')
            ->where('id', $id)
            ->update([
                'pro_description_id' => $id,                    
            ]);
            //insert description_detail
            for($i = 0; $i < count($arr_des); $i++){
                $dataDetail = [
                    $type = trim($arr_des[$i]),
                    $price = trim($arr_price[$i]),
                    $product_id = $id
                ];
                DB::insert('insert into description_detail(type, price, product_id)
                values(?,?,?)',$dataDetail);
            }
            return response()->json([
                "success" => true,
                "arr1" => $arr_des,
                "arr2" => $arr_price   
            ]); 
        }
        return response()->json([
            "success" => false
        ]); 
    }
    
    
    //quản lý sản Phẩm
    public function editProduct()
    {
        $dataCategories = $this->admin->getCategories();
        $dataSuppliers = $this->admin->getSuppliers();
        return view('pages.admin.editProduct',compact('dataCategories','dataSuppliers'));
    }
    //lấy tất cả sản phẩm ra
    public function getAllProduct()
    {
        $dataTable = DB::table('product')
        ->join('categories','product.pro_category_id','=','categories.id')
        ->join('suppliers','product.supplier_id','=','suppliers.id')
        ->join('description_detail','description_detail.product_id','=','product.id')
        ->select('product.*','categories.c_name','suppliers.s_name','description_detail.price','description_detail.type','description_detail.id as des_id')
        ->where('pro_status',1)
        ->where('description_detail.status',1)
        ->orderBy('id','desc')
        ->get();
        // dd($dataTable);
        return response()->json([
            'data' => $dataTable
        ]);
    }
    //Get 1 product
    public function getOneProduct(Request $request)
    {
        $product = DB::table('product')
        ->join('description_detail','description_detail.product_id','=','product.id')
        ->where('product.id',$request->id)
        ->where('description_detail.id',$request->idDes)
        ->get();
        return response()->json([
            'product' => $product
        ]);
    }
    //update product
    public function updateProduct(Request $request )
    {
        $rules = [
            'pro_name' => 'required',
            'pro_price' => 'required',
            'pro_description' => 'required',
        ];
        $message = [
            'pro_name.required' => 'Phải đặt tên sản phẩm',
            'pro_price.required' => 'Phải có giá tiền',
            'pro_description.required' => 'Phải có đơn vị tính'
        ];
        $check = Validator::make($request->all(),$rules,$message);
        $check->validate(); 
        if(!$check->fails()){
            if($request->hasFile('image')){
                $file = $request->image; //Lấy file từ form sang -- image là dữ liệu nhập vào  
                $imageName = time().'.'.$request->image->extension();      // nên làm cách này cho ko trùng tên ảnh      
                $file->move('img\product', $imageName); //chuyển file đến thư mục mong muốn 
                $path_img = 'img\product\\'. $imageName; //lấy đường dẫn file đang tồn tại (img\categories\)
                $update = DB::table('product')
                ->where('id', $request->id)
                ->update([
                    'pro_name' => $request->pro_name,
                    'pro_category_id' => $request->pro_categories_id,
                    'supplier_id' => $request->pro_suppliers_id,
                    'pro_avatar' => $path_img,                    
                ]);
            }else{                
                $update = DB::table('product')
                ->where('id', $request->id)
                ->update([
                    'pro_name' => $request->pro_name,
                    'pro_category_id' => $request->pro_categories_id,
                    'supplier_id' => $request->pro_suppliers_id,
                ]);
            }   
            $updateDescription = DB::table('description_detail')
                ->where('id',$request->idDes)
                ->update([
                    'type' => $request->pro_description,
                    'price' => $request->pro_price,
            ]);         
            return response()->json([
                "success" => $update,
                "name" => "Phu"          
            ]); 
        }
    }
    //add detail images of product
    public function addProductDetailImages(Request $request)
    {   
        $str = '';
        if ($request->hasFile('file')) {
            $images = $request->file('file');
            foreach ($images as $image) {
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('img\product\test'),$imageName);
                $img_path = 'img\product\test\\'.$imageName;
                $str += $img_path . ' '; 
            }
            $sql  = DB::table('product')
            ->where('id',82)
            ->update([
                'pro_detail_images'=>$str,
            ]);
        }
        return response()->json([
            "success" => $sql,
        ]);
    }
    //delete Product
    public function deleteProduct(Request $request)
    {
        $delete = DB::table('description_detail')
        ->where('id', $request->id)
        ->update([
            'status' => 0,                    
        ]);
        return response()->json([
            'success' => $request->id,
            // 'sl' => $delete
        ]);
    }

    //Update content
    public function updateContent(Request $request)
    {
        $rules = [
            'pro_content' => 'required',
        ];
        $mess = [
            'pro_content.required' => 'Nội dung không được trống',
        ];
        $check = Validator::make($request->all(),$rules,$mess);
        $check->validate(); 
        if(!$check->fails()){            
            $updateContent = DB::table('product')
            ->where('id',$request->id)
            ->update([
                'pro_content' => $request->pro_content,
            ]); 
            return response()->json([
                'success' => true,
                'content' => $request->pro_content,
            ]);    
        }
        
    }
}
