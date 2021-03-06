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
Route::group(['middleware' => ['auth']], function () {

    Route::get('/index', 'HomeController@index');

    Route::get('/home', 'HomeController@home')->name('home');
    Route::post('/equalized/courses/done/{id}', 'HomeController@equalized')->name('equalized-done');


    Route::get('/equalization', 'HomeController@equalization')->name('equalization');
   // Route::get('/faculty/{faculty_id}', 'HomeController@facultyCourse')->name('facultyCourse');
    Route::get('/faculty/contents', 'HomeController@facultyMaterials')->name('facultyMaterials');

   // Route::get('/equalization/ENG', 'HomeController@equalEN')->name('literature');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/blog', 'HomeController@blog')->name('blog');
    Route::get('/blog/single', 'HomeController@blogsingle')->name('blog-single');
    Route::get('/courses', 'HomeController@cousrses')->name('courses');
    Route::get('/course/single', 'HomeController@cousrsesingle')->name('courses-single');
    Route::get('/contactus', 'HomeController@contactus')->name('contact-us');
    Route::get('/faculty/courses/{id}', 'HomeController@getFacultyCourse')->name('faculty.courses');
    //these pages of{ video , student form and files }
    Route::get('/faculty/videos', 'userPages\facultyPagesController@showVideoPage')->name('showVideos');
    Route::get('/faculty/video/{faculty_name}', 'userPages\facultyPagesController@showVideosFacultyPage')->name('showVideos.faculty');
    ///search for video page
    Route::any('/faculty/search', 'userPages\facultyPagesController@Search')->name('search');
    //video page
    Route::post('/faculty/upload/', 'userPages\facultyPagesController@addVideo')->name('addVideo');
    Route::get('/faculty/upload', 'userPages\facultyPagesController@addVideoget');
    Route::patch('/faculty/video/edit/{video_id}', 'userPages\facultyPagesController@video_update');
    Route::delete('/faculty/video/delete/{video_id}', 'userPages\facultyPagesController@destroy');
    //old exams page
    Route::get('/faculty/files', 'userPages\facultyPagesController@getFilePage')->name('files');
    Route::post('/faculty/files/upload', 'userPages\facultyPagesController@upload')->name('upload');
    Route::get('/faculty/files/all', 'userPages\facultyPagesController@download');
    Route::delete('/faculty/file/delete/{file_id}', 'userPages\facultyPagesController@deleteFile');
    Route::get('/faculty/file/download/{file_id}', 'userPages\facultyPagesController@download')->name('download');
    Route::post('/faculty/file/search', 'userPages\facultyPagesController@searchFile')->name('search.file');
    Route::get('/faculty/{faculty_name}/files', 'userPages\facultyPagesController@getFacultyFilePage')->name('faculty.files');
    //Student posts Routes
    Route::get('/faculties/posts', 'userPages\facultyPagesController@getPostsPage')->name('posts');
    Route::post('/posts/text', 'userPages\facultyPagesController@storePost')->name('postText');
    Route::get('/faculty/{faculty_name}/posts', 'userPages\facultyPagesController@getFacultyPostsPage')->name('faculty.posts');
    Route::get('/post/comment/{id}', 'userPages\facultyPagesController@getComment')->name('comment');
    Route::post('/post/comment/{id}', 'userPages\facultyPagesController@addComment')->name('comment');
    Route::get('/delete/comment/{id}', 'userPages\facultyPagesController@deleteComment')->name('delete.comment');
});

Route::get('/register', 'authController@getReg')->name('register');
Route::post('/register', 'authController@regUser')->name('register');
Route::get('/login', 'authController@getLogin')->name('login');
Route::post('/login', 'authController@loginUser')->name('login');
Route::get('/logout', 'authController@logout')->name('logout');
