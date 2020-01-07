<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use View,Redirect,Response;
use Image;
use File;
class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['front_scripts'] = array('login/customer.js');
        return View::make('pages.customers',$data);
    }
    public function customerList(){
        if(request()->ajax()) {
            return datatables()->of(Customer::select('*'))
            ->addColumn('image',function ($data) { 
            if($data->image){
                $url= asset('storage/customer/thumbnail/'.$data->image);
            }else{
                
                $url= asset('backend_assets/img/avatar.png');
            }
            
            return '<img src="'.$url.'" class="img img-thumbnail" align="center" />';
        } )
            ->addColumn('action',function ($data) { 
            if($data->image){
                $url= asset('storage/customer/thumbnail/'.$data->image);
            }else{
                
                $url= asset('backend_assets/img/avatar.png');
            }
            
            return '<a href="javascript:void(0)" data-toggle="tooltip" id="edit-user" data-id="'.$data->id.'" data-name="'.$data->name.'" data-email="'.$data->email.'"  data-address="'.$data->address.'" data-image = "'.$url.'" data-original-title="Edit" class="d-none d-sm-inline-block btn btn-sm">Edit</a><a href="javascript:void(0);" data-toggle="tooltip" data-original-title="Delete" data-id="'.$data->id.'" class="d-none d-sm-inline-block btn btn-sm delete-user">Delete</a>';
        })
            ->rawColumns(['image','action'])
            ->addIndexColumn()
            ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $validator = request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'address' => 'required',
       // 'image' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);
        $data = $request->all();
        $image = "";
        if($request->hasFile('image')) {
        //get filename with extension
        $filenamewithextension = $request->file('image')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file('image')->getClientOriginalExtension();
      
        //filename to store
        $filenametostore = rand('11','99999').'_'.time().'.'.$extension;

        //Upload File
        $request->file('image')->storeAs('public/customer', $filenametostore);
        $request->file('image')->storeAs('public/customer/thumbnail', $filenametostore);
     

        //create small thumbnail
        $smallthumbnailpath = public_path('storage/customer/thumbnail/'.$filenametostore);
        $this->createThumbnail($smallthumbnailpath, 60,60);
        //return redirect('image')->with('success', "Image uploaded successfully.");                
            $image = $filenametostore;

        }
        if($image){
        
          $save = Customer::updateOrCreate(['id'=>$data['user_id']],[
        'name' => $data['name'],
        'email' => $data['email'],
        'address' => $data['address'],
        'image' => $image
        ]);
        }else{
           $save = Customer::updateOrCreate(['id'=>$data['user_id']],[
        'name' => $data['name'],
        'email' => $data['email'],
        'address' => $data['address']
        ]);
        }
      
        if($save){
            if($data['user_id']){
                 return Response::json(array('status'=>'success','message'=>"Customer has been updated successfully."));
            }else{
                 return Response::json(array('status'=>'success','message'=>"Customer has been added successfully."));
            }
           
        }else{
            return Response::json(array('status'=>'fail','message'=>"Something going wrong."));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $customer = Customer::where('id',$id)->delete();
        $customer = Customer::find($id)->delete($id);
        if($customer){
            return Response::json(array('status'=>'success','message'=>'Record deleted successfully.'));
        }else{
           return Response::json(array('status'=>'fail','message'=>'Something going wrong.')); 
        }

        
    }
        public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
       $img->save($path);
    }
    public function deleteThumbnail($path,$file)
    {
            $destinationPath = $path.$file;
            if (File::exists($destinationPath)) {
            File::delete($destinationPath);
                //unlink($destinationPath);
            }
            
    }//End Function
}
