<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Writer extends Controller
{
    function auctions(Request $request){
        return view('writer.auctions.list');
    }
    function auctionSingle(Request $request,$id){
        return view('writer.auctions.single',['id' => $id]);
    }
    function myOrderSingle(Request $request,$id){    
        return view('dashboard.writer.single',['id' => $id]);
    }
    function get(){
        $data = DB::table('writer')->where('status','1')->orderBy('rating','desc')->simplePaginate(30);
        return response()->json($data);
    }
    function getSingle($id){
        $data = DB::table('writer')->where('user_id',$id)->get();
        return response()->json($data);
    }
    function getType($id){
        $type = explode(",",$id);
        foreach ($type as $key => $value) {
            $get[$key] = DB::table('paper_type')->where('id',$value)->get();
        }
        foreach ($get as $key => $value) {
            $data[$key] = $value['0']->name;
        }
        $t = implode('  ,',$data);
        return response()->json($t);
    }
    function search($name){
        $data = DB::table('writer')->where('status','1')->where('name','LIKE','%'.$name.'%')->simplePaginate(30);
        return response()->json($data);
    }
    function setting(){
        $timezone = [];
        foreach(timezone_abbreviations_list() as $value){
            foreach ($value as $v) {
                array_push($timezone,$v['timezone_id']);
            }
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $template = DB::table('template')->get();
        $country = DB::table('country')->get();
        $paperType = DB::table('paper_type')->get();
        $subject = DB::table('subject')->get();
        $subSubject = DB::table('sub_subject')->get();
        $writer = DB::table('writer')->where('user_id',$id)->first();
        $writer->subject_id = explode(',',$writer->subject_id);
        $writer->paper_type = explode(',',$writer->paper_type);
        $writer->language = explode(',',$writer->language);
        return view('dashboard.writer.setting',['type' => $paperType,'writer' => $writer,'timezone' => $timezone,'template' => $template,'country' => $country, 'subject' => $subject, 'sub' => $subSubject]);
    }
    function writerProfile($id){
        $goodreview = DB::table('review')->where('writer_id',$id)->where('ratting','>','2')->count();
        $badreview = DB::table('review')->where('writer_id',$id)->where('ratting','<','3')->count();
        
        $review = DB::table('review')->where('writer_id',$id)->get();
        $totalReview = count($review);
        if ($totalReview > 0) {
            $rating = 0;
            foreach ($review as $key => $value) {
                $rating = $rating + $value->ratting;
                $value->student_id = DB::table('student')->where('user_id',$value->student_id)->first()->name;
            }
            $rating = $rating / $totalReview;
            if ($goodreview) {
                $goodreview = ($goodreview * 100) / $totalReview;
            }
            if ($badreview) {
                $badreview = ($badreview * 100) / $totalReview;
            }
        }else {
            $rating = 1;
        }
        $paperType = DB::table('writer')->where('user_id',$id)->first();
        $temp = [];
        if ($paperType->paper_type) {
            $temp = explode(',',$paperType->paper_type);
            foreach ($temp as $key => $value) {
                $temp[$key] = DB::table('paper_type')->where('id',$value)->first()->name;
            }
            $paperType = $temp;
        }
        $subject = DB::table('writer')->where('user_id',$id)->first();
        $temp = [];
        if ($subject->subject_id) {
            $temp = explode(',',$subject->subject_id);
            foreach ($temp as $key => $value) {
                $temp[$key] = DB::table('sub_subject')->where('id',$value)->first()->name;
            }
            $subject = $temp;
        }
        else{
            $subject = [];
        }
        $writer = DB::table('writer')->where('user_id',$id)->first();
        $writer->paper_type = DB::table('order')->where('writer_id',$id)->where('status','1')->get()->count();
        $compeleted = DB::table('order')->where('writer_id',$id)->where('order.status','4')
        ->join('assignment','order.assignment_id','=','assignment.id')->get();
        $writer->subject_id = $compeleted->count();
        return view('dashboard.student.writerProfile',['review' => $review,'goodreview' => $goodreview,'badreview' => $badreview,'rating' => $rating, 'paperType' => $paperType,'compeleted' => $compeleted,'writer' => $writer,'subject' => $subject]);
    }
    function profile(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $goodreview = DB::table('review')->where('writer_id',$id)->where('ratting','>','2')->count();
        $badreview = DB::table('review')->where('writer_id',$id)->where('ratting','<','3')->count();
        
        $review = DB::table('review')->where('writer_id',$id)->get();
        $totalReview = count($review);
        if ($totalReview > 0) {
            $rating = 0;
            foreach ($review as $key => $value) {
                $rating = $rating + $value->ratting;
                $value->student_id = DB::table('student')->where('user_id',$value->student_id)->first()->name;
            }
            $rating = $rating / $totalReview;
            if ($goodreview) {
                $goodreview = ($goodreview * 100) / $totalReview;
            }
            if ($badreview) {
                $badreview = ($badreview * 100) / $totalReview;
            }
        }else {
            $rating = 1;
        }
        $paperType = DB::table('writer')->where('user_id',$id)->first();
        $temp = [];
        if ($paperType->paper_type) {
            $temp = explode(',',$paperType->paper_type);
            foreach ($temp as $key => $value) {
                $temp[$key] = DB::table('paper_type')->where('id',$value)->first()->name;
            }
            $paperType = $temp;
        }
        $subject = DB::table('writer')->where('user_id',$id)->first();
        $temp = [];
        if ($subject->subject_id) {
            $temp = explode(',',$subject->subject_id);
            foreach ($temp as $key => $value) {
                $temp[$key] = DB::table('sub_subject')->where('id',$value)->first()->name;
            }
            $subject = $temp;
        }
        else{
            $subject = [];
        }
        $writer = DB::table('writer')->where('user_id',$id)->first();
        $writer->paper_type = DB::table('order')->where('writer_id',$id)->where('status','1')->get()->count();
        $compeleted = DB::table('order')->where('writer_id',$id)->where('order.status','4')
        ->join('assignment','order.assignment_id','=','assignment.id')->get();
        $writer->subject_id = $compeleted->count();
        return view('dashboard.writer.profile',['review' => $review,'goodreview' => $goodreview,'badreview' => $badreview,'rating' => $rating, 'paperType' => $paperType,'compeleted' => $compeleted,'writer' => $writer,'subject' => $subject]);
    }
    function addQualification(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        if ($_POST['subject_id']) {
            $_POST['subject_id'] = implode(",",$_POST['subject_id']);
        } else {
            $_POST['subject_id'] = '';
        }
        if ($_POST['paper_type']) {
            $_POST['paper_type'] = implode(",",$_POST['paper_type']);
        } else {
            $_POST['paper_type'] = '';
        }
        if ($_POST['language']) {
            $_POST['language'] = implode(",",$_POST['language']);
        } else {
            $_POST['language'] = '';
        }
        DB::table('writer')->where('user_id',$id)->update(['intro_short' => $_POST['intro_short'],'intro_long' => $_POST['intro_long'],'education' => $_POST['education'],'graduated' => $_POST['graduated'],'specialized' => $_POST['specialized'],'paper_type' => $_POST['paper_type'],'subject_id' => $_POST['subject_id'],'language' => $_POST['language']]);
        return 'success';
    }
    function addPersonal(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;

        if($_POST['oldPassword']){
            $password = DB::table('users')->where('id',$id)->first()->password;
            if($password == $_POST['oldPassword']) {
                if($_POST['newPassword']){
                    DB::table('users')->where('id',$id)->update(['password' => $_POST['newPassword']]);
                }
                else{
                    return "New Password is not Present";
                }
            }
            else{
                return "Old Password is not Correct";
            }
        }

        if ($_POST['file']) {
            $string = $_POST['file'];
            $new_data=explode(";",$string);
            $type=$new_data[0];
            $data=explode(",",$new_data[1]);
            header("Content-type:".$type);
            $codeBase = base64_decode($data[1]);
            $image = $_POST['fileName'];
            $file = file_put_contents("profile/".$image,$codeBase);
            DB::table('writer')->where('user_id',$id)->update(['image' => $image]);
            session(['image' => $image]);
        }

        DB::table('writer')->where('user_id',$id)->update(['name' => $_POST['name'],'timezone' => $_POST['timezone'],'dob' => $_POST['dob'],'country' => $_POST['country'],'city' => $_POST['city'],'address' => $_POST['address']]);
        return 'success';
    }
    function createTemplate(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        DB::table('template')->insert(['name' => $_POST['name'], 'text' => $_POST['text'],'writer_id' => $id]);
        return 'success';
    }
    function updateTemplate($id){
        DB::table('template')->where('id',$id)
        ->update(['name' => $_POST['name'], 'text' => $_POST['text'],'writer_id' => $id]);
        return 'success';
    }
    function deleteTemplate($id){
        DB::table('template')->where('id',$id)->delete();
        return self::setting();
    }
    function getTemplate($id){
        $data = DB::table('template')->where('id',$id)->first();
        return response()->json($data);
    }
    function balance(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $pending = DB::table('payment')->where('payment.user_id',$id)->where('payment.status','0')->
        join('assignment','payment.assignment_id','=','assignment.id')->
        select('*','payment.id as id','payment.status as status','payment.created_on as created_on','payment.user_id as user_id','payment.price as price')->get();
        $compelete = DB::table('payment')->where('payment.user_id',$id)->where('payment.status','1')->
        join('assignment','payment.assignment_id','=','assignment.id')->
        select('*','payment.id as id','payment.status as status','payment.created_on as created_on','payment.user_id as user_id','payment.price as price')->get();
        $totalPending = 0;
        $totalCompelete = 0;
        if ($pending) {
            foreach ($pending as $key => $value) {
                $totalPending = $totalPending + $value->price;
            }
        }
        if ($compelete) {
            foreach ($compelete as $key => $value) {
                $totalCompelete = $totalCompelete + $value->price;
            }
        }
        return view('dashboard.writer.balance',['pending' => $pending,'compelete' => $compelete,'totalPending' => $totalPending,'totalCompelete' => $totalCompelete]);
    }
}
