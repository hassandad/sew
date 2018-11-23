<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class Student extends Controller
{
   
    public function placeOrder()
    {
        $paperType = DB::table('paper_type')->get();
        $subject = DB::table('subject')->get();
        $subSubject = DB::table('sub_subject')->get();
        $format = DB::table('assignment_format')->get();
        return view('dashboard.student.placeOrder',['type' => $paperType, 'subject' => $subject, 'sub' => $subSubject,'format' => $format]);
    }
    public function singleOrder($id)
    {
        return view('dashboard.student.singleOrder',['id' => $id]);
    }
    public function profile()
    {
        $timezone = [];
        foreach(timezone_abbreviations_list() as $value){
            foreach ($value as $v) {
                array_push($timezone,$v['timezone_id']);
            }
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $email =  \Illuminate\Support\Facades\Session::get('user')->email;
        $student = DB::table('student')->where('user_id',$id)->first();
        $country = DB::table('country')->get();
        return view('dashboard.student.profile',['student' => $student,'timezone' => $timezone, 'country' => $country, 'email' => $email]);
    }
    public function profileUpdate()
    {
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $_POST['user_id'] =  \Illuminate\Support\Facades\Session::get('user')->id;
        if ($_POST['file']) {
            $string = $_POST['file'];
            $new_data=explode(";",$string);
            $type=$new_data[0];
            $data=explode(",",$new_data[1]);
            header("Content-type:".$type);
            $codeBase = base64_decode($data[1]);
            $image = $_POST['fileName'];
            $file = file_put_contents("profile/".$image,$codeBase);
            DB::table('student')->where('user_id',$id)->update(['image' => $image]);
            session(['image' => $image]);
        }
        DB::table('student')->where('user_id',$id)->update(['name' => $_POST['name'],'contact' => $_POST['contact'],'country' => $_POST['country'],'state' => $_POST['state'],'city' => $_POST['city'],'address' => $_POST['address'],'about' => $_POST['about'],'timezone' => $_POST['timezone']]);
        return 'success';
    }
    function getSingle($id){
        $data = DB::table('student')->where('user_id',$id)->get();
        return response()->json($data);
    }

}
