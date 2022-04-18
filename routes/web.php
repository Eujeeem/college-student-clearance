<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InchargeController;


use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
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

    Route::get('admin/assistant-incharge', [AdminController::class, "assistant_home"])->name("admin_assistant");
    
    Route::post('/admin/departments/add', [AdminController::class, "add_department"])->name("add_department");

    Route::get('/admin/departments/new-department/add', [AdminController::class, "add_new_department"])->name("add_new_department");

    Route::get('/admin/departments/delete', [AdminController::class, "delete_department"])->name("delete_department");      

    Route::get('/admin/department/edit/{id}', [AdminController::class, "edit_department"])->name("edit_department");

    Route::post('/admin/department/update{id}', [AdminController::class, "update_department"])->name("update_department");

    Route::get('/admin/department/delete{id}', [AdminController::class, "delete_department"])->name("delete_department");

    Route::post('/admin/incharge/add', [AdminController::class, "add_incharge"])->name("add_incharge");

    Route::get('/admin/departments/new-incharge/add', [AdminController::class, "add_new_incharge"])->name("add_new_incharge");

    Route::get('/admin/incharge/edit/{id}', [AdminController::class, "edit_incharge"])->name("edit_incharge");

    Route::post('/admin/incharge/update{id}', [AdminController::class, "update_incharge"])->name("update_incharge");

    Route::get('/admin/incharge/delete{id}', [AdminController::class, "delete_incharge"])->name("delete_incharge");

    Route::post('/admin/student/add', [AdminController::class, "add_student"])->name("add_student");

    Route::get('/admin/student/new-student/add', [AdminController::class, "add_new_student"])->name("add_new_student");

    Route::get('/admin/student/edit{id}', [AdminController::class, "edit_student"])->name("edit_student");

    Route::post('/admin/student/update{id}', [AdminController::class, "update_student"])->name("update_student");

    Route::get('/admin/student/delete{id}', [AdminController::class, "delete_student"])->name("delete_student");
   
    Route::get('/admin/students/view', [StudentController::class, "view"])->name("view");

    Route::post('/import', [StudentController::class, "import"]);

    
});

Route::middleware(['logoutcheck', 'manageStudentAccess'])->group(function(){

    Route::get('/student', [LoginController::class, "student_home"])->name("student"); 
});

