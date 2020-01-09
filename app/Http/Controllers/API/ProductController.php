<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Validator;
class ProductController extends Controller
{
	public $successStatus = 200;
    public function index(){
    	$product = Product::all();
    	return response()->json(['status'=>'success','data'=>$product],$this->successStatus); 
    }//End Function 
    public function add_product(Request $request){
    	 $validator = Validator::make($request->all(),[ 
            'title' 		=> 'required', 
            'product_code' 	=> 'required', 
            'description' 	=> 'required', 
        ]);
		if ($validator->fails()) { 
			return response()->json(['status'=>'fail','message'=>$validator->errors()], 200);            
		}
		$product 				= New Product;
		$product->title 		= $request->title;
		$product->product_code 	= $request->product_code;
		$product->description 	= $request->description;
		if($product->save()){
			return response()->json(['status'=>'success','message'=>"Product added succcesfully."], 200);   
		}else{
			return response()->json(['status'=>'fail','message'=>"Something going wrong."], 200);   
		}
    }//End Function
    public function update_product(Request $request){
    	 $validator = Validator::make($request->all(),[ 
            'id' 			=> 'required', 
            'title' 		=> 'required', 
            'product_code' 	=> 'required', 
            'description' 	=> 'required', 
        ]);
		if ($validator->fails()) { 
			return response()->json(['status'=>'fail','message'=>$validator->errors()], 200);            
		}
		$product 				= Product::find($request->id);
		$product->title 		= $request->title;
		$product->product_code 	= $request->product_code;
		$product->description 	= $request->description;
		if($product->save()){
			return response()->json(['status'=>'success','message'=>"Product updated succcesfully."], 200);   
		}else{
			return response()->json(['status'=>'fail','message'=>"Something going wrong."], 200);   
		}
    }//End Function
    
}//
