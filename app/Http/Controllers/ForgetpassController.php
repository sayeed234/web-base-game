<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\User;
use DB;
use Hash;
use Mail;

class ForgetpassController extends Controller
{

    public function referlog($ref){

    return view('auth.refer',compact('ref'));
   }




    public function forgetepass(){
        return view('forgetpass');
    }

    public function forgetepassreset(Request $request){

              
         $agent = DB::table('users')
                ->where('mobile',$request->mobile)
                ->where('email',$request->email)
                ->first();
                 
             $newpass=substr(uniqid(),5);
            
            // Hash::make($newpass)
                if($agent==''){
            return redirect()->route('forgetepass')->with('success', 'User ID Or Email does not match');
                }else{
                    
                    DB::table('users')->where('id',$agent->id)->update(['password' => 5]);


                    $data=Array(
                              'Email'=>$request->email
                            );
                            Mail::send('mail',$data,function ($message) use ($data){
                            $message->to($data['Email']);
                            $message->subject('Successfully Confirm Order');
                            echo "basic email check";
                          
                        });


             return redirect()->route('login')->with('success', 'please check your email for new password');              
                }
    }
}
