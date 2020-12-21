<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'MainController@main');         // 교육/세미나
Route::get('education.scn', 'educationController@list');
Route::get('education/{id}', 'educationController@show')->name('education.show.scn');
Route::post('education/receipt', 'educationController@receipt')->name('education.receipt');

// 공지사항 
Route::get('notice.scn', 'noticeController@list');
Route::get('notice/{id}', 'noticeController@show')->name('notice.show.scn');
// 상설매장 
Route::get('shop.scn', 'shopController@list');
Route::get('shop/{id}', 'shopController@show')->name('ushop.show.scn');
// 뉴스 
Route::get('news.scn', 'newsController@list');
Route::get('news/{id}', 'newsController@show')->name('news.show.scn');
// 서일캠퍼스타운 -> 찾아오시는길
Route::get('map.scn', 'mapController@list');

// 로그인 
Route::get('login.scn', 'loginController@view');
Route::post('auth/logout', 'Auth\loginController@logout')->name('auth.logout');
Route::get('auth/naver', 'Auth\loginController@redirectToProviderNaver')->name('auth.naver');
Route::get('auth/naver/callback', 'Auth\loginController@handleProviderCallbackNaver');

// 마이페이지
Route::get('/mypage.scn', 'userController@view');


Route::get('/private.scn', 'userController@private');                           // 개인정보약관
Route::get('/admin', 'Admins\adminController@login');                           // 로그인 View
Route::post('/admin', 'Admins\adminController@loginForm')->name('login');       // 로그인 Post
Route::get('/register', 'Admins\adminController@registerView');                 // 회원가입 View
Route::post('/register', 'Admins\adminController@register')->name('register');  // 회원가입 Post

// 관리 페이지 
// Route::group(['middleware' => 'isAdmin'], function () {
    // 메인화면 
    Route::get('admin/dashboard', 'Admins\adminController@adminDashboard');       //  에널리틱스 추가할까 고 민 중 . . . 

    // 썸네일 관리 
    Route::get('admin/thumbnail/list', 'Admins\adminController@thumbnailList')->name('admin.thumbnail');                // 리스트 
    Route::post('admin/thumbnail/create', 'Admins\adminController@thumbnailCreate')->name('admin.thumbnail.create');    // 업로드 메소드 
    Route::get('admin/thumbnail/state/{id}', 'Admins\adminController@thumbnailState')->name('admin.thumbnail.state');         // 상태전환
    Route::post('admin/thumbnail/update/{id}', 'Admins\adminController@thumbnailPost')->name('admin.thumbnail.update');         // 상태전환
    Route::get('admin/thumbnail/delete', 'Admins\adminController@delete')->name('admin.thumbnail.delete');         // 상태전환
    
    // 교육세미나 관리 
    Route::get('admin/education/list', 'Admins\educationController@list')->name('admin.education.list');                    // 리스트 
    Route::get('admin/education/state/{id}', 'Admins\educationController@state')->name('admin.education.state');     // 글 상태전환
    Route::get('admin/education/filedownload/{id}', 'Admins\educationController@fileDownload')->name('file.download');      // 재사용이 가능하게끔 수정해야함
    Route::get('admin/education/create', 'Admins\educationController@create')->name('admin.education.create');              // 글 작성 뷰 
    Route::post('admin/education/create', 'Admins\educationController@createForm')->name('admin.education.create.form');    // 글 업로드 메소드 
    Route::get('admin/education/update', 'Admins\educationController@update')->name('admin.education.update');              // 수정 뷰 
    Route::post('admin/education/update', 'Admins\educationController@updateForm')->name('admin.education.update.form');              // 수정 뷰 
    Route::get('admin/education/delete', 'Admins\educationController@delete')->name('admin.education.delete');              // 수정 뷰 
    Route::get('admin/education/receipt/{id}', 'Admins\educationController@receipt')->name('admin.education.receipt');              // 수정 
    

    
    // 공지사항 관리 
    Route::get('admin/notice/list', 'Admins\noticeController@list')->name('admin.notice.list');                 // 리스트 
    Route::get('admin/notice/state/{id}', 'Admins\noticeController@state')->name('admin.notice.state');         // 상태전환
    Route::get('admin/notice/create', 'Admins\noticeController@create')->name('admin.notice.create');           // 글 작성 뷰 
    Route::post('admin/notice/create', 'Admins\noticeController@createForm')->name('admin.notice.create.form'); // 글 업로드 메소드 
    Route::get('admin/notice/update', 'Admins\noticeController@update')->name('admin.notice.update');           // 수정 뷰 
    Route::post('admin/notice/update', 'Admins\noticeController@updateForm')->name('admin.notice.update.form'); // 수정 엑션
    Route::get('admin/notice/delete', 'Admins\noticeController@delete')->name('admin.notice.delete');           // 수정 뷰 
    
    // 상설매장 관리 
    Route::get('admin/shop/list', 'Admins\shopController@list')->name('admin.shop.list');                       // 리스트 
    Route::get('admin/shop/state/{id}', 'Admins\shopController@state')->name('admin.shop.state');         // 상태전환
    Route::get('admin/shop/create', 'Admins\shopController@create')->name('admin.shop.create');                 // 글 작성 뷰
    Route::post('admin/shop/create', 'Admins\shopController@createForm')->name('admin.shop.create.form');       // 글 업로드 메소드 
    Route::get('admin/shop/update', 'Admins\shopController@update')->name('admin.shop.update');                 // 글 수정 뷰 
    Route::post('admin/shop/update', 'Admins\shopController@updateForm')->name('admin.shop.update.form');                 // 글 수정 뷰 
    Route::get('admin/shop/delete', 'Admins\shopController@delete')->name('admin.shop.delete');                 // 글 수정 뷰 
 
    // 새소식 관리
    Route::get('admin/news/list', 'Admins\newsController@list')->name('admin.news.list');
    Route::get('admin/news/state/{id}', 'Admins\newsController@state')->name('admin.news.state');         // 상태전환
    Route::get('admin/news/create', 'Admins\newsController@create')->name('admin.news.create');
    Route::post('admin/news/create', 'Admins\newsController@createForm')->name('admin.news.create.form');
    Route::get('admin/news/update', 'Admins\newsController@update')->name('admin.news.update');
    Route::post('admin/news/update', 'Admins\newsController@updateForm')->name('admin.news.update.form');
    Route::get('admin/news/delete', 'Admins\newsController@delete')->name('admin.news.delete');
    
    // 회원 관리
    Route::get('admin/user/list', 'Admins\userController@list')->name('admin.user');
    Route::get('admin/user/update/{id}', 'Admins\userController@update')->name('admin.user.update');
    Route::get('admin/user/delete/{id}', 'Admins\userController@delete')->name('admin.user.delete');


    // 비정상접속 로그관리 
    Route::get('admin/log', 'Admins\logController@adminDashboard')->name('admin.log');
// });