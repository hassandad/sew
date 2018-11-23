<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// General APIs
Route::post('/login','User@auth');
Route::post('/createUser','User@createUser');
Route::post('/resetPassword','User@resetPassword');
Route::get('/getSession','User@getSessionData');
// General APIs end

// Orders Api
Route::get('/orders/all','Orders@getAllOrders');
Route::get('/orders/single/{id}','Orders@single');
Route::post('/order/placeBid','Orders@placeBid');
Route::post('/order/updateBid','Orders@updateBid');
Route::get('/orders/deleteBid/{id}','Orders@deleteBid');
Route::post('/orders/bidComment','Orders@bidComment');
Route::get('/getBidComments/{id}','Orders@getBidComments');
Route::get('/getBidCommentsCount/{id}','Orders@getBidCommentsCount');
Route::get('/getLatestBidComments/{id}','Orders@getLatestBidComments');
Route::get('/order/getBids/{id}','Orders@getBids');
Route::get('/orders/bidCount/{id}','Orders@bidCount');
Route::get('/order/bid/addReview/{type}/{bidId}/{userId}','Orders@addReview');
Route::get('/order/getBidCount/{id}','Orders@getBidCount');
Route::get('/getBidDetails/{id}','Orders@getBidDetails');
Route::get('/checkIfBidExists/{user}/{order}','Orders@checkIfBidExists');
Route::post('/orders/add','Orders@add');
// Orders Api end


Route::get('/getBid','User@getBids');


/////////Assignment API//////////////
Route::get('/assignment/get','Assignment@get');
Route::get('/assignment/getMyAll','Assignment@getMyAll');
Route::post('/assignment/update/{id}','Assignment@update');
Route::get('/assignment/single/{id}','Assignment@getSingle');
Route::get('/assignment/get/all','Assignment@getAll');
Route::get('/assignment/all','Assignment@all');
Route::get('/assignment/getAuction/All','Assignment@getAuctionAll');
Route::get('/assignment/getAuction','Assignment@getAuction');
Route::get('/assignment/getProgress','Assignment@getProgress');
Route::get('/assignment/getWarranty','Assignment@getWarranty');
Route::get('/assignment/getCompeleted','Assignment@getCompeleted');
Route::get('/assignment/getCount','Assignment@getCount');
Route::get('/assignment/getAuctionCount','Assignment@getAuctionCount');
Route::get('/assignment/getProgressCount','Assignment@getProgressCount');
Route::get('/assignment/getWarrantyCount','Assignment@getWarrantyCount');
Route::get('/assignment/getCompeletedCount','Assignment@getCompeletedCount');
Route::get('/assignment/getType/{id}','Assignment@getType');
Route::get('/assignment/getSubject/{id}','Assignment@getSubject');
Route::get('/assignment/getFormat/{id}','Assignment@getFormat');
Route::get('/assignment/getAllType','Assignment@getTypeAll');
Route::get('/assignment/getAllSubject','Assignment@getSubjectAll');
Route::get('/assignment/getAllSubSubject','Assignment@getSubSubjectAll');
Route::get('/assignment/getAllFormat','Assignment@getFormatAll');
Route::get('/assignment/getBid/{id}','Assignment@getBid');
Route::get('/assignment/getBidCount/{id}','Assignment@getBidCount');
Route::get('/assignment/bid/reject/{id}','Assignment@rejectBid');
Route::get('/assignment/compeleted/{id}','Assignment@compeleted');
Route::get('/assignment/deadline/{id}','Assignment@getDeadline');
Route::get('/assignment/search/{value}','Assignment@search');
Route::get('/assignment/searchId/{value}','Assignment@searchId');

