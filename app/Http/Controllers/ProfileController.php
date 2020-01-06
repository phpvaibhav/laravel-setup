<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View,Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use File;
use Mail;
class ProfileController extends Controller
{
    //
    public function index(){
    	return View::make('pages.profile');
    }//End Function
    public function change_pass(){
    	return View::make('pages.change_pass');
    }//End Function
    public function profile_image(){
    	return View::make('pages.profileimage');
    }//End Function
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
        'old_password'     => 'required',
        'new_password'     => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
        ]);

        $data = $request->all();

        $user = User::find(auth()->user()->id);


        if(!\Hash::check($data['old_password'], $user->password)){

        return back()->with('fail','You have entered wrong password');

        }else{

        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($data['new_password']);;
        $obj_user->save(); 
        return Redirect('dashboard')->withSuccess('Password change successfully.');
        }
    }//End FUnction    
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
        'name'     => 'required',
        ]);

        $data = $request->all();

        $user = User::find(auth()->user()->id);


        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->name = $data['name'];
        $save=$obj_user->save(); 
        if($save){
            return Redirect('profile')->withSuccess('Profile updated successfully.');
        }else{
            return back()->with('fail','Something going wrong.');
        } 
    }//End FUnction
     public function updateImage(Request $request)
    {
        $this->validate($request, [
        'profileImage' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);
        if($request->hasFile('profileImage')) {
        //get filename with extension
        $filenamewithextension = $request->file('profileImage')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file('profileImage')->getClientOriginalExtension();
      
        //filename to store
        $filenametostore = rand('11','99999').'_'.time().'.'.$extension;

        //Upload File
        $request->file('profileImage')->storeAs('public/profile', $filenametostore);
        $request->file('profileImage')->storeAs('public/profile/thumbnail', $filenametostore);
     

        //create small thumbnail
        $smallthumbnailpath = public_path('storage/profile/thumbnail/'.$filenametostore);
        $this->createThumbnail($smallthumbnailpath, 60,60);
        //return redirect('image')->with('success', "Image uploaded successfully.");

       
            $data = $request->all();

            $user = User::find(auth()->user()->id);


            $user_id = Auth::User()->id;   
            $this->deleteThumbnail(public_path('storage/profile/'),Auth::User()->profile_image);
            $this->deleteThumbnail(public_path('storage/profile/thumbnail/'),Auth::User()->profile_image);                    
            $obj_user = User::find($user_id);
            $obj_user->profile_image = $filenametostore;
            $save=$obj_user->save(); 
            if($save){
            return Redirect('profile-image')->withSuccess('Profile Image updated successfully.');
            }else{
            return back()->with('fail','Something going wrong.');
            } 
        }
       
    }//End FUnction
    /**
 * Create a thumbnail of specified size
 *
 * @param string $path path of thumbnail
 * @param int $width
 * @param int $height
 */
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
    function sendMail(){
        return View::make('pages.mail');
    }//end Function
    function googleMail(Request $request){
        request()->validate([
        'title'     => 'required',
        'subject'   => 'required',
        'email'     => 'required|email',
        'message'   => 'required',
        ]);
        
        $data       = $request->all();
        $to_email   = $data['email'];
        $subject    = $data['subject'];
        $title      = $data['title'];
        $message    = $data['message'];
        $body       = array('title'=>$title,'body'=>$message);
       // print_r($data);die;
 
      /*  Mail::send('emails.email', $body, function($message) {
 
            $message->to( $email, $email)
 
                    ->subject($subject);
        });
 */
        $to_name = "vaibhav";
        Mail::send('pages.template',$body,function($message) use ($to_name,$to_email,$subject){
            $message->to($to_email)->subject($subject);
        });
        if (Mail::failures()) {
           return  Redirect('send-mail')->withFail('Sorry! Please try again latter');
         }else{
           return Redirect('send-mail')->withSuccess('Great! Successfully send in your mail');
         }
       
    }//end Function
    
}//End Class 
