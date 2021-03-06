<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\Incharge;
use App\Models\Lists;
use App\Models\Student;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function students_home(){

        $count = DB::table('departments')->count();
        $show = DB::table('students')->get();        

        return view('pages.admin_students', ['show' => $show])->with("count",$count);
    }
    public function departments_home(){
        $show = DB::table('incharge')
        ->rightjoin('users', 'incharge.id', '=', 'users.incharge_id')
        ->rightjoin('departments', 'incharge.id', '=', 'departments.incharge_id')
        ->get();
                
        $user  = DB::table('users')
        ->rightjoin('incharge', 'incharge.id', '=', 'users.incharge_id')
        ->rightjoin('departments', 'departments.id', '=', 'users.incharge_id')
        ->get();       

        $incharge = Incharge::all(); 
        return view('pages.admin_department', ['show' => $show])->with("incharge",$incharge)->with("user",$user);
    }    
    public function incharge_home(){
        $show = DB::table('departments')
        ->rightjoin('incharge', 'incharge.id', '=', 'departments.incharge_id')
        ->get();  

        $department = Department::all();

        $user  = DB::table('departments')
        ->rightjoin('incharge', 'incharge.id', '=', 'departments.incharge_id')
        ->rightjoin('users', 'incharge.id', '=', 'users.incharge_id')
        ->get();
        return view('pages.admin_incharge', ['show' => $show])->with("department",$department)->with("user",$user);
    } 

    public function assistant_home(){
        $show = DB::table('departments')
        ->rightjoin('incharge', 'incharge.id', '=', 'departments.incharge_id')
        ->get();  

        $department = Department::all();

        $user  = DB::table('departments')
        ->rightjoin('incharge', 'incharge.id', '=', 'departments.incharge_id')
        ->rightjoin('users', 'incharge.id', '=', 'users.incharge_id')
        ->get();
        return view('pages.admin_assistant', ['show' => $show])->with("department",$department)->with("user",$user);
    } 

    public function add_new_department(Request $request){

        $incharge = Incharge::all();

        $assistant  = DB::table('departments')
        ->rightjoin('incharge', 'incharge.id', '=', 'departments.incharge_id')
        ->rightjoin('users', 'incharge.id', '=', 'users.incharge_id')
        ->get();
    	return view("Modals.add_department")->with("incharge",$incharge)->with("assistant",$assistant);       


    }   
    public function add_department(Request $request){
        $department = new Department();
        $department->department_name = $request->department;
        $department->incharge_id = $request->incharge;
        $department->assistant_incharge = $request->assistant;
        $department->save();
        return redirect()->route('admin_departments');

        // $client = new Client();
        // $client->client_name = $request->clientname;
        // $client->assoc_id = $request->assoc;
        // $client->client_contact = $request->contact;
        // $client->TIN = $request->tin;
        // $client->OCN = $request->ocn;
        // $client->registration_date = $request->regdate;
        // $client->mode_of_payment = $request->mop;
        // $client->tradename = $request->tname;
        // $client->business_line = $request->linebus;
        // $client->registration_address = $request->regad;
        // $client->save();
        // $id = $client->id;

        // $newtax = $request->tax;

        // foreach($newtax as $new){
        //     $taxes = new Tax();
        //     $taxes->tax_name = $new;
        //     $taxes->client_id = $id;
        //     $taxes->save();
        // }
        
        // return redirect()->route('clients.index');






    }

    public function edit_department(Request $request, $id){

    	$lists = Department::find($id);
        $incharge = Incharge::all();

        // Select id From incharge Where NOT EXISTS ( select incharge_id from departments Where incharge.id = departments.incharge_id )

        $incharge = Incharge::all();
        

        $sorter = DB::table('incharge')->whereNotExists(function($query)
        {
            $query->select(DB::raw(1))
                  ->from('departments')
                  ->whereRaw('incharge.id = departments.incharge_id');
        })
        ->get();

        $sorters = DB::table('incharge')->whereNotExists(function($query)
        {
            $query->select(DB::raw(1))
                  ->from('departments')
                  ->whereRaw('incharge.id = departments.assistant_incharge');
        })
        ->get();

        $user  = DB::table('departments')
        ->rightjoin('incharge', 'incharge.id', '=', 'departments.incharge_id')
        ->rightjoin('users', 'incharge.id', '=', 'users.incharge_id')
        ->get();
    	return view("Modals.edit_department")->with("lists",$lists)->with("incharge",$incharge)->with("user",$user)->with("sorter",$sorter)->with("sorters",$sorters);       

    }

    public function update_department(Request $request, $id){
    	$department = Department::find($id);
        $department->department_name = $request->department;
        $department->incharge_id = $request->incharge;
        $department->assistant_incharge = $request->assistant;
        $department->save();
    	return redirect()->route('admin_departments');       

    }    

    public function delete_department($id){
        $department = Department::find($id);
        department::destroy($id);
        return redirect()->route('admin_departments');  
    }

    public function add_new_incharge(Request $request){
        return view("Modals.add_incharge");

    }  

    public function add_incharge(Request $request){

        $incharge = new Incharge();

        $incharge->incharge_name = $request->incharge;
        $incharge->save();

        $pass = Hash::make($incharge->id);
        $user = new User();
        $user->username = $incharge->id;
        $user->password = $pass;
        $user->incharge_id = $incharge->id;
        $user->type= $request->position;
        $user->save();

        if($request->position == "incharge")
        return redirect()->route('admin_incharge');

        elseif($request->position == "assistant"){
            return redirect()->route('admin_assistant');

        }
    }  
    
    public function edit_incharge(Request $request, $id){

    	$lists = Incharge::find($id);
    	return view("Modals.edit_incharge")->with("lists",$lists);       

    }

    public function delete_incharge($id){
        $incharge = Incharge::find($id);
        incharge::destroy($id);
        return redirect()->route('admin_incharge');  
    }

    public function update_incharge(Request $request, $id){
    	$incharge = Incharge::find($id);
        $incharge->incharge_name = $request->incharge;
        $incharge->save();
    	return redirect()->route('admin_incharge');       

    }
    
    public function add_new_student(Request $request){
        return view("Modals.add_student");

    }   


    public function add_student(Request $request){
        $student = new Student();
        $student->student_fname = $request->fname;
        $student->student_lname = $request->lname;
        $student->student_mname = $request->mname;
        $student->course_name = $request->course_name;
        $student->student_year = $request->year;
        $student->student_contactnumber	 = $request->contactnumber;
        $student->save();
        $student->id;
        
        $department = DB::table('departments')->get();

        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;

        foreach($department as $departments){
            $list = new Lists();
            $list->status = "Pending";
            $list->year = $sy;
            $list->student_id = $student->id;
            $list->department_id = $departments->id;
            $list->save();       
        }



        $pass = Hash::make($student->id);
        $user = new User();
        $user->username = $student->id;
        $user->password = $pass;
        $user->student_id = $student->id;
        $user->type="student";
        $user->save();
        return redirect()->route('admin_students');
    }

    public function edit_student( $id){
    	$lists = Student::find($id);
    	return view("Modals.edit_student")->with("lists",$lists);        

    }

    public function update_student(Request $request, $id){
    	$student = Student::find($id);
        $student->student_fname = $request->fname;
        $student->student_lname = $request->lname;
        $student->student_mname = $request->mname;
        $student->course_name = $request->course_name;
        $student->student_year = $request->year;
        $student->student_contactnumber	 = $request->contactnumber;
        $student->save();
    	return redirect()->route('admin_students');       

    }

    public function delete_student($id){
        $student = Student::find($id);
        student::destroy($id);
        return redirect()->route('admin_students');  
    }

    public function reset_user( $id){
        $newpass = Hash::make($id);
    	$user = User::where('username', $id)->first();
        $user->password = $newpass;
        $user->save();

        return redirect()->back();
        

    }
}













        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 1;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 2;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 3;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 4;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 5;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 6;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 7;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 8;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 9;
        // $list->save();
        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 10;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 11;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 12;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 13;
        // $list->save();

        // $list = new Lists();
        // $list->status = "Pending";
        // $list->year = "2021-2022";
        // $list->student_id = $student->id;
        // $list->department_id = 14;
        // $list->save();