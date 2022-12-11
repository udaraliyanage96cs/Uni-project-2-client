<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});


Route::get('/', 'WelcomeController@index');
Route::post('/regusers','WelcomeController@regusers');
Route::get('/getDepartment/{dept_id}','WelcomeController@getDepartment');


Route::post('/login','UserController@login');

Route::get('/userhome','DashboardController@userhome');
Route::get('/newarticles','DashboardController@newarticles');
Route::post('/addfaculty','DashboardController@addfaculty');
Route::post('/adddepartment','DashboardController@adddepartment');
Route::get('/subdashboard','DashboardController@subdashboard');
Route::get('/usersettings','DashboardController@usersettings');





Route::post('/addarticle','ArticleController@addarticle');
Route::get('/articles','ArticleController@articles');
Route::get('/viewarticle/{id}','ArticleController@viewarticle');
Route::get('/otherarticles',"ArticleController@otherarticles");
Route::get('/viewarticleadmin/{id}','ArticleController@viewarticleadmin');
Route::post('/addreview/{id}','ArticleController@addreview');
Route::get('/approve/{id}','ArticleController@approve');
Route::get('/unapprove/{id}','ArticleController@unapprove');
Route::get('/editarticle/{id}','ArticleController@editarticle');
Route::post('/updatearticle/{id}','ArticleController@updatearticle');
Route::get('/rewrite/{id}','ArticleController@rewrite');
Route::post('/rewritearticle/{id}','ArticleController@rewritearticle');
Route::get('/webarticles','ArticleController@webarticles');
Route::get('/downloadpdf/{id}','ArticleController@generatePDF');

Route::get('/previewarticle','ArticleController@previewarticle');
Route::get('/articlesettings','ArticleController@articlesettings');
Route::post('/articlesettingsau','ArticleController@articlesettingsau');



Route::post('/replyreview/{revid}/{aid}','RevReplyController@replyreview');
Route::get('/deletereply/{id}','RevReplyController@deletereply');
Route::get('/deletereview/{id}','RevReplyController@deletereview');
Route::get('/statusupdate/{id}/{val}','RevReplyController@statusupdate');

Route::get('/createusers','UserController@createusers');
Route::post('/addusers','UserController@addusers');
Route::get('/allusers','UserController@allusers');
Route::get('/viewuser/{id}','UserController@viewuser');
Route::get('/deleteuser/{id}','UserController@deleteuser');
Route::post('/addwebteam','UserController@addwebteam');
Route::get('/webapprovel','UserController@webapprovel');
Route::get('/teamapprove/{id}','UserController@teamapprove');
Route::get('/teamdisabled/{id}','UserController@teamdisabled');
Route::get('/verifyme/{id}','UserController@verifyme');
Route::get('/verifymesp/{id}','UserController@verifymesp');

Route::post('/updateusers/{id}','UserController@updateusers');
Route::post('/updatepwd/{id}','UserController@updatepwd');
Route::get('/makewebmember/{id}','UserController@makewebmember');
Route::get('/makecomiteemember/{id}','UserController@makecomiteemember');
Route::get('/removedesignation/{id}','UserController@removedesignation');
Route::get('/removedesignationcom/{id}','UserController@removedesignationcom');

Route::get('/userpprovel','UserController@userpprovel');
Route::post('/addoldusers','UserController@addoldusers');
Route::get("/downloadSampleCSV",'UserController@downloadSampleCSV');



Route::get('/activitylog','ActivityController@activitylog');


Route::get('/getsname/{id}','UserController@getsname');

Route::get('/meeting','MeetingController@meeting');
Route::get('/addmeeting','MeetingController@addmeeting');
Route::post('/addmeetings','MeetingController@addmeetings');
Route::get("/deletemeeting/{id}",'MeetingController@deletemeeting');

Route::get('/sendmail',function(){
    $details = [
        'title' => 'Kavindu Nadeeshana Maths class Online Link',
        'body' => "Ji",
    ];
    \Mail::to('edufam340@gmail.com')->send(new \App\Mail\SendMail($details));
});



