<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagePostsController;
use App\Http\Controllers\ManageCommentsController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/index', [IndexController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blogPost{id}', [BlogPostController::class, 'index']);
Route::post('/createComment',[BlogPostController::class, 'createComment'] );

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/* Route::get('redirects', [HomeController::class, 'index']);
 */
Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/dashboard/managePosts',[ManagePostsController::class, 'index'] )->name('managePosts');

    Route::post('/dashboard/managePosts/createPost',[ManagePostsController::class, 'createPost'] )->name('createPost');

    Route::get('/dashboard/manageComments',[ManageCommentsController::class, 'index'] )->name('manageComments');

    Route::post('/dashboard/manageComments/deleteComments',[ManageCommentsController::class, 'deleteComments'] )->name('deleteComments');

    Route::post('/dashboard/manageComments/approveComments',[ManageCommentsController::class, 'approveComments'] )->name('approveComments');
});
/* Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
 */
/* Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->get('/dashboard/managePosts', function () {
    return view('managePosts');
})->name('managePosts'); */
/* Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->post('/createPost',[ManagePostsController::class, 'createPost'] ); */

//All the admin routes will be defined here...
/* Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    
    

    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');
    
        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    
        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    
    });

  }); */