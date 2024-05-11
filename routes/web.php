<?php

use App\Http\Controllers\acCompanyController;
use App\Http\Controllers\acExtensionController;
use App\Http\Controllers\acSkillController;
use App\Http\Controllers\acUsersController;
use App\Http\Controllers\adCampaignController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/leads', [App\Http\Controllers\HomeController::class, 'leads'])->name('leads');
Route::get('/orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');
Route::get('/reports', [App\Http\Controllers\HomeController::class, 'reports'])->name('reports');

Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
Route::get('/settings/users', [App\Http\Controllers\HomeController::class, 'user_settings'])->name('users');
Route::get('/settings/companies', [App\Http\Controllers\HomeController::class, 'company_settings'])->name('companies');
Route::get('/settings/extensions', [App\Http\Controllers\HomeController::class, 'extension_settings'])->name('extensions');
Route::get('/users/asign extensions', [App\Http\Controllers\HomeController::class, 'asign_extensions'])->name('asign_extensions');


Route::get('/tickets', [App\Http\Controllers\HomeController::class, 'tickets'])->name('tickets');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');



Route::post('/settings/companies', [App\Http\Controllers\acCompanyController::class, 'company_store'])->name('company.store');
Route::get('/company/{company}/edit',[acCompanyController::class,'company_edit'])->name('company.edit');
Route::put('/company/{company}/edit',[acCompanyController::class,'company_update'])->name('company.update');
Route::delete('/company/{company}/delete',[acCompanyController::class,'company_destroy'])->name('company.destroy');



Route::post('/extension/store',[acExtensionController::class,'extension_store'])->name('extension.store');
Route::get('/extension/{extension}/store',[acExtensionController::class,'extensions_edit'])->name('extensions.edit');
Route::put('/extension/{extension}/store',[acExtensionController::class,'extension_update'])->name('extension.update');
Route::delete('/extension/{extension}/delete',[acExtensionController::class,'extensions_destroy'])->name('extensions.destroy');




Route::post('/users/store',[acUsersController::class,'acUser_store'])->name('acUser.store');
Route::get('/users/{user}/edit',[acUsersController::class,'acUser_edit'])->name('users.edit');
Route::put('/users/{user}/update',[acUsersController::class,'acUser_update'])->name('acUser.update');
Route::get('/users/{user}/delete',[acUsersController::class,'acusers_delete'])->name('users.delete');
Route::get('/users/extensions',[acUsersController::class,'assign_extension'])->name('assign.extensions');
Route::get('/extensions/{ext}/set',[acUsersController::class,'set_extension'])->name('set.extension');

Route::post('/extensions/set',[HomeController::class,'assign_exten'])->name('assign.exten');
Route::get('/extensions/{user}/unset',[HomeController::class,'unasign_extension'])->name('unasign.extension');



Route::get('/skills',[HomeController::class,'skills'])->name('skills');
Route::post('/skills/store',[acSkillController::class,'acSkil_store'])->name('acSkil.store');
Route::get('/skills/{skill}/delete',[acSkillController::class,'acSkil_delete'])->name('acSkill.delete');
Route::post('/skills/asign',[acSkillController::class,'assign_skill'])->name('assign.skill');

Route::get('/campaign/{company}/store',[adCampaignController::class,'campaign_assign'])->name('campaign.assign');
Route::post('/campaign/store',[adCampaignController::class,'data_store'])->name('data.store');
