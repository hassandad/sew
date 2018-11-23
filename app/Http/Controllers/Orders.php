<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class Orders extends Controller
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
        //             DB::table('assignment')->where('id',$value->assignment_id)->update(['status' => '0']);
        //             DB::table('payment')->where('order_id',$value->id)->delete();
        //             DB::table('order_file')->where('order_id',$value->id)->update(['flag' => '1','status' => '1']);
        //             DB::table('notification')->insert(['sender' => $value->writer_id, 'reciver' =>$value->student_id,'notification' => 'Your assignment '.$progressAssignment->topic.' has been Passed the Warranty time & set to Auctin Again']);
        //             DB::table('notification')->insert(['reciver' => $value->writer_id, 'sender' =>$value->student_id,'notification' => 'Your Order '.$progressAssignment->topic.' has been Passed the Revision time  & set to Refunded']);
        //        }
        //     }
        // }
    }
    function get(){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('order')->where('writer_id',$id)->join('assignment','order.assignment_id','=','assignment.id')->select('*','order.created_on as created_on', 'order.status as status', 'order.price as price', 'order.id as id')->simplePaginate(5);
        self::checkStatus();
        foreach ($data as $key => $value) {
            $value->deadline = Carbon::parse($value->deadline)->setTimezone($timezone)->toDayDateTimeString();
            $value->created_on = Carbon::parse($value->created_on)->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function getMyAll(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('order')->where('writer_id',$id)->join('assignment','order.assignment_id','=','assignment.id')->select('*','order.created_on as created_on', 'order.status as status', 'order.price as price', 'order.id as id')->get();
        return response()->json($data);
    }
    function getCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('order')->where('writer_id',$id)->count();
        return response()->json($count);
    }
    function getAllOrders(){
        self::checkStatus();
        $data = DB::table('orders')->select('*','orders.id as orderId','order_types.id as typeId','order_types.type as typeName')
                                   ->join('order_types','orders.type','=','order_types.id')
                                    ->simplePaginate(5);
        return response()->json($data);
    }
    function single($id){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $data = DB::table('order')->where('order.id',$id)
        ->join('assignment','order.assignment_id','=','assignment.id')
        ->join('student','assignment.user_id','=','student.user_id')
        ->select('*','order.created_on as created_on','order.status as status', 'order.price as price', 'order.id as id','assignment.created_on as a_created_on')
        ->get();
           $newdate =  Carbon::parse($data[0]->deadline)->setTimezone($timezone);
           $data[0]->deadline = $newdate->toDayDateTimeString();
           $data[0]->created_on =  Carbon::parse($data[0]->created_on)->setTimezone($timezone)->toDayDateTimeString();
           $today = Carbon::now();
           if ($data[0]->status == '2') {
                $newdate =  Carbon::parse($data[0]->revision_time);
                $newdate = $newdate->addHours(2);
                $newww = $today->diff($newdate);
                $data[0]->country = $newww->h.' hours '.$newww->i.' mins ' ;
           } else {
                $newww = $today->diff($newdate);
                $data[0]->country = $newww->d.' Days '.$newww->h.' hours '.$newww->i.' mins ' ;
           }
            self::checkStatus();
            return response()->json($data);
    }
    function placeBid(){
        $_POST['user_id'] =  \Illuminate\Support\Facades\Session::get('user')->id;
        if ($_POST['file']) {
            $string = $_POST['file'];
            $new_data=explode(";",$string);
            $type=$new_data[0];
            $data=explode(",",$new_data[1]);
            header("Content-type:".$type);
            $codeBase = base64_decode($data[1]);
            $image = $_POST['imageName'];
            $file = file_put_contents("file/".$image,$codeBase);
            $_POST['file'] = $image;
        }
        

        $id = DB::table('assignment_bid')->insertGetId(['assignment_id' => $_POST['assignment_id'],'file' => $_POST['file'],'type' => $_POST['type'],'message' => $_POST['message'],'amount' => $_POST['amount'],'user_id' => $_POST['user_id']]);
        $data = DB::table('assignment_bid')->select('assignment_bid.*','assignment_bid.id as bidId','users.id as userId','users.username')
            ->where('assignment_bid.id',$id)
            ->join('users','assignment_bid.user_id','=','users.id')->first();
        $count = DB::table('assignment_bid')->count();
        if ($_POST['amount'] == '0') {
            $_POST['amount'] = 'Negatiable';
        }
        $assignment = DB::table('assignment')->where('id',$_POST['assignment_id'])->first();
        $name = \Illuminate\Support\Facades\Session::get('user')->username;
        $i = \Illuminate\Support\Facades\Session::get('user')->id;
        DB::table('notification')->insert(['sender' => $i, 'reciver' => $assignment->user_id,'notification' => $name.' has bid on your assignment '.$assignment->topic.' of price '.$_POST['amount']]);
       return response()->json(['success' => 'ok', 'msg' => 'Your Bid has been added','data' => $data, 'count' => $count]);

    }
    function deleteBid($id)
    {
        DB::table('assignment_bid')->where('id',$id)->delete();
        return response()->json(['success' => 'ok', 'msg' => 'Your Bid has been added','data']);        
    }
    function updateBid(){

        if ($_POST['image']) {
            $string = $_POST['image'];
            $new_data=explode(";",$string);
            $type=$new_data[0];
            $data=explode(",",$new_data[1]);
            header("Content-type:".$type);
            $codeBase = base64_decode($data[1]);
            $image = $_POST['imageName'];
            $file = file_put_contents("file/".$image,$codeBase);
            DB::table('assignment_bid')->where('id',$_POST['assignment_id'])->update(['file' => $image]);
            
        }
                if ($_POST['amount'] > 0) {
                    $_POST['type'] = '2';
                } else {
                    $_POST['type'] = '1';
                }
                
                DB::table('assignment_bid')->where('id',$_POST['assignment_id'])->update(['type' => $_POST['type'], 'message' => $_POST['message'], 'amount' => $_POST['amount']]);
                $data = DB::table('assignment_bid')->select('assignment_bid.*','assignment_bid.id as bidId','users.id as userId','users.username')
                    ->where('assignment_bid.id',$_POST['assignment_id'])
                    ->join('users','assignment_bid.user_id','=','users.id')->first();
                $count = DB::table('assignment_bid')->count();
                $assignment = DB::table('assignment')->where('id',$data->assignment_id)->first();
                $name = \Illuminate\Support\Facades\Session::get('user')->username;
                $i = \Illuminate\Support\Facades\Session::get('user')->id;
                DB::table('notification')->insert(['sender' => $i, 'reciver' => $assignment->user_id,'notification' => $name.' has change his bid on your assignment '.$assignment->topic.' of price '.$_POST['amount']]);
                
               return response()->json(['success' => 'ok', 'msg' => 'Your Bid has been Updated','data' => $data, 'count' => $count]);
        
            }
    function getBids($id){
        self::checkStatus();
        $data = DB::table('bids')->select('bids.*','bids.id as bidId','users.id as userId','users.username')
                ->where('bids.order_id',$id)
                ->join('users','bids.user_id','=','users.id')
                ->orderBy('bids.id','desc')
                ->get();
        return response()->json($data);
    }
    function bidCount($id){
        $data = DB::table('bids')->where('order_id',$id)->count();
        return $data;
    }
    function addReview($type,$bidId,$userId){
        $check = DB::table('bid_review')->where('user_id',$userId)->where('bid_id',$bidId);
        if($type == 1):
            if($check->count() > 0):
                if($check->first()->positive == 1):
                   self::deleteReview($userId,$bidId);
                elseif ($check->first()->negative == 1):
                   self::addPositive($userId,$bidId);
                endif;
            else:
                self::insertReview($userId,$bidId,$type);
            endif;
        elseif($type == 2):
            if($check->count() > 0):
                if($check->first()->positive == 1):
                   self::addNegative($userId,$bidId);
                elseif ($check->first()->negative == 1):
                    self::deleteReview($userId,$bidId);
                endif;
            else:
                self::insertReview($userId,$bidId,$type);
            endif;
        endif;
        $negative = $check->where('negative', 1)->count();
        $positive = $check->where('positive', 1)->count();
        return response()->json(['positive' => $positive, 'negative' => $negative]);
    }
    function addNegative($userId,$bidId){
        DB::table('bid_review')->where('user_id',$userId)->where('bid_id',$bidId)->update(['negative' => 1, 'positive' => NULL]);
    }
    function addPositive($userId,$bidId){
        DB::table('bid_review')->where('user_id',$userId)->where('bid_id',$bidId)->update(['negative' => Null, 'positive' => 1]);
    }
    function insertReview($userId,$bidId,$type){
        if($type == 1):
        DB::table('bid_review')->insert(['user_id' => $userId, 'bid_id' => $bidId, 'positive' => 1]);
        elseif($type == 2):
            DB::table('bid_review')->insert(['user_id' => $userId, 'bid_id' => $bidId, 'negative' => 1]);
        endif;
    }
    function deleteReview($userId,$bidId){
        DB::table('bid_review')->where('user_id',$userId)->where('bid_id',$bidId)->delete();
    }
    function getBidCount($id){
        $data = DB::table('bid_review')->where('bid_id',$id);
        $data1 = DB::table('bid_review')->where('bid_id',$id);
        $negative = $data->where('negative', 1)->count();
        $positive = $data1->where('positive', 1)->count();
        $total  = ['negative' => $negative,'positive' => $positive];
        return response()->json($total);
    }
    function getBidDetails($id){
        $data = DB::table('bids')->where('id',$id)->first();
        return response()->json($data);
    }
    function bidComment(){
       $id = DB::table('bid_comments')->insertGetId($_POST);
       $data = DB::table('bid_comments')->select('bid_comments.*','bid_comments.id as commentId','users.id as userId','users.username as username')
                                        ->join('users','bid_comments.user_id','=','users.id')
                                        ->where('bid_comments.id',$id)
                                        ->first();
       return response()->json($data);
    }
    function getBidComments($id){
        $data = DB::table('bid_comments')->select('bid_comments.*','bid_comments.id as commentId','users.id as userId','users.username as username')
            ->join('users','bid_comments.user_id','=','users.id')
            ->where('bid_comments.bid_id',$id)
            ->get();
        return response()->json($data);
    }
    function checkIfBidExists($user,$order){
     $data = DB::table('assignment_bid')->where('user_id',$user)->where('status','1')->where('assignment_id',$order)->get();
     return response()->json($data);
    }
    function getBidCommentsCount($id){
     $count = DB::table('bid_comments')->where('bid_id',$id)->count();
     return response()->json($count);
    }
    function getLatestBidComments($id){
     $count = DB::table('bid_comments')->select('bid_comments.*','bid_comments.id as commentId','users.id as userId','users.username as username')
            ->join('users','bid_comments.user_id','=','users.id')
            ->where('bid_comments.bid_id',$id)->orderBy('id','desc')->first();
     return response()->json($count);
    }
    public function add()
    {
        self::checkStatus();
        $_POST['token'] = $_POST['_token'];
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;

        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if ($timezone) {
            $deadline = new Carbon($_POST['deadline'],$timezone);
            $deadline = $deadline->setTimezone('UTC');
        }
        else {
            $deadline = $_POST['deadline'];
        }
        if ($_POST['file']) {
                
            $string = $_POST['file'];
            $new_data=explode(";",$string);
            $type=$new_data[0];
            $data=explode(",",$new_data[1]);
            header("Content-type:".$type);
            $codeBase = base64_decode($data[1]);
            $image = $_POST['fileName'];
            $file = file_put_contents("file/".$image,$codeBase);
            
        
       // print_r( $_POST);
        DB::table('assignment')->insert(
             ['topic' => $_POST['topic'],'file' => $_POST['fileName'],'type_id' => $_POST['type_id'],'subject_id' => $_POST['subject_id'],'user_id' => $id,'detail' => $_POST['detail'],'page' => $_POST['page'],'word' => $_POST['word'],'service' => $_POST['service'],'academic' => $_POST['academic'],'format_id' => $_POST['format_id'],'deadline' => $deadline,'price' => $_POST['price'],'created_on' => Carbon::now()]);
    
        } else {
            
        
       // print_r( $_POST);
        DB::table('assignment')->insert(
             ['topic' => $_POST['topic'],'type_id' => $_POST['type_id'],'subject_id' => $_POST['subject_id'],'user_id' => $id,'detail' => $_POST['detail'],'page' => $_POST['page'],'word' => $_POST['word'],'service' => $_POST['service'],'academic' => $_POST['academic'],'format_id' => $_POST['format_id'],'deadline' => $deadline,'price' => $_POST['price'],'created_on' => Carbon::now()]);
    
        }
    }
    function getApproval(){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('order')->where('writer_id',$id)->where('order.status','0')->join('assignment','order.assignment_id','=','assignment.id')->select('*','order.created_on as created_on','order.status as status', 'order.price as price', 'order.id as id')->simplePaginate(5);
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
        $data = DB::table('order')->where('writer_id',$id)->where('order.status','1')->join('assignment','order.assignment_id','=','assignment.id')->select('*','order.created_on as created_on','order.status as status', 'order.price as price', 'order.id as id')->simplePaginate(5);
        foreach ($data as $key => $value) {
            $value->deadline = Carbon::parse($value->deadline)->setTimezone($timezone)->toDayDateTimeString();
            $value->created_on = Carbon::parse($value->created_on)->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function getRevision(){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('order')->where('writer_id',$id)->where('order.status','2')->join('assignment','order.assignment_id','=','assignment.id')->select('*','order.created_on as created_on','order.status as status', 'order.price as price', 'order.id as id')->simplePaginate(5);
        foreach ($data as $key => $value) {
            $value->deadline = Carbon::parse($value->deadline)->setTimezone($timezone)->toDayDateTimeString();
            $value->created_on = Carbon::parse($value->created_on)->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function getRefunded(){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('order')->where('writer_id',$id)->where('order.status','3')->join('assignment','order.assignment_id','=','assignment.id')->select('*','order.created_on as created_on','order.status as status', 'order.price as price', 'order.id as id')->simplePaginate(5);
        foreach ($data as $key => $value) {
            $value->deadline = Carbon::parse($value->deadline)->setTimezone($timezone)->toDayDateTimeString();
            $value->created_on = Carbon::parse($value->created_on)->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function getFinish(){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('order')->where('writer_id',$id)->where('order.status','4')->join('assignment','order.assignment_id','=','assignment.id')->select('*','order.created_on as created_on','order.status as status', 'order.price as price', 'order.id as id')->simplePaginate(5);
        foreach ($data as $key => $value) {
            $value->deadline = Carbon::parse($value->deadline)->setTimezone($timezone)->toDayDateTimeString();
            $value->created_on = Carbon::parse($value->created_on)->setTimezone($timezone)->toDayDateTimeString();
        }
        return response()->json($data);
    }
    function getApprovalCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('order')->where('writer_id',$id)->where('order.status','0')->count();
        return response()->json($count);
    }
    function getProgressCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('order')->where('writer_id',$id)->where('order.status','1')->count();
        return response()->json($count);
    }
    function getRevisionCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('order')->where('writer_id',$id)->where('order.status','2')->count();
        return response()->json($count);
    }
    function getRefundedCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('order')->where('writer_id',$id)->where('order.status','3')->count();
        return response()->json($count);
    }
    function getFinishCount(){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $count = DB::table('order')->where('writer_id',$id)->where('order.status','4')->count();
        return response()->json($count);
    }
    public function orderAdd($wid,$aid,$price)
    {
        self::checkStatus();
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        DB::table('order')->insert(
             ['assignment_id' => $aid,'writer_id' => $wid,'student_id' => $id,'price' => $price,'created_on' => Carbon::now()]);

             $assignment = DB::table('assignment')->where('id',$aid)->first();
             $name = \Illuminate\Support\Facades\Session::get('user')->username;
             DB::table('notification')->insert(['sender' => $id, 'reciver' => $wid,'notification' => $name.' want to hire you for assignment '.$assignment->topic.' of price '.$price]);
    }
    function getSingle($aid){
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        self::checkStatus();
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('order')->where('assignment_id',$aid)->where('student_id',$id)->where('status','!=','3')->join('users','order.writer_id','=','users.id')->select('*','order.id as oid')->get();
        $assignment = DB::table('assignment')->where('id',$aid)->get();
        $c =  Carbon::parse($data[0]->created_on);
        if ($data[0]->status == '2') {
            $r =  Carbon::parse($data[0]->revision_time);
            $today = Carbon::now();
            $r = $r->addHours(2);
            $newww = $today->diff($r);
            $data[0]->price = $newww->h.' hour '.$newww->i.' min';
        } else {
            $today = Carbon::now();
            $newdate = Carbon::parse($assignment[0]->deadline);
            $newww = $today->diff($newdate);
            $data[0]->price = $newww->d.' Days '.$newww->h.' hours '.$newww->i.' min' ;
        }
         $data[0]->created_on  = $c->setTimezone($timezone)->toDayDateTimeString();
        // $assignment = DB::table('assignment')->where('id',$aid)->first();
        // $a = $c->addDays($assignment->deadline);
        // $data[0]->password  = $a->toDayDateTimeString();
        return response()->json($data);
    }
    public function accept($oid,$aid)
    {
        $current_time = Carbon::now()->toDateTimeString();
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('order')->where('id',$oid)->first();
        DB::table('order')->where('id',$oid)->update(['status' => '1','created_on' => $current_time]);
         $assignment = DB::table('assignment')->where('id',$aid)->first();
             $name = \Illuminate\Support\Facades\Session::get('user')->username;
             DB::table('notification')->insert(['sender' => $id, 'reciver' => $assignment->user_id,'notification' => $name.' accepted your approval for assignment '.$assignment->topic]);
            
             $bid = DB::table('assignment_bid')->where('assignment_id',$aid)->where('status','1')->get();
             if ($bid->count() > 0) {
                 foreach ($bid as $key => $value) {
                     if ($value->user_id == $id) {
                         
                     } else {
                        DB::table('notification')->insert(['sender' => $assignment->user_id, 'reciver' => $value->user_id,'notification' => ' Your bid for assignment '.$assignment->topic.' has been expired because the assignemnt has been ordered ']);
                     }
                     
                    }
             }
             $no = DB::table('payment')->orderBy('id','desc')->first();
             if ($no) {
                 $payment_no = $no->no+1;
             } else {
                 $payment_no = 100000001;
             }
        DB::table('payment')->insert(['no' => $payment_no,'order_id' => $oid,'assignment_id' => $aid,'user_id' => $data->writer_id,'price' => $data->price]);
        DB::table('assignment')->where('id',$aid)->update(['status' => '1','price' => $data->price]);
    }
    public function reject($oid,$aid)
    { 
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        DB::table('order')->where('id',$oid)->delete();
         $assignment = DB::table('assignment')->where('id',$aid)->first();
             $name = \Illuminate\Support\Facades\Session::get('user')->username;
             DB::table('notification')->insert(['sender' => $id, 'reciver' => $assignment->user_id,'notification' => $name.' rejected your approval for assignment '.$assignment->topic]);
            
            DB::table('assignment_bid')->where('assignment_id',$aid)->where('status','1')->where('user_id',$id)->delete();
    }
    public function acceptNotification($oid,$aid)
    {
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
     //   DB::table('order')->where('id',$oid)->update(['status' => '1']);
        $order = DB::table('order')->where('id',$oid)->first();
         $assignment = DB::table('assignment')->where('id',$aid)->first();
              $name = \Illuminate\Support\Facades\Session::get('user')->username;
        //      DB::table('notification')->insert(['sender' => $id, 'reciver' => $assignment->user_id,'notification' => $name.' accepted your approval for assignment '.$assignment->topic]);
            
             $bid = DB::table('assignment_bid')->where('assignment_id',$aid)->where('status','1')->get();
             if ($bid->count() > 0) {
                DB::table('assignment_bid')->where('assignment_id',$aid)->update(['status' => '0']);
                 foreach ($bid as $key => $value) {
                     if ($value->user_id == $id) {
                         
                     } else {
                        // $user = ['email' => 'sheheryarghaznavi@yahoo.com', 'notify' => 'Hello  your bid for assignment '.$assignment->topic.' has been expired'];
                        
                        //         Mail::send('email.notification', $user,function($message) use ($user){
                        //             $message->to($user['email']);
                        //             $message->subject('Bid Rejected');
                        //          });    
                    }
                     
                    }
             }

      $data = DB::table('users')->where('id',$id)->first();
      
        $user = ['email' => $data->email, 'notify' => 'Hello '.$name.' you have been successfully hired for assignment '.$assignment->topic.' in price $'.$order->price];
        
                Mail::send('email.notification', $user,function($message) use ($user){
                    $message->to($user['email']);
                    $message->subject('Successfull Hired');
                 });
    }
    public function sendFile()
    {
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
            $string = $_POST['file'];
            $new_data=explode(";",$string);
            $type=$new_data[0];
            $data=explode(",",$new_data[1]);
            header("Content-type:".$type);
            $codeBase = base64_decode($data[1]);
            $image = $_POST['fileName'];
            $file = file_put_contents("file/".$image,$codeBase);
            $_POST['file'] = $image;
            
        $order = DB::table('order')->where('id',$_POST['order_id'])->first();
        DB::table('order_file')->insert(['file' => $_POST['file'],'title' => $_POST['title'],'type' => $_POST['type'], 'order_id' => $_POST['order_id'], 'sender' => $_POST['sender']]);
        
        if ($id == $order->writer_id) {
            $writer = DB::table('writer')->where('user_id',$id)->first();
            DB::table('notification')->insert(['sender' => $_POST['sender'], 'reciver' => $order->student_id,'notification' => ' Writer '.$writer->name.' Has Uploaded a File']);
        } else {
            $student = DB::table('student')->where('user_id',$id)->first();
            DB::table('notification')->insert(['sender' => $_POST['sender'], 'reciver' =>  $order->writer_id,'notification' => ' Student '.$student->name.' Has Uploaded a File']);
        }
        
        return response()->json(['success' => 'ok']);
        
    }
    public function getFile($id)
    {
        $timezone =  \Illuminate\Support\Facades\Session::get('timezone');
        if (!$timezone) {
            $timezone = 'UTC';
        }
        $data =  DB::table('order_file')->where('order_id',$id)->join('users','order_file.sender','=','users.id')->select('*','order_file.id as id')->get();
        foreach ($data as $key => $value) {
            $c =  Carbon::parse($value->created_on)->setTimezone($timezone);
            $data[$key]->created_on = $c->toDayDateTimeString();
        }
        
        return response()->json($data);
        
    }
    public function sendRevisionFile()
    {   $data = DB::table('order_file')->where('id',$_POST['file'])->first();
        DB::table('order_file')->insert(['file' => $data->file,'title' => $_POST['title'], 'order_id' => $_POST['order_id'],'status' => '1', 'sender' => $_POST['sender']]);
        DB::table('notification')->insert(['sender' => $_POST['sender'], 'reciver' => $data->sender,'notification' => ' Your File '.$data->file.' has been sent to revision']);
        return response()->json(['success' => 'ok']);
        
    }
    public function sendCorrectionFile()
    {   
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $string = $_POST['file'];
        $new_data=explode(";",$string);
        $type=$new_data[0];
        $data=explode(",",$new_data[1]);
        header("Content-type:".$type);
        $codeBase = base64_decode($data[1]);
        $image = $_POST['fileName'];
        $file = file_put_contents("file/".$image,$codeBase);
        $_POST['file'] = $image;

        $data = DB::table('order_file')->where('id',$_POST['id'])->first();
        DB::table('order_file')->where('id',$_POST['id'])->update(['flag' => '1']);
        DB::table('order_file')->insert(['file' => $image,'title' => $_POST['title'], 'order_id' => $_POST['order_id'],'status' => '1','flag' => '1', 'sender' => $_POST['sender'],'type' => 'COMPELETED PAPER']);
        DB::table('notification')->insert(['sender' => $_POST['sender'], 'reciver' => $data->sender,'notification' => ' The File '.$data->file.' that you out under revision has been Corrected']);
        return response()->json(['success' => 'ok']);
    }
    public function refuseCorrection($id)
    { 
        DB::table('order')->where('id',$id)->update(['status' => '3']);
        $data = DB::table('order')->where('id',$id)->first();
        $assignment = DB::table('assignment')->where('id',$data->assignment_id)->first();
        DB::table('assignment')->where('id',$data->assignment_id)->update(['status' => '0']);
        DB::table('notification')->insert(['sender' => $data->writer_id, 'reciver' =>$data->student_id,'notification' => 'Your assignment '.$assignment->topic.' has been  set to Auctin Again']);
        DB::table('notification')->insert(['reciver' => $data->writer_id, 'sender' =>$data->student_id,'notification' => 'Your Order '.$assignment->topic.' has been set to Refunded']);
        DB::table('order_file')->where('order_id',$id)->update(['flag' => '1','status' => '1']);
        return response()->json(['success' => 'ok']);
    }
    function checkHire($wid,$aid)
    {
        $count = DB::table('order')->where('status','0')->where('writer_id',$wid)->where('assignment_id',$aid)->count();
        if ($count > 0) {
            return response()->json('error'); 
        } else {
            return response()->json('success'); 
        }  
    }
    function checkAuction($aid)
    {
        $count = DB::table('assignment')->where('id',$aid)->where('status','0')->count();
        if ($count > 0) {
            return response()->json('success'); 
        } else {
            return response()->json('error'); 
        }  
    }
    function checkApproval($aid){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('order')->where('assignment_id',$aid)->where('writer_id',$id)->where('status','0')->first();
        if ($data == '') {
            return response()->json('error');
        } else {
            return response()->json($data);
        }
    }
    public function underRevision($id)
    {
            $data = DB::table('order_file')->where('order_id',$id)->where('status','1')->where('flag','0')->first();
            if (!$data) {
                return response()->json('error');
            } else {
                return response()->json($data);
            }
    }
    function askRefund($aid,$oid){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data =  DB::table('order_file')->where('order_id',$oid)->where('type','COMPELETED PAPER')->orderBy('id','desc')->first();
        if (count($data) > 0) {
            DB::table('order')->where('assignment_id',$aid)->where('student_id',$id)
            ->where('status','!=','3')->where('status','!=','0')->update(['refund' => '1']);
            $assignment = DB::table('assignment')->where('id',$aid)->first();
            DB::table('notification')->insert(['reciver' => $data->sender, 'sender' =>$id,'notification' => 'Your Order : '.$assignment->topic.' has Ask to Refunded']);
        } else {
            return 'error';
        }
        return 'success';
    }
    function approveRefund($oid){
        $id =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data = DB::table('order')->where('id',$oid)->first();
        DB::table('order')->where('id',$oid)->update(['status' => '3']);
        DB::table('assignment')->where('id',$data->assignment_id)->update(['status' => '0']);
        $assignment = DB::table('assignment')->where('id',$data->assignment_id)->first();
        DB::table('notification')->insert(['reciver' => $data->student_id, 'sender' =>$id,'notification' => 'Your Order: '.$assignment->topic.' has been set to Refunded']);
        return 'success';
    }
    function sendForRevision($id){
        $senderid =  \Illuminate\Support\Facades\Session::get('user')->id;
        $data =  DB::table('order_file')->where('order_id',$id)->where('type','COMPELETED PAPER')->orderBy('id','desc')->first();
        if (count($data) > 0) {
            DB::table('order_file')->insert(['file' => $data->file,'title' => 'Please Revised the file', 'order_id' => $id,'status' => '1', 'sender' => $senderid]);
            DB::table('notification')->insert(['sender' => $senderid, 'reciver' => $data->sender,'notification' => ' Your File '.$data->file.' has been sent to revision']);
            DB::table('order')->where('id',$id)->update(['status' => '2']);
            $assignment_id = DB::table('order')->where('id',$id)->first()->assignment_id;
            DB::table('assignment')->where('id',$assignment_id)->update(['status' => '2']);
        } else {
            return 'error';
        }
        return 'success';
    }
    public function review($id)
    {  
        $student =  \Illuminate\Support\Facades\Session::get('user')->id;
        $writer = DB::table('order')->where('id',$id)->first();
        if ($writer) {
            $writer = $writer->writer_id;
            $data = DB::table('review')->where('writer_id',$writer)->where('student_id',$student)->first();
            if (count($data) == 0) {
                DB::table('review')->insert(['writer_id' => $writer, 'student_id' => $student, 'text' => $_POST['review'], 'ratting' => $_POST['rating']]);
                DB::table('notification')->insert(['sender' => $student, 'reciver' => $writer,'notification' => ' You have been Reviewed']);
            }
        }
        return 'success';
        
    }
}
