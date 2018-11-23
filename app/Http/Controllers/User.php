<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
class User extends Controller
{
    function auth(Request $request){
        $check = DB::table('users')->where('email',$_POST['email'])->where('password',$_POST['password']);
        if($check->count() > 0){
            if ($check->first()->role == '2') {
                $data = DB::table('writer')->where('user_id',$check->first()->id)->first();
            } else {
                $data = DB::table('student')->where('user_id',$check->first()->id)->first();
            }
            $image = $data->image;
            $timezone = $data->timezone;
            
            $request->session()->put(['login' => true, 'user' => $check->first() , 'image' => $image , 'timezone' => $timezone]);
            $response = ['success' => 'ok', 'msg' => 'You have logged in'];
        }else{
            $response = ['error' => 'ok', 'msg' => 'The username or password is incorrect'];
        }
        return response()->json($response);
    }
    function check()
    {
        $id =  \Illuminate\Support\Facades\Session::get('user')->role;
        if($id == '2')
        {
            return redirect('/dashboard/writer/assignment');
        }
        else if($id == '1')
        {
            return redirect('/dashboard/student/myOrder');
        }
    }
    function createUser(){
        if(self::checkEmail($_POST['email']) > 0):
            $response = ['error' => 'ok', 'msg' => 'A user with this email already exists'];
        else:
           $id = DB::table('users')->insertGetId(['username' => $_POST['username'], 'email' => $_POST['email'], 'password' => $_POST['password'], 'role' => $_POST['type'], 'activation_code' => str_random(40)]);
            $response = ['success' => 'ok', 'msg' => 'A verification link has been sent to yor mail address'];
            self::verifyEmail($id);
        endif;
        return response()->json($response);
    }
    function checkEmail($email){
        $count = DB::table('users')->where('email',$email)->count();
        return $count;
    }
    function resetPassword(){
        $emailCheck = self::checkEmail($_POST);
        if($emailCheck > 0){
            $check = DB::table('reset_requests')->where('email',$_POST['email'])->whereNull('used')->count();
            if($check > 0){
                $response = ['error' => 'ok', 'msg' => 'Reset request has already been sent to your email , Please check you spam folder if not found in inbox'];
            }else{
                DB::table('reset_requests')->insert(['email' => $_POST['email'], 'code' => str_random(32)]);
                $response = ['success' => 'ok', 'msg' => 'Your Password has been sent to your email'];
                $data = DB::table('users')->where('email',$_POST['email'])->first();
                $user = ['email' => $data->email, 'notify' => 'Hello '.$data->username.' this is your password '.$data->password];
                
                        Mail::send('email.notification', $user,function($message) use ($user){
                            $message->to($user['email']);
                            $message->subject('Password');
                         });
            }
            return response()->json($response);
        }else{
            $response = ['noEmail' => 'ok', 'msg' => 'There is no user associated with this email'];
            return response()->json($response);
        }


    }
    function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
    function verifyEmail($id){
            $data = DB::table('users')->where('id',$id)->first();
            $user = ['email' => $data->email, 'code' => $data->activation_code, 'id' => $id];


            Mail::send('email.verification', $user,function($message) use ($user){
               $message->to($user['email']);
               $message->subject('Thank You For Signing up');
            });



    }
    function verifyUser($id,$code){
        $check = DB::table('users')->where('id',$id)->where('activation_code',$code)->count();
        if($check > 0):
            DB::table('users')->where('id',$id)->update(['verified' => 1]);
            return view('is_verifie');
            else:
            echo "Not found";
            endif;

    }
    function getSessionData(Request $request){
        $user = $request->session()->all();
        $data = DB::table('users')->where('id',$user['user']->id)->first();
        return response()->json($data);
    }
    public function placeOrder()
    {
        $paperType = DB::table('paper_type')->get();
        $subject = DB::table('subject')->get();
        $subSubject = DB::table('sub_subject')->get();
        $format = DB::table('assignment_format')->get();
        return view('dashboard.student.placeOrder',['type' => $paperType, 'subject' => $subject, 'sub' => $subSubject,'format' => $format]);
    }
    function getBids(){
        $id = \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('assignment_bid')
                ->where('user_id',$id)
                ->where('status','1')
                ->get();
        return response()->json($data);
    }
    public function test()
    {
        $current_time = Carbon::now()->toDateTimeString();
        
        $timestamp = time();
        $current_time = strtotime($current_time);
        echo date('D', $current_time);
    }
}
