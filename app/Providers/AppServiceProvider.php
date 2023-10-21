<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;

use App\Models\Contact;
use Illuminate\Pagination\Paginator;
// use App\Repositories\Interfaces\AdminRepositoryInterface as AdminReadInterface;
// use App\Repositories\AdminRepository as AdminReadRepo;

use App\Repository\Backend\AdminRepository;
use App\Repository\Backend\CategoriesRepository;
use App\Repository\Backend\Contracts\AdminRepositoryInterface;
use App\Repository\Backend\Contracts\CategoriesRepositoryInterface;
use App\Repository\Backend\Contracts\ConfigSiteRepositoryInterface;
use App\Repository\Backend\ConfigSiteRepository;
use App\Repository\Backend\Contracts\PostRepositoryInterface;
use App\Repository\Backend\Contracts\TagsRepositoryInterface;
use App\Repository\Backend\Contracts\UserRepositoryInterface;
use App\Repository\Backend\PostRepository;
use App\Repository\Backend\TagsRepository;
use App\Repository\Backend\UserRepository;
use App\Repository\Backend\Contracts\ClientRepositoryInterface;
use App\Repository\Backend\ClientRepository;
use App\Repository\Backend\Contracts\JobsRepositoryInterface;
use App\Repository\Backend\JobsRepository;
use App\Repository\Backend\Contracts\PageRepositoryInterface;
use App\Repository\Backend\PageRepository;
use App\Repository\Backend\Contracts\ManagementRepositoryInterface;
use App\Repository\Backend\ManagementRepository;
use App\Repository\Backend\Contracts\ContactRepositoryInterface;
use App\Repository\Backend\ContactRepository;
use App\Repository\Backend\Contracts\BannerRepositoryInterface;
use App\Repository\Backend\BannerRepository;
use App\Repository\Backend\Contracts\PostEditRepositoryInterface;
use App\Repository\Backend\PostEditRepository;

use App\Repository\Frontend\Contracts\PostRepositoryInterface as FePostRepositoryInterface;
use App\Repository\Frontend\Contracts\CategoryRepositoryInterface as FeCateRepositoryInterface;
use App\Repository\Frontend\PostRepository as FePostRepository;
use App\Repository\Frontend\CategoryRepository as FeCateRepository;
use App\Repository\Frontend\Contracts\ManagementRepositoryInterface as FeManagementRepositoryInterface;
use App\Repository\Frontend\ManagementRepository as FeManagementRepository;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    // public $singletons = [
    //     AdminReadInterface::class => AdminReadRepo::class
    // ];
    public $singletons = [
        AdminRepositoryInterface::class => AdminRepository::class,
        CategoriesRepositoryInterface::class => CategoriesRepository::class,
        ConfigSiteRepositoryInterface::class => ConfigSiteRepository::class,
        PostRepositoryInterface::class => PostRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        TagsRepositoryInterface::class => TagsRepository::class,
        ClientRepositoryInterface::class => ClientRepository::class,
        JobsRepositoryInterface::class => JobsRepository::class,
        PageRepositoryInterface::class => PageRepository::class,
        ManagementRepositoryInterface::class => ManagementRepository::class,
        ContactRepositoryInterface::class => ContactRepository::class,
        BannerRepositoryInterface::class => BannerRepository::class,
        PostEditRepositoryInterface::class => PostEditRepository::class,
        FePostRepositoryInterface::class => FePostRepository::class,
        FeCateRepositoryInterface::class => FeCateRepository::class,
        FeManagementRepositoryInterface::class => FeManagementRepository::class,

    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Carbon::setLocale('vi');
        \Carbon\Carbon::setLocale('vi');
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}

