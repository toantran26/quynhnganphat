<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\backend\AuthController;
    use App\Http\Controllers\backend\AdminController;

    use App\Http\Controllers\backend\CategoryController;
    use App\Http\Controllers\backend\PostController;
    use App\Http\Controllers\backend\TinyController;
    use App\Http\Controllers\backend\RoleController;
    use App\Http\Controllers\backend\ConfigSiteController;
    use App\Http\Controllers\backend\TagController;
    use App\Http\Controllers\backend\ClientController;
    use App\Http\Controllers\backend\JobsController;
    use App\Http\Controllers\backend\PageController;
    use App\Http\Controllers\backend\ManagementController;
    use App\Http\Controllers\backend\ContactController;
    use App\Http\Controllers\backend\BannerController;

    
    // TinyController
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
    // if (App::environment('production')) {
    //     URL::forceScheme('https');
    // }
    Route::group(['middleware'=>'guest'], function() {
        Route::get('/login', function () {
            return view('backend.authenticate.login');
        })->name('login');
        Route::post('/login', [AuthController::class,'login'])->name('action-login');
    });


    Route::group(['middleware'=>'auth'], function() {
        Route::post("/logout",[AuthController::class,'logout'])->name("logout");
        Route::get('/', function () {
            return view('backend.home');
        })->name('admin');
        Route::get('/list-account', [AdminController::class,'index'])->name('account-list');
        Route::get('/add-account', [AdminController::class,'create'])->name('account-add');
        Route::post('/add-account', [AdminController::class,'createAccount'])->name('account-post');
        Route::get('/edit-account/{id}', [AdminController::class,'edit'])->name('account-edit')->where(['id' => '[0-9]+']);
        Route::post('/edit-account/{id}', [AdminController::class,'postEdit'])->name('post-account-edit')->where(['id' => '[0-9]+']);
        Route::get('/blog',function () {
            return view('backend.blog.index');
        })->name('blog');
        Route::group(['prefix'=>'role'], function() {
            Route::get('/list-role', [RoleController::class,'index'])->name('list-role');
            Route::get('/create-role', [RoleController::class,'create'])->name('create-role');
            Route::post('/create-role', [RoleController::class,'createPost'])->name('add-role');
            // Route::get('/update-post/{slug}/{id}', [RoleController::class,'editPost'])->name('edit-role')
            //     ->where(['slug' => '.*?','id' => '[0-9]+']);
            // Route::post('/update-post', [RoleController::class,'update'])->name('update-role');
        });
        Route::group(['prefix'=>'config'], function () {
            Route::get('/', [ConfigSiteController::class,'index'])->name('config-all');
            Route::get('menu', [ConfigSiteController::class,'configMenu'])->name('config-menu');
            Route::post('menu', [ConfigSiteController::class,'addMenu'])->name('add-menu');
            Route::post('update-position', [ConfigSiteController::class,'update_position'])->name('update-position');
            Route::get('edit-menu/{id}',[ConfigSiteController::class,'edit'])->name('edit-menu')->where(['id' => '[0-9]+']);
            Route::post('edit-menu/{id}',[ConfigSiteController::class,'update'])->name('post-edit-menu');
            Route::post('update-info-config', [ConfigSiteController::class, 'updateInfo'])->name('update-info-config');
            
            Route::get('page', [PageController::class,'index'])->name('config-page');
            Route::get('add-page', [PageController::class,'create'])->name('page-add');
            Route::post('add-page', [PageController::class,'storePage'])->name('page-store');

            Route::get('edit-page/{id}', [PageController::class,'editPage'])->name('edit-page')->where(['id' => '[0-9]+']);
            Route::post('update-page', [PageController::class,'update'])->name('update-page')->where(['id' => '[0-9]+']);

            Route::get('delete-page/{id}', [PageController::class,'delete'])->name('delete-page')->where(['id' => '[0-9]+']);

            Route::get('management',[ManagementController::class,'index'])->name('config-management');
            Route::post('management',[ManagementController::class,'index'])->name('config-management-post');

            Route::get('management-create', [ManagementController::class,'create'])->name('create-management');
            Route::post('management-create',[ManagementController::class,'store'])->name('save-management');
            Route::get('edit-management/{id}',[ManagementController::class,'edit'])->name('edit-management')->where(['id' => '[0-9]+']);
            Route::post('edit-management/{id}',[ManagementController::class,'postEdit'])->name('post-edit-management')->where(['id' => '[0-9]+']);
            Route::get('/delete-management/{id}', [ManagementController::class,'delete'])->name('delete-management')
            ->where(['id' => '[0-9]+']);
        });
        Route::group(['prefix'=>'post'], function() {
            Route::get('/list-post/{status}', [PostController::class,'index'])->name('list-post')->where('status','[0-9]+');
            Route::get('/create-post', [PostController::class,'createPost'])->name('create-post');
            Route::post('/create-post', [PostController::class,'create'])->name('add-post');
            Route::get('/update-post/{slug}/{id}', [PostController::class,'editPost'])->name('edit-post')
                ->where(['slug' => '.*?','id' => '[0-9]+']);
            Route::post('/update-post', [PostController::class,'update'])->name('update-post');
            Route::get('/delete-post/{id}', [PostController::class,'delete'])->name('delete-post')
            ->where(['id' => '[0-9]+']);
            Route::post('/update-post-edit', [PostController::class,'updatePostEdit'])->name('update-post-edit');
        });
        Route::group(['prefix'=>'banner'], function() {
            Route::get('/{is_page}', [BannerController::class,'index'])->name('banner-list')->where('is_page','[1-5]+');
            Route::post('/{is_page}', [BannerController::class,'index'])->name('post-banner-list')->where('is_page','[1-5]+');;
            Route::get('/create-banner', [BannerController::class,'create'])->name('create-banner');
            Route::post('/create-banner', [BannerController::class,'createBanner'])->name('add-banner');
            Route::get('/update-banner/{id}', [BannerController::class,'edit'])->name('edit-banner')
                ->where(['id' => '[0-9]+']);
            Route::post('/update-banner', [BannerController::class,'postEdit'])->name('update-banner');
            Route::get('/delete-banner/{id}', [BannerController::class,'delete'])->name('delete-banner')
            ->where(['id' => '[0-9]+']);
        });
        Route::group(['prefix'=>'tuyen-dung'], function() {
            Route::get('/list-jobs/{status}', [JobsController::class,'index'])->name('list-jobs')->where('status','[0-9]+');
            Route::get('/create-jobs', [JobsController::class,'createJobs'])->name('create-jobs');
            Route::post('/create-jobs', [JobsController::class,'create'])->name('add-jobs');
            Route::get('/update-jobs/{slug}/{id}', [JobsController::class,'editJobs'])->name('edit-jobs')
                ->where(['slug' => '.*?','id' => '[0-9]+']);
            Route::post('/update-jobs', [JobsController::class,'update'])->name('update-jobs');
            Route::get('/delete-jobs/{id}', [JobsController::class,'delete'])->name('delete-jobs')
            ->where(['id' => '[0-9]+']);
        });
        Route::group(['prefix'=>'cate'], function () {
            Route::get('cate-list',[CategoryController::class,'index'])->name('cate-list');
            Route::post('cate-create',[CategoryController::class,'create'])->name('cate-create');
            Route::get('edit-cate/{id}',[CategoryController::class,'edit'])->name('edit-cate')->where(['id' => '[0-9]+']);
            Route::post('edit-cate/{id}',[CategoryController::class,'postEdit'])->name('post-edit-cate');
            Route::get('/delete-cate/{id}', [CategoryController::class,'delete'])->name('delete-cate')
            ->where(['id' => '[0-9]+']);
        });
        Route::group(['prefix'=>'contact'], function () {
            Route::get('/',[ContactController::class,'index'])->name('contact-list');
            Route::get('edit-contact/{id}',[ContactController::class,'edit'])->name('edit-contact')->where(['id' => '[0-9]+']);
            Route::post('edit-contact/{id}',[ContactController::class,'postEdit'])->name('post-edit-contact');
            
        });
        Route::group(['prefix'=>'customer-client'], function () {
            Route::get('client-list',[ClientController::class,'index'])->name('client-list');
            Route::get('client-create', [ClientController::class,'create'])->name('create-client');
            Route::post('client-create',[ClientController::class,'store'])->name('save-create');
            Route::get('edit-client/{id}',[ClientController::class,'edit'])->name('edit-client')->where(['id' => '[0-9]+']);
            Route::post('edit-client/{id}',[ClientController::class,'postEdit'])->name('post-edit-client')->where(['id' => '[0-9]+']);
            Route::get('/delete-client/{id}', [ClientController::class,'delete'])->name('delete-client')
            ->where(['id' => '[0-9]+']);
        });
        Route::group(['prefix'=>'tag'], function () {
            Route::get('tag-list',[TagController::class,'index'])->name('tag-list');
            Route::post('tag-create',[TagController::class,'create'])->name('tag-add');
        });
        Route::group(['prefix' => 'editor'], function () {
            Route::get('box-tho', function () {
                return view('backend.tinymce.box_tho');
            })->name('box-tho');
            Route::get('info-editor', function () {
                return view('backend.tinymce.info');
            })->name('info-editor');
            Route::get('live-content', function () {
                return view('backend.tinymce.live');
            })->name('live-content');
            Route::get('quote-box', function () {
                return view('backend.tinymce.quote-box');
            })->name('quote-box');
            Route::get('quote', function () {
                return view('backend.tinymce.quote');
            })->name('quote');
            Route::get('preview', function () {
                return view('backend.tinymce.preview');
            })->name('preview');
            Route::get('pdf', function () {
                return view('backend.tinymce.pdf');
            })->name('pdf');
            Route::get('attack', function () {
                return view('backend.tinymce.pdf');
            })->name('pdf');
            Route::post('pdf',[TinyController::class,'pdf'])->name('post.pdf');
            Route::get('attack',[TinyController::class,'attack'])->name('editor.attack');
            Route::post('attack',[TinyController::class,'attack'])->name('post.attack');
            Route::get('image', [TinyController::class, 'image'])->name('images');
            Route::post('image', [TinyController::class, 'image'])->name('images-action');
            Route::get('video', [TinyController::class, 'video'])->name('video');
            Route::post('video', [TinyController::class, 'video'])->name('video-action');
            Route::get('setcover', [TinyController::class, 'setcover'])->name('set-cover');
            Route::get('insert-video', [TinyController::class, 'insertVideo'])->name('insert-video');
            Route::get('link', [TinyController::class, 'link'])->name('link');
            Route::get('editimage', [TinyController::class, 'editimage'])->name('editimage');
            Route::post('editimage', [TinyController::class, 'editimage'])->name('editimage');
            Route::post('uploadimagemobile', [TinyController::class, 'uploadImageMobile'])->name('uploadimagemobile');
            
        });

    });

