<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Guest\CourseController as GuestCourseController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Guest\SubscriptionController as GuestSubscriptionController;
use App\Http\Controllers\Guest\VideoController as GuestVideoController;
use App\Http\Controllers\Security\LoginController;
use App\Http\Controllers\Security\RegController;
use App\Http\Controllers\User\SubsController;
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
Route::get("/", [GuestHomeController::class, "index"])->name("guest.home");
Route::get("/subscriptions", [GuestSubscriptionController::class, "index"])->name("guest.subscriptions.index");
Route::get("/subscriptions/{id}/show", [GuestSubscriptionController::class, "show"])->name("guest.subscriptions.show");
Route::get("/courses", [GuestCourseController::class, "index"])->name("guest.course.index");
Route::get("/courses/{id}/show", [GuestCourseController::class, "show"])->name("guest.course.show");
Route::get("/video/{id}/show", [GuestVideoController::class, "show"])->name("guest.video.show");

Route::group(["middleware" => 'auth'], function () {
    Route::post("/logout", [LoginController::class, "logout"])->name("login.logout");
});

Route::group(["middleware" => "guest"], function () {
    Route::get("/login", [LoginController::class, "index"])->name("login.index");
    Route::post("/login", [LoginController::class, "store"])->name("login.store");
    Route::get("/reg", [RegController::class, "index"])->name("reg.index");
    Route::post("/reg", [RegController::class, "store"])->name("reg.store");
});

Route::group(["prefix" => "admin", "middleware" => "admin"], function () {
    Route::get("/", [HomeController::class, "index"])->name("admin.home");
    Route::resource('/subscriptions', SubscriptionController::class);
    Route::resource('/courses', CourseController::class);
    Route::resource("/videos", VideoController::class);
    Route::get("/subscription/{id}/active", [HomeController::class, "setActive"])->name("admin.sub.set.active");
});