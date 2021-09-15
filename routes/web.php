<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InchargeController;


use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('pages.front_page');
})->name('front')->middleware('ifloggedIn');

// Route::get('/', [LoginController::class, 'front'])->name('front');

Route::post("authenticate", [LoginController::class, "login"])->name('login');

Route::middleware(['logoutcheck', 'manageAdminAccess'])->group(function(){
   
    Route::get('/admin', [LoginController::class, "admin_home"])->name("admin");     

    Route::get('admin/students', [AdminController::class, "students_home"])->name("admin_students");        
    
    Route::get('admin/departments', [AdminController::class, "departments_home"])->name("admin_departments");

    Route::get('admin/incharge', [AdminController::class, "incharge_home"])->name("admin_incharge");
    
    Route::post('/admin/departments/add', [AdminController::class, "add_department"])->name("add_department");

    Route::get('/admin/departments/delete', [AdminController::class, "delete_department"])->name("delete_department");      

    Route::get('/admin/department/edit/{id}', [AdminController::class, "edit_department"])->name("edit_department");

    Route::post('/admin/department/update{id}', [AdminController::class, "update_department"])->name("update_department");

    Route::get('/admin/department/delete{id}', [AdminController::class, "delete_department"])->name("delete_department");

    Route::post('/admin/incharge/add', [AdminController::class, "add_incharge"])->name("add_incharge");

    Route::get('/admin/incharge/edit/{id}', [AdminController::class, "edit_incharge"])->name("edit_incharge");

    Route::post('/admin/incharge/update{id}', [AdminController::class, "update_incharge"])->name("update_incharge");

    Route::get('/admin/incharge/delete{id}', [AdminController::class, "delete_incharge"])->name("delete_incharge");

    Route::post('/admin/student/add', [AdminController::class, "add_student"])->name("add_student");

    Route::get('/admin/student/edit{id}', [AdminController::class, "edit_student"])->name("edit_student");

    Route::post('/admin/student/update{id}', [AdminController::class, "update_student"])->name("update_student");

    Route::get('/admin/student/delete{id}', [AdminController::class, "delete_student"])->name("delete_student");



});

Route::middleware(['logoutcheck', 'manageStudentAccess'])->group(function(){

    Route::get('/student', [LoginController::class, "student_home"])->name("student"); 
});

Route::middleware(['logoutcheck', 'manageInchargeAccess'])->group(function(){
    Route::get('/incharge', [LoginController::class, "incharge_home"])->name("incharge"); 
    Route::get('/edit-status/{id}', [InchargeController::class, "edit_status"])->name("edit_status");
    Route::post('/update/notes{id}', [InchargeController::class, "edit_notes"])->name("edit_notes");
});




Route::get('/logout', function(Request $request)
{
    $request->session()->flush();
    Auth::logout();
    return redirect()->route('front');
});    