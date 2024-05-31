<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

	//Manage Publication
	Route::get('/home', [PublicationController::class, 'home'])->name('home');
	Route::get('/publications-list', [PublicationController::class, 'index'])->name('publications-list');
	Route::get('/publication/{id}', [PublicationController::class, 'view'])->name('publications.view');
	Route::get('/add-publication-form', [PublicationController::class, 'create'])->name('publications.create');
	Route::post('/add-publication-form', [PublicationController::class, 'store'])->name('publications.store');
	Route::get('/view-publication/{id}', [PublicationController::class, 'show'])->name('publications.show');
	Route::get('/edit-publication/{id}', [PublicationController::class, 'edit'])->name('publications.edit');
	Route::put('/update-publication/{id}', [PublicationController::class, 'update'])->name('publications.update');
	Route::get('/view-pdf/{id}', [PublicationController::class, 'pdf'])->name('publications.pdf');
	Route::get('/delete-publication/{id}', [PublicationController::class, 'destroy'])->name('publications.destroy');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

Route::get('/', function () {
    return view('session/login-session');
});


//Manage Event module
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/add-event', [EventController::class, 'create'])->name('events.create');
Route::post('/add-event', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{id}', [EventController::class, 'view'])->name('events.view');
Route::get('/view-event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/edit-event/{id}', [EventController::class, 'edit'])->name('events.edit');
Route::put('/update-event/{id}', [EventController::class, 'update'])->name('events.update');
Route::get('/delete-event/{id}', [EventController::class, 'destroy'])->name('events.destroy');
Route::post('/events/{id}/register', [EventController::class, 'register'])->name('events.register');
Route::get('/events/{id}/registrations', [EventController::class, 'viewRegistrations'])->name('events.viewRegistrations');

Route::middleware(['auth', 'can:viewDashboard'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//complaint module
Route::get('/feedbacklist', [FeedbackController::class, 'index'])->name('feedbacklist');

Route::get('/Student/feedback',[FeedbackController::class,'index']);
Route::get('/Student/newApplication',[FeedbackController::class,'newApplication']);
Route::get('/Student/viewFeedback/{id}',[FeedbackController::class,'viewFeedback']);
Route::get('/Student/updateFeedbacks/{id}',[FeedbackController::class,'updateFeedbacks'])->name('updateFeedbacksForm');
Route::post('/Student/addFeedback',[FeedbackController::class,'addFeedback']);
Route::post('/Student/updateFeedback',[FeedbackController::class,'updateFeedback']);
Route::get('/Student/deleteFeedback/{id}',[FeedbackController::class,'deleteFeedback']);

Route::get('/Lecturer/feedback',[FeedbackController::class,'LecturerFeedback'])->name('Lecturerfeedbacklist');
Route::post('/Lecturer/addFeedback',[FeedbackController::class,'addFeedback']);
Route::post('/Lecturer/updateFeedback',[FeedbackController::class,'updateFeedback']);
Route::get('/Lecturer/deleteFeedback/{id}',[FeedbackController::class,'deleteFeedback']);
Route::get('/Lecturer/viewFeedback/{id}',[FeedbackController::class,'LecturerViewFeedback']);
Route::get('/Lecturer/editFeedback/{id}',[FeedbackController::class,'LecturerEditFeedback']);
Route::get('/Lecturer/statusFeedback/{id}/{status}',[FeedbackController::class,'statusFeedback']);
Route::post('/Lecturer/statusFeedback/{id}', [FeedbackController::class, 'updateStatus'])->name('lecturer.updateStatus');
