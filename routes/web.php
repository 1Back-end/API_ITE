<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\PackagesController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\ProjectsController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\SponsorsController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\GuestController;
use App\Models\User;
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
Route::get('/translate', [GuestController::class,'translate']);
Route::group(['middleware' => 'language'],function () {
    Route::get('/', [GuestController::class,'index']);
    Route::get('/boutique', [GuestController::class,'boutique']);
    Route::get('/projects', [GuestController::class,'projects']);
    Route::get('/project/{id}', [GuestController::class,'project']);
    Route::get('/product/{id}', [GuestController::class,'product']);
    Route::get('/products', [GuestController::class,'products']);
    Route::get('/contact', function () {
        return view('contact');
    });
    Route::get('/pricing', [GuestController::class,'pricing']);
    Route::get('/contact', [GuestController::class,'contact']);
    Route::get('/faq', [GuestController::class,'faq']);
    Route::get('/careers', [GuestController::class,'careers']);
    Route::get('/terms', [GuestController::class,'terms']);
    Route::get('/policy', [GuestController::class,'policy']);
    Route::get('/service/{id}', [GuestController::class,'service']);
    Route::get('/services', [GuestController::class,'services']);

});

// admin routes

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'admin'], function(){

        Route::get('/', function () {
            $user= User::with('roles')->where('id',auth()->user()->id)->first();
            session(['role' => $user->roles[0]->name]);
            return view('dashboard');
        });
        Route::group(['middleware' => 'can:admin_access'], function(){
            // Route::get('/', [WelcomeController::class,'dashboard_admin']);

            // sessions
            Route::get('/settings', [SettingsController::class,'index']);
            Route::get('/settings/create', [SettingsController::class,'create']);
            Route::post('/settings/store', [SettingsController::class,'store']);
            Route::get('/settings/edit/{id}', [SettingsController::class,'edit']);
            Route::post('/settings/update', [SettingsController::class,'update']);

            // users
            Route::get('/users', [UsersController::class,'index']);
            Route::get('/users/create', [UsersController::class,'create']);
            // Route::get('/users/edit/{id}', [SponsorsController::class,'edit']);
            // Route::post('/users/update', [SponsorsController::class,'update']);
            Route::post('/users/store', [UsersController::class,'store']);
            Route::post('/users/delete', [UsersController::class,'delete']);
        });

        // categories
        Route::get('/categories', [CategoriesController::class,'index']);
        Route::get('/categories/create', [CategoriesController::class,'newCategory']);
        Route::post('/categories/store', [CategoriesController::class,'create']);
        Route::get('/categories/edit/{id}', [CategoriesController::class,'edit']);
        Route::post('/categories/update', [CategoriesController::class,'update']);
        // products
        Route::get('/products', [ProductsController::class,'index']);
        Route::get('/products/create', [ProductsController::class,'create']);
        Route::get('/products/edit/{id}', [ProductsController::class,'edit']);
        Route::post('/products/update', [ProductsController::class,'update']);
        Route::post('/products/store', [ProductsController::class,'store']);
        Route::get('/products/delete', [ProductsController::class,'delete']);
        // services
        Route::get('/services', [ServiceController::class,'index']);
        Route::get('/services/create', [ServiceController::class,'create']);
        Route::get('/services/edit/{id}', [ServiceController::class,'edit']);
        Route::post('/services/update', [ServiceController::class,'update']);
        Route::post('/services/store', [ServiceController::class,'store']);
        Route::get('/services/delete', [ServiceController::class,'delete']);

        // projects
        Route::get('/projects', [ProjectsController::class,'index']);
        Route::get('/projects/create', [ProjectsController::class,'create']);
        Route::get('/projects/edit/{id}', [ProjectsController::class,'edit']);
        Route::post('/projects/update', [ProjectsController::class,'update']);
        Route::post('/projects/store', [ProjectsController::class,'store']);
        Route::get('/projects/delete', [ProjectsController::class,'delete']);

        // Pages
        Route::get('/pages/{page_name}', [PagesController::class,'edit']);
        Route::post('/pages/update', [PagesController::class,'update']);
        // sponsors
        Route::get('/sponsors', [SponsorsController::class,'index']);
        Route::get('/sponsors/create', [SponsorsController::class,'create']);
        Route::get('/sponsors/edit/{id}', [SponsorsController::class,'edit']);
        Route::post('/sponsors/update', [SponsorsController::class,'update']);
        Route::post('/sponsors/store', [SponsorsController::class,'store']);
        Route::get('/sponsors/delete', [SponsorsController::class,'delete']);
        // reviews
        Route::get('/reviews', [ReviewController::class,'index']);
        Route::get('/reviews/create', [ReviewController::class,'create']);
        Route::get('/reviews/edit/{id}', [ReviewController::class,'edit']);
        Route::post('/reviews/update', [ReviewController::class,'update']);
        Route::post('/reviews/store', [ReviewController::class,'store']);
        Route::get('/reviews/delete', [ReviewController::class,'delete']);
         // packages
        Route::get('/packages', [PackagesController::class,'index']);
        Route::get('/packages/create', [PackagesController::class,'create']);
        Route::get('/packages/edit/{id}', [PackagesController::class,'edit']);
        Route::post('/packages/update', [PackagesController::class,'update']);
        Route::post('/packages/store', [PackagesController::class,'store']);
        Route::get('/packages/delete', [PackagesController::class,'delete']);
         // FAQ
        Route::get('/faqs', [FaqController::class,'index']);
        Route::get('/faqs/create', [FaqController::class,'create']);
        Route::get('/faqs/edit/{id}', [FaqController::class,'edit']);
        Route::post('/faqs/update', [FaqController::class,'update']);
        Route::post('/faqs/store', [FaqController::class,'store']);
        Route::get('/faqs/delete', [FaqController::class,'delete']);

    });

});

require __DIR__.'/auth.php';
