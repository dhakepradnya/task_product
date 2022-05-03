<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use DB;
use Session;
use Auth;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    public function index()
    {
		
	 $prod = DB::table('products')
			->where('flag', 'Show')
			->get();
		return view('Product/index', compact('prod'));
	 
	 
	 
	 
    }
	
	
    public function create()
    {
        return view('Product.create');
    }
    
  
    public function insert(Request $request)
    {
	  $date = Carbon::now('Asia/Kolkata');
	  $c_date = date('Y-m-d',strtotime($date));
	  $time = date('H:i:s',strtotime($date));
	  $flag = 'Show';
        $request->validate([
            'p_name' => 'required',
            'p_price' => 'required|numeric',
			'p_description'=>'required',
			'files.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
   
         $p_name = $request->input('p_name');
		 $p_price = $request->input('p_price');
		 $p_description = $request->input('p_description');
		
       
  
        if ($request->hasfile('files')) {
            $files = $request->file('files');
         
		  
		    $i='1';
            foreach($files as $file) {
			
				
				//print_r($files);echo "</br>";
            $destinationPath = 'image/';
            $profileImage = $p_name."-".$i.".".$file->getClientOriginalExtension();
			//print_r($profileImage);
            $file->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
			$pro_arr[] = $profileImage;
			$i++;
			}
		 $pro_id = implode(",",$pro_arr);
			
        $data = array('product_name'=>$p_name,'product_price'=>$p_price,'product_desccription'=>$p_description
	 ,'product_image'=>$pro_id,'created_at'=>$c_date." / ".$time,'flag'=>$flag);
		 
	    $check = DB::table('products')->where('flag','Show')->where('product_name',$p_name)->count();
	    $value = Product::insertproduct($data);
               
          
         }
            $prod = DB::table('products')
			->where('flag', 'Show')
		   ->get();
		  
		return view('Product/index', compact('prod'));
		 alert()->message('Image uploaded successfully');
    }
	
	
   public function deleteproduct($id){
	   
	   $date = Carbon::now('Asia/Kolkata');
	 $c_date = date('Y-m-d',strtotime($date));
	 $time = date('H:i:s',strtotime($date));
	
	 
     DB::update('update products set flag = ?  , updated_at = ? where id = ?',['Deleted',$c_date." / ".$time,$id]);
	   
	   exit;
  }	
	   public function show_image($img_id)
	   
	   {
		  $prod = DB::table('products')
		 ->where('flag', 'Show')
		 ->where('id', $img_id)
		   ->first();
		   
		    $product_name = $prod->product_name;
		   $product_image = $prod->product_image;
		   
		    $product_ima=explode(",",$product_image);
		  
		   return view('Product/show_image', compact('product_ima','product_name'));
			}
		   
		 public function edit($img_id)
    {
		$img_did = Crypt::decrypt($img_id);
		$prod = DB::table('products')
		 ->where('flag', 'Show')
		 ->where('id', $img_did)
		   ->first();
		    $product_desccription = $prod->product_desccription;
		    $id = $prod->id;
			$product_name = $prod->product_name;
			$product_price = $prod->product_price;
			$product_image = $prod->product_image;
		   $product_ima=explode(",",$product_image);
		   
        return view('Product.edit', compact('id','product_ima','product_name','product_desccription','product_price','product_image'));
    }   
	
	 public function update(Request $request)
    {
	  $date = Carbon::now('Asia/Kolkata');
	  $c_date = date('Y-m-d',strtotime($date));
	  $time = date('H:i:s',strtotime($date));
	  $flag = 'Show';
        $request->validate([
            'p_name' => 'required',
            'p_price' => 'required|numeric',
			'p_description'=>'required',
			'files.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]);
   
   $prod_id = $request->input('prod_id');
         $p_name = $request->input('p_name');
		 $p_price = $request->input('p_price');
		 $p_description = $request->input('p_description');
		
       
  
        if ($request->hasfile('files')) {
            $files = $request->file('files');
         
		  
		    $i='1';
            foreach($files as $file) {
                
				//print_r($files);echo "</br>";
            $destinationPath = 'image/';
            $profileImage = $p_name."-".$i.".".$file->getClientOriginalExtension();
			//print_r($profileImage);
            $file->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
			$pro_arr[] = $profileImage;
			$i++;
			}
		 $pro_id = implode(",",$pro_arr);
			
        $check = DB::table('products')->where('flag','Show')->where('product_name',$p_name)->count();
	 
	      DB::update('update products set product_name =?,product_price = ?  , product_desccription = ? ,product_image = ? , updated_at = ? where id = ?',[$p_name,$p_price,$p_description,$pro_id ,$c_date." / ".$time,$prod_id]);
               
          
         }
   $prod = DB::table('products')
			->where('flag', 'Show')
		   ->get();
		return view('Product/index', compact('prod'));
    }
	
	
	
	
}
