<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public static function insertproduct($data){
 
      
      $value=DB::table('products')->where('product_name', $data['product_name'])->count(); 
	  
     if($value == 0){
       $insertid = DB::table('products')->insertGetId($data);
       return $insertid;
	   
     }else{
       return 0;
     }

   }
}