Route::middleware(['logoutcheck', 'manageInchargeAccess'])->group(function(){
    
    Route::get('/incharge/BSBA', [LoginController::class, "incharge_home_BSBA"])->name("incharge_BSBA");
    Route::get('/incharge/BSBA/1st-Year', [LoginController::class, "incharge_BSBA_first_year"])->name("incharge_BSBA_first_year");
    Route::get('/incharge/BSBA/2nd-Year', [LoginController::class, "incharge_BSBA_second_year"])->name("incharge_BSBA_second_year");
    Route::get('/incharge/BSBA/3rd-Year', [LoginController::class, "incharge_BSBA_third_year"])->name("incharge_BSBA_third_year");
    Route::get('/incharge/BSBA/4th-Year', [LoginController::class, "incharge_BSBA_forth_year"])->name("incharge_BSBA_forth_year");

    Route::get('/incharge/BSED', [LoginController::class, "incharge_home_BSED"])->name("incharge_BSED");
    Route::get('/incharge/BSED/1st-Year', [LoginController::class, "incharge_BSED_first_year"])->name("incharge_BSED_first_year");
    Route::get('/incharge/BSED/2nd-Year', [LoginController::class, "incharge_BSED_second_year"])->name("incharge_BSED_second_year");
    Route::get('/incharge/BSED/3rd-Year', [LoginController::class, "incharge_BSED_third_year"])->name("incharge_BSED_third_year");
    Route::get('/incharge/BSED/4th-Year', [LoginController::class, "incharge_BSED_forth_year"])->name("incharge_BSED_forth_year");

    Route::get('/incharge/BEED', [LoginController::class, "incharge_home_BEED"])->name("incharge_BEED");
    Route::get('/incharge/BEED/1st-Year', [LoginController::class, "incharge_BEED_first_year"])->name("incharge_BEED_first_year");
    Route::get('/incharge/BEED/2nd-Year', [LoginController::class, "incharge_BEED_second_year"])->name("incharge_BEED_second_year");
    Route::get('/incharge/BEED/3rd-Year', [LoginController::class, "incharge_BEED_third_year"])->name("incharge_BEED_third_year");
    Route::get('/incharge/BEED/4th-Year', [LoginController::class, "incharge_BEED_forth_year"])->name("incharge_BEED_forth_year");

    Route::get('/incharge/BSSW', [LoginController::class, "incharge_home_BSSW"])->name("incharge_BSSW");
    Route::get('/incharge/BSSW/1st-Year', [LoginController::class, "incharge_BSSW_first_year"])->name("incharge_BSSW_first_year");
    Route::get('/incharge/BSSW/2nd-Year', [LoginController::class, "incharge_BSSW_second_year"])->name("incharge_BSSW_second_year");
    Route::get('/incharge/BSSW/3rd-Year', [LoginController::class, "incharge_BSSW_third_year"])->name("incharge_BSSW_third_year");
    Route::get('/incharge/BSSW/4th-Year', [LoginController::class, "incharge_BSSW_forth_year"])->name("incharge_BSSW_forth_year");

    Route::get('/incharge/BSHM', [LoginController::class, "incharge_home_BSHM"])->name("incharge_BSHM");
    Route::get('/incharge/BSHM/1st-Year', [LoginController::class, "incharge_BSHM_first_year"])->name("incharge_BSHM_first_year");
    Route::get('/incharge/BSHM/2nd-Year', [LoginController::class, "incharge_BSHM_second_year"])->name("incharge_BSHM_second_year");
    Route::get('/incharge/BSHM/3rd-Year', [LoginController::class, "incharge_BSHM_third_year"])->name("incharge_BSHM_third_year");
    Route::get('/incharge/BSHM/4th-Year', [LoginController::class, "incharge_BSHM_forth_year"])->name("incharge_BSHM_forth_year");

    Route::get('/incharge/BSIT', [LoginController::class, "incharge_home_BSIT"])->name("incharge_BSIT");
    Route::get('/incharge/BSIT/1st-Year', [LoginController::class, "incharge_BSIT_first_year"])->name("incharge_BSIT_first_year");
    Route::get('/incharge/BSIT/2nd-Year', [LoginController::class, "incharge_BSIT_second_year"])->name("incharge_BSIT_second_year");
    Route::get('/incharge/BSIT/3rd-Year', [LoginController::class, "incharge_BSIT_third_year"])->name("incharge_BSIT_third_year");
    Route::get('/incharge/BSIT/4th-Year', [LoginController::class, "incharge_BSIT_forth_year"])->name("incharge_BSIT_forth_year");
    
    Route::get('/incharge', [LoginController::class, "incharge_home"])->name("incharge"); 


    Route::get('/edit-status/{id}', [InchargeController::class, "edit_status"])->name("edit_status");
    Route::get('/update-status/{departmentname}/{id}', [InchargeController::class, "update_notes"])->name("update_notes");
    Route::post('/update/notes{id}', [InchargeController::class, "edit_notes"])->name("edit_notes");
    Route::get('/incharge/1st-Year', [LoginController::class, "incharge_home_first"])->name("incharge_home_first");
    Route::get('/incharge/2nd-Year', [LoginController::class, "incharge_home_second"])->name("incharge_home_second");
    Route::get('/incharge/3rd-Year', [LoginController::class, "incharge_home_third"])->name("incharge_home_third");
    Route::get('/incharge/4th-Year', [LoginController::class, "incharge_home_forth"])->name("incharge_home_forth");

    Route::post('/edits/note/{departmentname}', [InchargeController::class, "studentStatus"])->name("studentStatus");

    
});

