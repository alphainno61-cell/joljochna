<?php

use App\Http\Controllers\Admin\FooterSettingController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\SocialMediaController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\BookingController as BackendBookingController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Backend\LandingPageController;
use App\Http\Controllers\Backend\OpportunityController;
use App\Http\Controllers\Backend\PricingController;
use App\Http\Controllers\Backend\ContactInfoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Admin\PlotController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'landingPage'])->name('home');
Route::get('/about', [HomeController::class, 'aboutPage'])->name('about');
Route::get('/projects', [HomeController::class, 'othersProjects'])->name('projects');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');



Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');


    Route::get('/herosection', [LandingPageController::class, 'heroSection'])
        ->name('heroSection')
        ->middleware('permission:Hero Section');

    Route::put('/updateherosection', [LandingPageController::class, 'updateOrCreate'])
        ->name('updateorcreate')
        ->middleware('permission:Hero Section');

    Route::resource('opportunity', OpportunityController::class)->middleware(
        'permission:View Opportunity Section|Create Opportunity Section|Edit Opportunity Section|Delete Opportunity Section'
    );

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::resource('pricing', PricingController::class)->middleware([
            'permission:View Pricing Section|Create Pricing Section|Edit Pricing Section|Delete Pricing Section'
        ]);
        Route::resource('testimonials', TestimonialController::class)->middleware([
            'permission:View Testimonial Section|Create Testimonial Section|Edit Testimonial Section|Delete Testimonial Section'
        ]);

        Route::resource('socialmedias', SocialMediaController::class)->middleware([
            'permission:View SocialMedia Section|Create SocialMedia Section|Edit SocialMedia Section|Delete SocialMedia Section'
        ]);

        Route::resource('projects', ProjectController::class)->middleware([
            'permission:View Projects Section|Create Projects Section|Edit Projects Section|Delete Projects Section'
        ]);

        Route::get('/contact-info', [ContactInfoController::class, 'edit'])->name('contact-info.edit')
            ->middleware('permission:Contact Section');
        Route::put('/contact-info', [ContactInfoController::class, 'update'])->name('contact-info.update')
            ->middleware('permission:Contact Section');

        Route::resource('plots', PlotController::class)->middleware([
            'permission:View Plot|Create Plot|Edit Plot|Delete Plot'

        ]);
        Route::resource('bookings', BackendBookingController::class)->except(['create', 'store', 'edit'])->middleware([
            'permission:View Booking|Edit Booking|Delete Booking'
        ]);

        Route::put('bookings/{booking}/status', [BackendBookingController::class, 'updateStatus'])->name('bookings.update-status')
            ->middleware('permission:Edit Booking');

        Route::get('footer-settings', [FooterSettingController::class, 'index'])
            ->name('footer-settings.index')
            ->middleware('permission:Setting');
        Route::post('footer-settings', [FooterSettingController::class, 'storeOrUpdate'])
            ->name('footer-settings.store-or-update')
            ->middleware('permission:Setting');
    });

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('permission:View Dashboard');
    Route::get('/booking', [HomeController::class, 'booking'])->name('booking')->middleware('permission:View Booking');
    Route::get('/plot', [HomeController::class, 'plot'])->name('plot')->middleware('permission:View Plot');
    Route::get('/customer', [HomeController::class, 'customer'])->name('customer')->middleware('permission:View Customer');
    Route::get('/report', [HomeController::class, 'report'])->name('report')->middleware('permission:View Report');
    Route::get('/setting', [HomeController::class, 'setting'])->name('setting')->middleware('permission:View Setting');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Permissions Routes
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions')->middleware('permission:View Permission');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create')->middleware('permission:Create Permission');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store')->middleware('permission:Create Permission');
    Route::get('/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit')->middleware('permission:Edit Permission');
    Route::put('/permissions/update/{id}', [PermissionController::class, 'update'])->name('permissions.update')->middleware('permission:Edit Permission');
    Route::get('/permissions/delete/{id}', [PermissionController::class, 'destroy'])->name('permissions.delete')->middleware('permission:Delete Permission');

    // Roles Routes
    Route::get('/roles', [RoleController::class, 'index'])->name('roles')->middleware('permission:View Role');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create')->middleware('permission:Create Role');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store')->middleware('permission:Create Role');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit')->middleware('permission:Edit Role');
    Route::put('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update')->middleware('permission:Edit Role');
    Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete')->middleware('permission:Delete Role');

    // Create User and Role Permissions Routes
    Route::get('/users', [AssignRoleController::class, 'index'])->name('users')->middleware('permission:View AssignRole');
    Route::get('/users/create', [AssignRoleController::class, 'create'])->name('users.create')->middleware('permission:Create AssignRole');
    Route::post('/users/store', [AssignRoleController::class, 'store'])->name('users.store')->middleware('permission:Create AssignRole');
    Route::get('/users/edit/{id}', [AssignRoleController::class, 'edit'])->name('users.edit')->middleware('permission:Edit AssignRole');
    Route::put('/users/update/{id}', [AssignRoleController::class, 'update'])->name('users.update')->middleware('permission:Edit AssignRole');
    Route::get('/users/delete/{id}', [AssignRoleController::class, 'destroy'])->name('users.delete')->middleware('permission:Delete AssignRole');
});
