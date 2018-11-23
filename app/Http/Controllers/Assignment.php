<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Assignment extends Controller
{
    function checkStatus()
    {
        $status = DB::table('order')->where('status','0')->get();
        if ($status->count() > 0) {
            foreach ($status as $key => $value) {
                $c =  Carbon::parse($value->created_on);
                $expire =  $c->addHours(2);
                $current = Carbon::now();
                if(strtotime($current) > strtotime($expire))
                {
                    DB::table('order')->where('id',$value->id)->delete();
                    $assignment = DB::table('assignment')->where('id',$value->assignment_id)->first();
                    $writer = DB::table('writer')->where('user_id',$value->writer_id)->first();
                    DB::table('notification')->insert(['sender' => $value->writer_id, 'reciver' =>$value->student_id,'notification' => 'Your request to the writer '.$writer->name.' about the  assignment '.$assignment->topic.' has been Time Out']);
                    DB::table('notification')->insert(['reciver' => $value->writer_id, 'sender' =>$value->student_id,'notification' => 'Your time to approved the '.$assignment->topic.' has been Time Out']);
                }
            }
        }

        $progress = DB::table('order')->where('status','1')->get();
        if ($progress->count() > 0) {
            foreach ($progress as $key => $value) {
                $progressAssignment = DB::table('assignment')->where('id',$value->assignment_id)->first();
                $expire =  Carbon::parse($progressAssignment->deadline);
                $current = Carbon::now();
                if(strtotime($current) > strtotime($expire))
                {
                    DB::table('order')->where('id',$value->id)->update(['status' => '2','revision_time' => $current]);
                    DB::table('assignment')->where('id',$value->assignment_id)->update(['status' => '2']);
                    DB::table('notification')->insert(['sender' => $value->writer_id, 'reciver' =>$value->student_id,'notification' => 'Your assignment '.$progressAssignment->topic.' has been Passed the deadline & set to Warranty']);
                    DB::table('notification')->insert(['reciver' => $value->writer_id, 'sender' =>$value->student_id,'notification' => 'Your Order '.$progressAssignment->topic.' has been Passed the deadline & set to Revision']);
                }
            }
        }

        // $revision = DB::table('order')->where('status','2')->get();
        // if ($revision->count() > 0) {
        //     foreach ($revision as $key => $value) {
        //         $c =  Carbon::parse($value->revision_time);
        //         $expire =  $c->addHours(2);
        //         $current = Carbon::now();
        //         if(strtotime($current) > strtotime($expire))
        //         {
        //             $progressAssignment = DB::table('assignment')->where('id',$value->assignment_id)->first();
        //             DB::table('order')->where('id',$value->id)->update(['status' => '3']);
        //             DB::table('assignment')->where('id',$value->assignment_id)->update(['status' => '3']);
        //             DB::table('payment')->where('order_id',$value->id)->delete();
        //             DB::table('notification')->insert(['sender' => $value->writer_id, 'reciver' =>$value->student_id,'notification' => 'Your assignment '.$progressAssignment->topic.' has been Passed the Warranty time & set to Auctin Again']);
        //             DB::table('notification')->insert(['reciver' => $value->writer_id, 'sender' =>$value->student_id,'notification' => 'Your Order '.$progressAssignment->topic.' has been Passed the Revision time  & set to Refunded']);
        //        }
        //     }
        // }
    }
    function get(){
        self::checkStatus();
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $data = DB::table('assignment')->where('user_id',$id)->orderBy('created_on','desc')->simplePaginate(5);
        foreach ($data as $key => $value) {
            $c = Carbon::parse($value->deadline);
            $value->deadline = $c->setTimezone($timezone)->toDayDateTimeString();

            $cre = Carbon::parse($value->created_on);
            $value->created_on = $cre->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function getMyAll(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('assignment')->where('user_id',$id)->get();
        return response()->json($data);
    }
    function getAll(){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $data = DB::table('assignment')->where('status','0')->orderBy('created_on','desc')->simplePaginate(5);
        foreach ($data as $key => $value) {
            $value->deadline = Carbon::parse($value->deadline)->setTimezone($timezone)->toDayDateTimeString();
            $value->created_on = Carbon::parse($value->created_on)->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function all(){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $data = DB::table('assignment')->where('status','0')->orderBy('created_on','desc')->simplePaginate();
        foreach ($data as $key => $value) {
            $value->deadline = Carbon::parse($value->deadline)->setTimezone($timezone)->toDayDateTimeString();
            $value->created_on = Carbon::parse($value->created_on)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function getSingle($id){
        self::checkStatus();
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $data = DB::table('assignment')->where('assignment.id',$id)->join('student','assignment.user_id','=','student.user_id')
        ->select('*','assignment.id as id', 'assignment.created_on as created_on','assignment.status as status')
        ->get();
        $c =  Carbon::parse($data[0]->created_on);
        $data[0]->created_on  = $c->setTimezone($timezone)->toDayDateTimeString();
        $data[0]->rawdeadline =  Carbon::parse($data[0]->deadline)->setTimezone($timezone)->toDateTimeString();
        $data[0]->deadline =  Carbon::parse($data[0]->deadline)->setTimezone($timezone)->toDayDateTimeString();
        return response()->json($data);
    }
    function getAuctionAll(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('assignment')->where('user_id',$id)->where('status','0')->get();
        return response()->json($data);
    }
    function getAuction(){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('assignment')->where('user_id',$id)->where('status','0')->simplePaginate(5);
        foreach ($data as $key => $value) {
            $value->deadline = Carbon::parse($value->deadline)->setTimezone($timezone)->toDayDateTimeString();
            $value->created_on = Carbon::parse($value->created_on)->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function getProgress(){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('assignment')->where('user_id',$id)->where('status','1')->simplePaginate(5);
        foreach ($data as $key => $value) {
            $value->deadline = Carbon::parse($value->deadline)->setTimezone($timezone)->toDayDateTimeString();
            $value->created_on = Carbon::parse($value->created_on)->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function getWarranty(){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('assignment')->where('user_id',$id)->where('status','2')->simplePaginate(5);
        foreach ($data as $key => $value) {
            $value->deadline = Carbon::parse($value->deadline)->setTimezone($timezone)->toDayDateTimeString();
            $value->created_on = Carbon::parse($value->created_on)->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function getCompeleted(){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('assignment')->where('user_id',$id)->where('status','3')->simplePaginate(5);
        foreach ($data as $key => $value) {
            $value->deadline = Carbon::parse($value->deadline)->setTimezone($timezone)->toDayDateTimeString();
            $value->created_on = Carbon::parse($value->created_on)->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }

    function getCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('assignment')->where('user_id',$id)->count();
        return response()->json($count);
    }
    function getAuctionCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('assignment')->where('user_id',$id)->where('status','0')->count();
        return response()->json($count);
    }
    function getProgressCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('assignment')->where('user_id',$id)->where('status','1')->count();
        return response()->json($count);
    }
    function getWarrantyCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('assignment')->where('user_id',$id)->where('status','2')->count();
        return response()->json($count);
    }
    function getCompeletedCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('assignment')->where('user_id',$id)->where('status','3')->count();
        return response()->json($count);
    }
    
    public function add()
    {
        self::checkStatus();
        $_POST['token'] = $_POST['_token'];
        print_r( $_POST);
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        DB::table('assignment')->insert(
             ['topic' => $_POST['topic'],'type_id' => $_POST['type_id'],'subject_id' => $_POST['subject_id'],'student_id' => $id,'detail' => $_POST['detail'],'page' => $_POST['page'],'word' => $_POST['word'],'service' => $_POST['service'],'academic' => $_POST['academic'],'format_id' => $_POST['format_id'],'deadline' => $deadline,'price' => $_POST['price']]);
    }
    public function update($id)
    {
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if ($timezone) {
            $deadline = new Carbon($_POST['deadline'],$timezone);
            $deadline = $deadline->setTimezone('UTC');
        }
        else {
            $deadline = $_POST['deadline'];
        }
        DB::table('assignment')->where('id',$id)->update(
             ['topic' => $_POST['topic'],'type_id' => $_POST['type_id'],'subject_id' => $_POST['subject_id'],'detail' => $_POST['detail'],'page' => $_POST['page'],'word' => $_POST['word'],'service' => $_POST['service'],'academic' => $_POST['academic'],'format_id' => $_POST['format_id'],'deadline' => $deadline,'price' => $_POST['price']]);
    }
    function getType($id){
        $data = DB::table('paper_type')->where('id',$id)->get();
        return response()->json($data);
    }
    function getSubject($id){
        $data = DB::table('sub_subject')->where('sub_subject.id',$id)->join('subject','subject.id','=','sub_subject.subject_id')->select('*','sub_subject.name as subjectName')->get();
        return response()->json($data);
    }
    function getFormat($id){
        $data = DB::table('assignment_format')->where('id',$id)->get();
        return response()->json($data);
    }
    function getStudent($id){
        $data = DB::table('student')->where('id',$id)->get();
        return response()->json($data);
    }
    function getTypeAll(){
        $data = DB::table('paper_type')->get();
        return response()->json($data);
    }
    function getSubjectAll(){
        $data = DB::table('subject')->get();
        return response()->json($data);
    }
    function getSubSubjectAll(){
        $data = DB::table('sub_subject')->get();
        return response()->json($data);
    }
    function getFormatAll(){
        return DB::table('assignment_format')->get();
    }

    function getBid($id){
        $data = DB::table('assignment_bid')->where('assignment_id',$id)->where('assignment_bid.status','1')
        ->join('writer','assignment_bid.user_id','=','writer.user_id')
        ->select('*','assignment_bid.id as id','assignment_bid.created_on as created_on')->get();
        return response()->json($data);
    }
    function getBidCount($id){
        $count = DB::table('assignment_bid')->where('assignment_id',$id)->where('status','1')->count();
        return response()->json($count);
    }
    function rejectBid($id)
    {
        DB::table('assignment_bid')->where('id',$id)->update(['status' => '0']);
    }
    public function compeleted($id)
    {
        DB::table('assignment')->where('id',$id)->update(['status' => '3']);
        DB::table('order')->where('assignment_id',$id)->where('status','!=','3')->update(['status' => '4']);
        DB::table('payment')->where('assignment_id',$id)->update(['status' => '1']);
        
    }
    function search($name){
        $data = DB::table('assignment')->where('status','0')->where('topic','LIKE','%'.$name.'%')->simplePaginate(5);
        return response()->json($data);
    }
    function searchId($name){
        $data = DB::table('assignment')->where('status','0')->where('id','LIKE','%'.$name.'%')->simplePaginate(5);
        return response()->json($data);
    }
}
