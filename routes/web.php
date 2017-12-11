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

Route::get('/',[
	'as' => 'homepage',
	'uses' => 'MainController@getIndex'
]);

Route::get('register',[
	'as' => 'register',
	'uses' => 'MainController@getRegister'
]);

Route::post('register',[
	'as' => 'register',
	'uses' => 'MainController@postRegister'
]);


Route::get('login',[
	'as' => 'login',
	'uses' => 'MainController@getLogin'
]);

Route::post('login',[
	'as' => 'login',
	'uses' => 'MainController@postLogin'
]);

Route::get('logout',[
	'as' => 'logout',
	'uses' => 'MainController@getLogout'
]);

Route::get('profile/{username}',[
	'as' => 'profile',
	'uses' => 'UserController@getProfile'
]);

Route::post('update_profile',[
	'as' => 'update_profile',
	'uses' => 'UserController@updateProfile'
]);

Route::get('mypage/{username}',[
	'as' => 'mypage',
	'uses' => 'UserController@getMyPage'
]);

Route::get('mypage/{username}/search',[
	'as' => 'search',
	'uses' => 'UserController@search'
]);

Route::get('subscribe/{id}',[
	'as' => 'subscribe',
	'uses' => 'UserController@subscribe'
]);

Route::get('myblog/{username}',[
	'as' => 'myblog',
	'uses' => 'UserController@getMyBlog'
]);

Route::post('post-blog',[
	'as' => 'post_blog',
	'uses' => 'UserController@postBlog'
]);

Route::get('show-program-detail/{id}',[
	'as' => 'show_program_detail',
	'uses' => 'UserController@showProgramDetail'
]);

Route::get('start-program/{idProgram}',[
	'as' => 'start_program',
	'uses' => 'UserController@startProgram'
]);


Route::get('completed-actions/{idProgram}',[
	'as' => 'completed_actions',
	'uses' => 'UserController@completedActions'
]);

Route::get('all-programs',[
	'as' => 'all_programs',
	'uses' => 'UserController@getAllPrograms'
]);

Route::get('info-program/{idProgram}',[
	'as' => 'info_program',
	'uses' => 'UserController@getInfoProgram'
]);

Route::get('info-coach/{idCoach}',[
	'as' => 'info_coach',
	'uses' => 'UserController@getInfoCoach'
]);

Route::get('all-blogs',[
	'as' => 'all_blogs',
	'uses' => 'UserController@getAllBlogs'
]);

Route::get('detail-blog/{id}',[
	'as' => 'detail_blog',
	'uses' => 'UserController@getDetailBlog'
]);

Route::post('comment-blog/{id}',[
	'as' => 'comment_blog',
	'uses' => 'UserController@commentBlog'
]);

Route::get('like-program/{id}',[
	'as' => 'like_program',
	'uses' => 'UserController@likeProgram'
]);

Route::post('comment-program/{id}',[
	'as' => 'comment_program',
	'uses' => 'UserController@commentProgram'
]);

Route::get('top-like',[
	'as' => 'top_like',
	'uses' => 'UserController@getTopLike'
]);

Route::get('all-coachs',[
	'as' => 'all_coachs',
	'uses' => 'UserController@getAllCoachs'
]);

Route::get('show-form-register-lesson',[
	'as' => 'show_form_register_lesson',
	'uses' => 'UserController@showFormRegisterLesson'
]);


Route::get('register-lesson',[
	'as' => 'register_lesson',
	'uses' => 'UserController@registerLesson'
]);

