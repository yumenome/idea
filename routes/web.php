<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Idea_LikeController;
use App\Http\Controllers\Follower_UserController;
use App\Http\Controllers\LocaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

                        //as /ideas & ->naem(idea.)
Route::group(['prefix' => 'ideas', 'as' => 'idea.', 'middleware' => ['auth']], function (){


    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show')->withoutMiddleware(['auth']);

    Route::post('/', [IdeaController::class, 'store'])->name('store');

    Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy')->middleware('auth');

    Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit')->middleware('auth');

    Route::put('/update', [IdeaController::class, 'update'])->name('update');

    Route::post('/{idea}/comments', [CommentController::class,'store'])->name('comments.store');

});

Route::resource('users', UserController::class)->only(['show']);
Route::resource('users', UserController::class)->only(['edit', 'update'])->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');


Route::post('users/{user}/follow', [Follower_UserController::class, 'follow'])->middleware('auth')->name('user.follow');
Route::post('users/{user}/unfollow', [Follower_UserController::class, 'unfollow'])->middleware('auth')->name('user.unfollow');

Route::post('ideas/{idea}/like', [Idea_LikeController::class, 'like'])->middleware('auth')->name('idea.like');
Route::post('ideas/{idea}/unlike', [Idea_LikeController::class, 'unlike'])->middleware('auth')->name('idea.unlike');

// php artisan make:controller FeedController  --invokable
Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.main');

Route::get('/lang/{lang}', [LocaleController::class,'index'])->name('lang');

