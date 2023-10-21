<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\PostController;
use App\Http\Controllers\frontend\LibraryController;
use App\Http\Controllers\frontend\CategoryController;
use App\Http\Controllers\frontend\JobsController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\backend\TinyController;




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

if (App::environment('production')) {
  URL::forceScheme('https');
}
// if (App::environment('local')) {
//     URL::forceScheme('https');
// }

// Route::get('/', function () {
//     return view('frontend.home');
// })->name('home-FE');

Route::get('/{slug}-m{id}.html', [LibraryController::class, 'indexImage'])->name('image-list')
  ->where(['slug' => '.*?', 'id' => '[0-9]+']);

Route::get('/', [HomeController::class, 'index'])->name('home-FE');
Route::get('change-language/{language}', [HomeController::class, 'changeLanguage'])->name('frontend.change-language');
Route::get('/tuyen-dung/{slug}-{id}.html', [JobsController::class, 'detail'])->name('detail-jobs')
  ->where(['slug' => '.*?', 'id' => '[0-9]+']);
Route::get('/{slug}-p{id}.html', [PostController::class, 'index'])->name('post')->where(['slug' => '.*?', 'id' => '[0-9]+']);;
Route::get('/{slug}-p{id}.html', [PostController::class, 'detail'])->name('detail-post')
  ->where(['slug' => '.*?', 'id' => '[0-9]+']);
Route::get('/watch/{id}', [TinyController::class, 'watch'])->name('watch');

Route::group(['prefix' => '/blog'], function () {

  Route::get('/tin-tuc.html', [CategoryController::class, 'blog_news'])->name('blog-news');
  Route::get('/thu-vien.html', [LibraryController::class, 'index'])->name('library');
  Route::get('/an-pham.html', [CategoryController::class, 'document'])->name('document');
});

Route::group(['prefix' => '/'], function () {
  Route::get('/gioi-thieu.html', [CategoryController::class, 'introduce'])->name('introduce');
  Route::get('/du-an/{slug}.html', [CategoryController::class, 'project'])->name('project');
  Route::get('/doi-tac-khach-hang.html', [\App\Http\Controllers\frontend\PartnerController::class, 'index'])->name('partner');
  Route::get('/lien-he.html', function () {
    return view('frontend.contact');
  });
  Route::get('partner.html', [\App\Http\Controllers\frontend\PartnerController::class, 'index'])->name('partner');

  Route::get('/{slug}-v{id}.html', [LibraryController::class, 'indexVideo'])->name('image-list')
    ->where(['slug' => '.*?', 'id' => '[0-9]+']);

  Route::get('/gioi-thieu.html', [CategoryController::class, 'introduce'])->name('introduce');

  Route::get('/tuyen-dung.html', [JobsController::class, 'index'])->name('fontend-jobs');
  Route::get('/{slug}.html', [CategoryController::class, 'index'])->name('detail-cate');
  Route::get('/load-more-right', [CategoryController::class, 'loadMoreRight'])->name('load-right-cate');
  Route::get('/load-more', [HomeController::class, 'loadMore'])->name('load-more');
  Route::post('/subscribe-information', [HomeController::class, 'subInformation'])->name('sub-information');
});


Route::get('/video/{slug}-{id}.html', [LibraryController::class, 'detailVideo'])->name('detail-video')
  ->where(['slug' => '.*?', 'id' => '[0-9]+']);
Route::get('/resize/{size}/{path}', [TinyController::class, 'resize'])->where('path', '(.*)')->name('resize');

Route::get('search-post', [HomeController::class, 'search'])->name('search');
Route::post('/contact/get-mail-noti', [ContactController::class, 'emailNoti'])->name('get-mail-noti');
Route::post('/contact/send-contact', [ContactController::class, 'submitContact'])->name('send-contact');