/////////Chat API/////////
//Student//
Route::post('/chat/add','Chat@add');
Route::get('/chat/get','Chat@get');
Route::get('/chat/message/get/{id}','Chat@getMessage');
Route::get('/chat/message/getCount','Chat@getMessageCount');
Route::get('/chat/lastMessage/get/{id}','Chat@getLastMessage');
Route::post('/chat/message/add','Chat@addMessage');
Route::get('/chat/get/count/{id}','Chat@getChatCount');
Route::get('/chat/check/newMessage/{id}','Chat@checkNewMessage');
Route::get('/chat/get/single','Chat@getSingle');
Route::get('/chat/update/single/{id}','Chat@updateChatSingle');
//Writer//
Route::get('/chat/writer/get','Chat@getWriter');
Route::get('/chat/writer/get/count/{id}','Chat@getWriterChatCount');
Route::get('/chat/writer/lastMessage/get/{id}','Chat@getWriterLastMessage');
Route::get('/chat/get/singleWriter','Chat@getWriterSingle');


//////////Notification API///////////////////
//Student//
Route::get('/notification/get','Notification@getNotification');
Route::get('/notification/get/single','Notification@getNotificationSingle');
Route::get('/notification/update/single/{id}','Notification@updateNotificationSingle');
//Writer//
Route::get('/notification/writer/get','Notification@getWriterNotification');
Route::get('/notification/writer/get/single','Notification@getWriterNotificationSingle');
Route::get('/notification/writer/update/single/{id}','Notification@updateWriterNotificationSingle');



/////////Writer API//////////
Route::get('/writer/get','Writer@get');
Route::get('/writer/get/single/{id}','Writer@getSingle');
Route::get('/writer/getType/{id}','Writer@getType');
Route::get('/writer/search/{id}','Writer@search');
Route::post('/writer/addQualification','Writer@addQualification');
Route::post('/writer/addPersonal','Writer@addPersonal');
Route::post('/writer/createTemplate','Writer@createTemplate');
Route::get('/writer/deleteTemplate/{id}','Writer@deleteTemplate');
Route::get('/writer/getTemplate/{id}','Writer@getTemplate');
Route::post('/writer/updateTemplate/{id}','Writer@updateTemplate');




/////////Student API//////////
Route::get('/student/get/single/{id}','Student@getSingle');
Route::post('/student/profile/update','Student@profileUpdate');






////////Order API/////////
Route::get('/order/get','Orders@get');
Route::get('/order/getMyAll','Orders@getMyAll');
Route::get('/order/get/count','Orders@getCount');
Route::get('/order/get/single/{id}','Orders@getSingle');
Route::get('/order/getApproval','Orders@getApproval');
Route::get('/order/getProgress','Orders@getProgress');
Route::get('/order/getRevision','Orders@getRevision');
Route::get('/order/getRefunded','Orders@getRefunded');
Route::get('/order/getFinish','Orders@getFinish');
Route::get('/order/getApproval/count','Orders@getApprovalCount');
Route::get('/order/getProgress/count','Orders@getProgressCount');
Route::get('/order/getRevision/count','Orders@getRevisionCount');
Route::get('/order/getRefunded/count','Orders@getRefundedCount');
Route::get('/order/getFinish/count','Orders@getFinishCount');
Route::get('/order/add/{id}/{aid}/{price}','Orders@orderAdd');
Route::get('/order/checkHire/{wid}/{aid}','Orders@checkHire');
Route::get('/order/checkAuction/{aid}','Orders@checkAuction');
Route::get('/order/accept/{oid}/{aid}','Orders@accept');
Route::get('/order/reject/{oid}/{aid}','Orders@reject');
Route::get('/order/accept/notification/{oid}/{aid}','Orders@acceptNotification');
Route::post('/order/sendFile','Orders@sendFile');
Route::get('/order/getFile/{id}','Orders@getFile');
Route::get('/order/check/approval/{id}','Orders@checkApproval');
Route::get('/order/underRevision/{id}','Orders@underRevision');
Route::post('/order/sendRevisionFile','Orders@sendRevisionFile');
Route::post('/order/sendCorrectionFile','Orders@sendCorrectionFile');
Route::get('/order/refuseCorrection/{id}','Orders@refuseCorrection');


Route::get('/askRefund/{id}/{oid}','Orders@askRefund');
Route::get('/approveRefund/{id}','Orders@approveRefund');
Route::get('/sendForRevision/{id}','Orders@sendForRevision');

Route::post('/review/{id}','Orders@review');