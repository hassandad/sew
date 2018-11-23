<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// General Routes

Route::get('/', function () {
    return view('index');
})->middleware('checkUser');
Route::get('/login',function(){
   return view('signin');
})->middleware('redirect');
Route::get('/signup',function (){
    return view('signup');
})->middleware('redirect');
Route::get('/logout','User@logout');
Route::get('/verifyUser/{id}/{code}','User@verifyUser');
Route::get('/test','User@test');

Route::get('/verify',function (){
    return view('email.verification');
});

// End General Routes
///Check////
Route::get('/checkStatus','Orders@checkStatus')->middleware('checkLogin');



// Writer Routes
Route::get('/writer/dashboard/auctions','Writer@auctions')->middleware('checkLogin');
Route::get('/writer/dashboard/auction/{id}','Writer@auctionSingle')->middleware('checkLogin');

//End Writer Routes




////////////DASHBOARD////////////



Route::get('/checkUser','User@check')->middleware('checkLogin');
///Student///
Route::get('/dashboard/student/placeOrder','Student@placeOrder')->middleware('checkLogin');
Route::get('/dashboard/student/singleOrder/{id}','Student@singleOrder')->middleware('checkLogin');
Route::get('/dashboard/student/balance',function (){   return view('dashboard.student.balance');   })->middleware('checkLogin');
Route::get('/dashboard/student/myOrder',function (){   return view('dashboard.student.myOrder');   })->middleware('checkLogin');
Route::get('/dashboard/student/notification','Notification@view')->middleware('checkLogin');
Route::get('/dashboard/student/message',function (){   return view('dashboard.student.message');   })->middleware('checkLogin');
Route::get('/dashboard/student/writerRating',function (){   return view('dashboard.student.writerRating');   })->middleware('checkLogin');
Route::get('/dashboard/student/profile','Student@profile')->middleware('checkLogin');
Route::get('/dashboard/student/message/{id}',function ($id){   return view('dashboard.student.messageSpecific',['id'=>$id]);   })->middleware('checkLogin');
Route::get('/dashboard/student/writerProfile/{id}','Writer@writerProfile')->middleware('checkLogin');
Route::get('/dashboard/student/helpCenter',function (){   return view('dashboard.student.helpCenter');   })->middleware('checkLogin');



///Writer///
Route::get('/dashboard/writer/balance','Writer@balance')->middleware('checkLogin');
Route::get('/dashboard/writer/myOrder',function (){   return view('dashboard.writer.myOrder');   })->middleware('checkLogin');
Route::get('/dashboard/writer/myOrder/single/{id}','Writer@myOrderSingle')->middleware('checkLogin');
Route::get('/dashboard/writer/notification','Notification@writerView')->middleware('checkLogin');
Route::get('/dashboard/writer/setting','Writer@setting')->middleware('checkLogin');
Route::get('/dashboard/writer/profile','Writer@profile')->middleware('checkLogin');
Route::get('/dashboard/writer/assignment',function (){   return view('dashboard.writer.assignment');   })->middleware('checkLogin');
Route::get('/dashboard/writer/bidPlacedAssignment',function (){   return view('dashboard.writer.bidPlaced');   })->middleware('checkLogin');
Route::get('/dashboard/writer/message',function (){   return view('dashboard.writer.message');   })->middleware('checkLogin');
Route::get('/dashboard/writer/message/{id}',function ($id){   return view('dashboard.writer.messageSpecific',['id'=>$id]);   })->middleware('checkLogin');
Route::get('/dashboard/writer/helpCenter',function (){   return view('dashboard.writer.helpCenter');   })->middleware('checkLogin');