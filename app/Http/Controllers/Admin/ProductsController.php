<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
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
                $pro_description = $request->pro_description,
                $pro_content = "",
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
        ->select('product.*','categories.c_name','suppliers.s_name')
        ->where('pro_status',1)
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
        ->where('id',$request->id)
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
                    'pro_price' => $request->pro_price,
                    'pro_description' => $request->pro_description,
                    'pro_category_id' => $request->pro_categories_id,
                    'supplier_id' => $request->pro_suppliers_id,
                    'pro_avatar' => $path_img,                    
                ]);
            }else{                
                $update = DB::table('product')
                ->where('id', $request->id)
                ->update([
                    'pro_name' => $request->pro_name,
                    'pro_price' => $request->pro_price,
                    'pro_description' => $request->pro_description,
                    'pro_category_id' => $request->pro_categories_id,
                    'supplier_id' => $request->pro_suppliers_id,
                ]);
            }            
            return response()->json([
                "success" => $update,
                "name" => "Phu"          
            ]); 
        }
    }
    //delete Product
    public function deleteProduct(Request $request)
    {
        $delete = DB::table('product')
        ->where('id', $request->id)
        ->update([
            'pro_status' => 0,                    
        ]);
        return response()->json([
            'success' => $request->id,
            // 'sl' => $delete
        ]);
    }
}
