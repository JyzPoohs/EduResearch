<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Models\Feedback;
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

	Route::get('/delete-publication/{id}', [PublicationController::class, 'destroy'])->name('publications.destroy');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
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
