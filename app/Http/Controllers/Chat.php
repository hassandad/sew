<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Chat extends Controller
{
    
    public function add()
    {
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('chat')->where('student_id',$id)->where('writer_id',$_POST['writer_id'])->count();
        $count2 = DB::table('message')->where('sender_id',$_POST['writer_id'])->where('message',$_POST['message'])->count();
        if (!$count) {
            DB::table('chat')->insert(
                ['student_id' => $id,'writer_id' => $_POST['writer_id']]);
        }
        if (!$count2) {
            DB::table('message')->insert(
                ['reciver_id' => $id,'sender_id' => $_POST['writer_id'],'message' => $_POST['message'], 'created_on' => Carbon::now()]);
        }

      
    }
    function get(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        // $data = DB::table('message')->where('sender_id',$id)->orWhere('reciver_id',$id)->rightjoin('order','message.order_id','=','order.id')->get();
        $data = DB::table('order')->get();
        $result = [];
        foreach ($data as $key => $value) {
            $temp = DB::table('message')->where('order_id',$value->id)->where('sender_id',$id)->orWhere('reciver_id',$id)->where('order_id',$value->id)->join('order','message.order_id','=','order.id')->first();
            if ($temp) {
                array_push($result,$temp);
            }
        }
        return response()->json($result);
    }
    function getMessage($wid){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        DB::table('message')->where('order_id',$wid)->update(['status' => '1']);
        $data = DB::table('message')->where('order_id',$wid)->paginate(6);
        foreach ($data as $key => $value) {
            $value->created_on = Carbon::parse($value->created_on)->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function getMessageCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('message')->where('reciver_id',$id)->where('status','0')->count();
        return response()->json($data);
    }
    function getChatCount($wid){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('message')->where('status','0')->where('sender_id',$id)->where('reciver_id',$wid)->orwhere('sender_id',$wid)->where('reciver_id',$id)->where('status','0')->count();
        return response()->json($data);
    }
    public function addMessage()
    {
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
            DB::table('message')->insert(
                ['sender_id' => $id,'reciver_id' => $_POST['writer_id'],'message' => $_POST['message'],'order_id' => $_POST['order_id'], 'created_on' => Carbon::now()]);
    }
    function getLastMessage($wid){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('message')->where('order_id',$wid)->orderBy('id','desc')->first();
        return response()->json($data);
    }




    function getWriter(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        // $data = DB::table('chat')->where('writer_id',$id)->join('student','chat.student_id','=','student.user_id')->get();
        $data = DB::table('order')->get();
        $result = [];
        foreach ($data as $key => $value) {
            $temp = DB::table('message')->where('order_id',$value->id)->where('sender_id',$id)->orWhere('reciver_id',$id)->where('order_id',$value->id)->join('order','message.order_id','=','order.id')->first();
            if ($temp) {
                array_push($result,$temp);
            }
        }
        return response()->json($result);
    }
    function getWriterChatCount($wid){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('message')->where('order_id',$wid)->where('status','0')->count();
        return response()->json($data);
    }
    function getWriterLastMessage($wid){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('message')->where('order_id',$wid)->orderBy('id','desc')->first();
        return response()->json($data);
    }
    function checkNewMessage($wid)
    {
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('message')->where('status','0')->where('sender_id',$id)->where('reciver_id',$wid)->orwhere('sender_id',$wid)->where('reciver_id',$id)->count();
        return response()->json($data);
   
    }
    function getSingle(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('message')->where('message.status','0')->where('message.reciver_id',$id)->join('writer','message.sender_id','=','writer.user_id')->select('*','message.id as id')->first();
        if ($data == '') {
            return response()->json('error');
        } else {
            return response()->json($data);
        }
    }
    function updateChatSingle($id){
        DB::table('message')->where('id',$id)->update(['status' => '1']);
    }
    function getWriterSingle(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('message')->where('message.status','0')->where('message.reciver_id',$id)->join('student','message.sender_id','=','student.user_id')->select('*','message.id as id')->first();
        if ($data == '') {
            return response()->json('error');
        } else {
            return response()->json($data);
        }
    }
    
}
