<?php

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/',[FrontendController::class ,'index']);
Route::controller(BackendController::class)->group(function(){
    Route::get('/user/cv','UserCv')->name('usercv');
    Route::get('user/logout','userLogout')->name('user.logut');
    Route::post('user/info','saveInfo')->name('user.info');
    Route::get('/user/profile','UserProfile')->name('user.profile');
    Route::post('save/profile','saveProfile')->name('save.profile');
    Route::get('/edit/info','EditInfo')->name('edit.info');
    Route::post('/update/info','updateInfo')->name('update.info');
    Route::get('/edit/profile','EditProfile')->name('edit.profile');
    Route::post('/update/profile','updateProfile')->name('update.profile');
    Route::get('/user/skills','UserSkill')->name('user.skill');
    Route::post('user/save/skills','saveSkill')->name('save.info');
    Route::get('/edit/skill','EditSkill')->name('edit.skill');
    Route::post('user/update/skills','UpdateSkill')->name('update.skill');
    Route::get('/user/education','UserEducation')->name('user.education');
    Route::post('user/save/education','saveEducation')->name('save.education');
    Route::get('/edit/education','EditEducation')->name('edit.education');
    Route::get('/education/edit/{id}','EducationEdit')->name('education.edit');
    Route::post('user/update/education','UpdateEducation')->name('update.education');
    Route::get('/education/delete/{id}','EducationDelete')->name('education.delete');
    Route::get('/user/language','UserLanguage')->name('user.language');
    Route::post('user/save/languages','saveLanguage')->name('save.language');
    Route::get('/edit/language','EditLanguage')->name('edit.language');
    Route::post('user/update/languages','UpdateLanguage')->name('update.language');
    Route::get('/user/image','UserImage')->name('user.image');
    Route::post('user/save/image','SaveImage')->name('save.image');
    Route::get('/edit/image','EditImage')->name('edit.image');
    Route::post('user/update/image','UpdateImage')->name('update.image');
    Route::get('/cv','CV')->name('cv');




















});


require __DIR__.'/auth.php';
