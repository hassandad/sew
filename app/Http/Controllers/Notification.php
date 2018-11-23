<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Notification extends Controller
{
    public function view()
    { 
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $current = Carbon::now();
        $data = DB::table('notification')->where('reciver',$id)->whereDate('notification.created_on',$current->toDateString())->join('writer','notification.sender','=','writer.user_id')->orderBy('notification.id','desc')->select('*','notification.created_on as created_on')->get();
        foreach ($data as $key => $value) {
            $c =  Carbon::parse($value->created_on);
            $value->created_on  = $c->toDayDateTimeString();
        }
        $dataMonth = DB::table('notification')->where('reciver',$id)->whereMonth('notification.created_on',$current->month)->whereDate('notification.created_on','<',$current->toDateString())->join('writer','notification.sender','=','writer.user_id')->orderBy('notification.id','desc')->select('*','notification.created_on as created_on')->get();
        foreach ($dataMonth as $key => $value) {
            $c =  Carbon::parse($value->created_on);
            $value->created_on  = $c->toDayDateTimeString();
        }
        $current->day = 1;
        $dataRemains = DB::table('notification')->where('reciver',$id)->whereDate('notification.created_on','<',$current->toDateString())->join('writer','notification.sender','=','writer.user_id')->orderBy('notification.id','desc')->select('*','notification.created_on as created_on')->get();
        foreach ($dataRemains as $key => $value) {
            $c =  Carbon::parse($value->created_on);
            $value->created_on  = $c->toDayDateTimeString();
        }
        return view('dashboard.student.notification',['data' => $data,'dataMonth' => $dataMonth,'dataRemains' => $dataRemains]);
    }
    public function writerView()
    { 
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $current = Carbon::now();
        $data = DB::table('notification')->where('reciver',$id)->whereDate('notification.created_on',$current->toDateString())->join('student','notification.sender','=','student.user_id')->orderBy('notification.id','desc')->select('*','notification.created_on as created_on')->get();
        foreach ($data as $key => $value) {
            $c =  Carbon::parse($value->created_on);
            $value->created_on  = $c->toDayDateTimeString();
        }
        $dataMonth = DB::table('notification')->where('reciver',$id)->whereMonth('notification.created_on',$current->month)->whereDate('notification.created_on','<',$current->toDateString())->join('student','notification.sender','=','student.user_id')->orderBy('notification.id','desc')->select('*','notification.created_on as created_on')->get();
        foreach ($dataMonth as $key => $value) {
            $c =  Carbon::parse($value->created_on);
            $value->created_on  = $c->toDayDateTimeString();
        }
        $current->day = 1;
        $dataRemains = DB::table('notification')->where('reciver',$id)->whereDate('notification.created_on','<',$current->toDateString())->join('student','notification.sender','=','student.user_id')->orderBy('notification.id','desc')->select('*','notification.created_on as created_on')->get();
        foreach ($dataRemains as $key => $value) {
            $c =  Carbon::parse($value->created_on);
            $value->created_on  = $c->toDayDateTimeString();
        }
        return view('dashboard.writer.notification',['data' => $data,'dataMonth' => $dataMonth,'dataRemains' => $dataRemains]);
    }
    function getNotification(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('notification')->where('reciver',$id)->join('writer','notification.sender','=','writer.user_id')->orderBy('notification.id','desc')->take(10)->get();
        return response()->json($data);
    }
    function getNotificationSingle(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('notification')->where('notification.status','0')->where('notification.reciver',$id)->join('writer','notification.sender','=','writer.user_id')->select('*','notification.id as id')->first();
        //DB::table('notification')->where('id',$data->id)->update(['status' => '1']);
        if ($data == '') {
            return response()->json('error');
        } else {
            return response()->json($data);
        }
    }
    function updateNotificationSingle($id){
        DB::table('notification')->where('id',$id)->update(['status' => '1']);
    }
    function getWriterNotification(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('notification')->where('reciver',$id)->join('student','notification.sender','=','student.user_id')->orderBy('notification.id','desc')->take(10)->get();
        return response()->json($data);
    }
    function getWriterNotificationSingle(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('notification')->where('notification.status','0')->where('notification.reciver',$id)->join('student','notification.sender','=','student.user_id')->select('*','notification.id as id')->first();
        //DB::table('notification')->where('id',$data->id)->update(['status' => '1']);
        if ($data == '') {
            return response()->json('error');
        } else {
            return response()->json($data);
        }
    }
    function updateWriterNotificationSingle($id){
        DB::table('notification')->where('id',$id)->update(['status' => '1']);
    }
    
}