Route::middleware(['logoutcheck', 'manageAssistantAccess'])->group(function(){

    Route::get('/assistant-incharge/BSBA', [LoginController::class, "assistant_incharge_home_BSBA"])->name("assistant_incharge_BSBA");
    Route::get('/assistant-incharge/BSBA/1st-Year', [LoginController::class, "assistant_incharge_BSBA_first_year"])->name("assistant_incharge_BSBA_first_year");
    Route::get('/assistant-incharge/BSBA/2nd-Year', [LoginController::class, "assistant_incharge_BSBA_second_year"])->name("assistant_incharge_BSBA_second_year");
    Route::get('/assistant-incharge/BSBA/3rd-Year', [LoginController::class, "assistant_incharge_BSBA_third_year"])->name("assistant_incharge_BSBA_third_year");
    Route::get('/assistant-incharge/BSBA/4th-Year', [LoginController::class, "assistant_incharge_BSBA_forth_year"])->name("assistant_incharge_BSBA_forth_year");

    Route::get('/assistant-incharge/BSED', [LoginController::class, "assistant_incharge_home_BSED"])->name("assistant_incharge_BSED");
    Route::get('/assistant-incharge/BSED/1st-Year', [LoginController::class, "assistant_incharge_BSED_first_year"])->name("assistant_incharge_BSED_first_year");
    Route::get('/assistant-incharge/BSED/2nd-Year', [LoginController::class, "assistant_incharge_BSED_second_year"])->name("assistant_incharge_BSED_second_year");
    Route::get('/assistant-incharge/BSED/3rd-Year', [LoginController::class, "assistant_incharge_BSED_third_year"])->name("assistant_incharge_BSED_third_year");
    Route::get('/assistant-incharge/BSED/4th-Year', [LoginController::class, "assistant_incharge_BSED_forth_year"])->name("assistant_incharge_BSED_forth_year");

    Route::get('/assistant-incharge/BEED', [LoginController::class, "assistant_incharge_home_BEED"])->name("assistant_incharge_BEED");
    Route::get('/assistant-incharge/BEED/1st-Year', [LoginController::class, "assistant_incharge_BEED_first_year"])->name("assistant_incharge_BEED_first_year");
    Route::get('/assistant-incharge/BEED/2nd-Year', [LoginController::class, "assistant_incharge_BEED_second_year"])->name("assistant_incharge_BEED_second_year");
    Route::get('/assistant-incharge/BEED/3rd-Year', [LoginController::class, "assistant_incharge_BEED_third_year"])->name("assistant_incharge_BEED_third_year");
    Route::get('/assistant-incharge/BEED/4th-Year', [LoginController::class, "assistant_incharge_BEED_forth_year"])->name("assistant_incharge_BEED_forth_year");

    Route::get('/assistant-incharge/BSSW', [LoginController::class, "assistant_incharge_home_BSSW"])->name("assistant_incharge_BSSW");
    Route::get('/assistant-incharge/BSSW/1st-Year', [LoginController::class, "assistant_incharge_BSSW_first_year"])->name("assistant_incharge_BSSW_first_year");
    Route::get('/assistant-incharge/BSSW/2nd-Year', [LoginController::class, "assistant_incharge_BSSW_second_year"])->name("assistant_incharge_BSSW_second_year");
    Route::get('/assistant-incharge/BSSW/3rd-Year', [LoginController::class, "assistant_incharge_BSSW_third_year"])->name("assistant_incharge_BSSW_third_year");
    Route::get('/assistant-incharge/BSSW/4th-Year', [LoginController::class, "assistant_incharge_BSSW_forth_year"])->name("assistant_incharge_BSSW_forth_year");

    Route::get('/assistant-incharge/BSHM', [LoginController::class, "assistant_incharge_home_BSHM"])->name("assistant_incharge_BSHM");
    Route::get('/assistant-incharge/BSHM/1st-Year', [LoginController::class, "assistant_incharge_BSHM_first_year"])->name("assistant_incharge_BSHM_first_year");
    Route::get('/assistant-incharge/BSHM/2nd-Year', [LoginController::class, "assistant_incharge_BSHM_second_year"])->name("assistant_incharge_BSHM_second_year");
    Route::get('/assistant-incharge/BSHM/3rd-Year', [LoginController::class, "assistant_incharge_BSHM_third_year"])->name("assistant_incharge_BSHM_third_year");
    Route::get('/assistant-incharge/BSHM/4th-Year', [LoginController::class, "assistant_incharge_BSHM_forth_year"])->name("assistant_incharge_BSHM_forth_year");

    Route::get('/assistant-incharge/BSIT', [LoginController::class, "assistant_incharge_home_BSIT"])->name("assistant_incharge_BSIT");
    Route::get('/assistant-incharge/BSIT/1st-Year', [LoginController::class, "assistant_incharge_BSIT_first_year"])->name("assistant_incharge_BSIT_first_year");
    Route::get('/assistant-incharge/BSIT/2nd-Year', [LoginController::class, "assistant_incharge_BSIT_second_year"])->name("assistant_incharge_BSIT_second_year");
    Route::get('/assistant-incharge/BSIT/3rd-Year', [LoginController::class, "assistant_incharge_BSIT_third_year"])->name("assistant_incharge_BSIT_third_year");
    Route::get('/assistant-incharge/BSIT/4th-Year', [LoginController::class, "assistant_incharge_BSIT_forth_year"])->name("assistant_incharge_BSIT_forth_year");
    
    Route::get('/assistant-incharge', [LoginController::class, "assistant_incharge_home"])->name("assistant_incharge"); 
    Route::get('/assistant-incharge/1st-Year', [LoginController::class, "assistant_incharge_home_first"])->name("assistant_incharge_home_first");
    Route::get('/assistant-incharge/2nd-Year', [LoginController::class, "assistant_incharge_home_second"])->name("assistant_incharge_home_second");
    Route::get('/assistant-incharge/3rd-Year', [LoginController::class, "assistant_incharge_home_third"])->name("assistant_incharge_home_third");
    Route::get('/assistant-incharge/4th-Year', [LoginController::class, "assistant_incharge_home_forth"])->name("assistant_incharge_home_forth");
});



Route::get('/logout', function(Request $request)
{
    $request->session()->flush();
    Auth::logout();
    return redirect()->route('front');
});    