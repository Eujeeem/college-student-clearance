<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\Incharge;
use App\Models\Lists;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){

        $credentials = $request->only('username','password'); 
        $username = $request->username;
        $users = DB::table('users')->where('username', $username)->get();

        $type;
        $student_id;
        $admin_id;
        $incharge_id;

        foreach($users as $user){
            $type = $user->type;
            $student_id = $user->student_id;
            $admin_id = $user->admin_id;
            $incharge_id = $user->incharge_id;           
        }
        if (Auth::attempt($credentials)){
            $request->session()->put('type', $type);
            
            if ($type == "student"){
                $request->session()->put('student_id', $student_id);           
                return redirect()->route('student');
            
            } elseif ($type == "incharge"){  
                $request->session()->put('incharge_id', $incharge_id);     
                return redirect()->route('incharge');                 
                                
            } elseif ($type == "admin"){
                
                return redirect()->route('admin');
            }
            elseif ($type == "assistant"){
                $request->session()->put('incharge_id', $incharge_id);      
                return redirect()->route('assistant_incharge');
            }
        } 

        
        return back()->withErrors([
            "Invalid Login!"
        ]);

    }

    public function admin_home(){

        $department = Department::count();
        $student = Student::count();
        // $incharge = Incharge::count();
        $users = DB::table('users')->where('type', '=', 'assistant')->count();
        $incharge = DB::table('users')->where('type', '=', 'incharge')->count();

        
        return view ('pages.admin')->with("department",$department)->with("student",$student)->with("incharge", $incharge)->with("users", $users);
    }

    public function incharge_home(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge',['show' => $show]);
    }
    public function incharge_home_first(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.year_first',['show' => $show]);
    }
    public function incharge_home_second(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.year_second',['show' => $show]);
    }
    public function incharge_home_third(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.year_third',['show' => $show]);
    }
    public function incharge_home_forth(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.year_fourth',['show' => $show]);
    }

    public function incharge_home_BSIT(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSIT',['show' => $show]);
    }

    public function incharge_BSIT_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSIT_first_year',['show' => $show]);
    }

    public function incharge_BSIT_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSIT_second_year',['show' => $show]);
    }

    public function incharge_BSIT_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSIT_third_year',['show' => $show]);
    }

    public function incharge_BSIT_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSIT_forth_year',['show' => $show]);
    }

    public function incharge_home_BSHM(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSHM',['show' => $show]);
    }

    public function incharge_BSHM_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSHM_first_year',['show' => $show]);
    }

    public function incharge_BSHM_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSHM_second_year',['show' => $show]);
    }

    public function incharge_BSHM_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSHM_third_year',['show' => $show]);
    }

    public function incharge_BSHM_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSHM_forth_year',['show' => $show]);
    }


    public function incharge_home_BSSW(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSSW',['show' => $show]);
    }
    public function incharge_BSSW_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSSW_first_year',['show' => $show]);
    }

    public function incharge_BSSW_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSSW_second_year',['show' => $show]);
    }

    public function incharge_BSSW_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSSW_third_year',['show' => $show]);
    }

    public function incharge_BSSW_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSSW_forth_year',['show' => $show]);
    }
    public function incharge_home_BSED(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSED',['show' => $show]);
    }
    public function incharge_BSED_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSED_first_year',['show' => $show]);
    }

    public function incharge_BSED_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSED_second_year',['show' => $show]);
    }

    public function incharge_BSED_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSED_third_year',['show' => $show]);
    }

    public function incharge_BSED_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSED_forth_year',['show' => $show]);
    }
    public function incharge_home_BEED(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BEED',['show' => $show]);
    }

    public function incharge_BEED_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BEED_first_year',['show' => $show]);
    }

    public function incharge_BEED_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BEED_second_year',['show' => $show]);
    }

    public function incharge_BEED_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BEED_third_year',['show' => $show]);
    }

    public function incharge_BEED_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BEED_forth_year',['show' => $show]);
    }

    public function incharge_home_BSBA(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSBA',['show' => $show]);
    }

    public function incharge_BSBA_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSBA_first_year',['show' => $show]);
    }

    public function incharge_BSBA_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSBA_second_year',['show' => $show]);
    }

    public function incharge_BSBA_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSBA_third_year',['show' => $show]);
    }

    public function incharge_BSBA_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Cleared')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.incharge_BSBA_forth_year',['show' => $show]);
    }
 
    public function assistant_incharge_home(){

        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge',['show' => $show]);
    }
    public function assistant_incharge_home_first(){
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_year_first',['show' => $show]);
    }
    public function assistant_incharge_home_second(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_year_second',['show' => $show]);
    }
    public function assistant_incharge_home_third(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_year_third',['show' => $show]);
    }
    public function assistant_incharge_home_forth(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_year_fourth',['show' => $show]);
    }

    public function assistant_incharge_home_BSIT(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSIT',['show' => $show]);
    }

    public function assistant_incharge_BSIT_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSIT_first_year',['show' => $show]);
    }

    public function assistant_incharge_BSIT_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSIT_second_year',['show' => $show]);
    }

    public function assistant_incharge_BSIT_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSIT_third_year',['show' => $show]);
    }

    public function assistant_incharge_BSIT_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSIT_forth_year',['show' => $show]);
    }

    public function assistant_incharge_home_BSHM(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSHM',['show' => $show]);
    }

    public function assistant_incharge_BSHM_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSHM_first_year',['show' => $show]);
    }

    public function assistant_incharge_BSHM_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSHM_second_year',['show' => $show]);
    }

    public function assistant_incharge_BSHM_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSHM_third_year',['show' => $show]);
    }

    public function assistant_incharge_BSHM_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSHM_forth_year',['show' => $show]);
    }


    public function assistant_incharge_home_BSSW(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSSW',['show' => $show]);
    }
    public function assistant_incharge_BSSW_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSSW_first_year',['show' => $show]);
    }

    public function assistant_incharge_BSSW_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSSW_second_year',['show' => $show]);
    }

    public function assistant_incharge_BSSW_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSSW_third_year',['show' => $show]);
    }

    public function assistant_incharge_BSSW_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSSW_forth_year',['show' => $show]);
    }
    public function assistant_incharge_home_BSED(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSED',['show' => $show]);
    }
    public function assistant_incharge_BSED_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSED_first_year',['show' => $show]);
    }

    public function assistant_incharge_BSED_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSED_second_year',['show' => $show]);
    }

    public function assistant_incharge_BSED_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSED_third_year',['show' => $show]);
    }

    public function assistant_incharge_BSED_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSED_forth_year',['show' => $show]);
    }
    public function assistant_incharge_home_BEED(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BEED',['show' => $show]);
    }

    public function assistant_incharge_BEED_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BEED_first_year',['show' => $show]);
    }

    public function assistant_incharge_BEED_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BEED_second_year',['show' => $show]);
    }

    public function assistant_incharge_BEED_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BEED_third_year',['show' => $show]);
    }

    public function assistant_incharge_BEED_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BEED_forth_year',['show' => $show]);
    }

    public function assistant_incharge_home_BSBA(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSBA',['show' => $show]);
    }

    public function assistant_incharge_BSBA_first_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSBA_first_year',['show' => $show]);
    }

    public function assistant_incharge_BSBA_second_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSBA_second_year',['show' => $show]);
    }

    public function assistant_incharge_BSBA_third_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSBA_third_year',['show' => $show]);
    }

    public function assistant_incharge_BSBA_forth_year(){
        
        $year = date("Y");
        $previousyear = $year -1;

        $sy = $previousyear. "-". $year;
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->where('lists.year', $sy)
        ->where('lists.status', 'Pending')
        ->orWhere('lists.status', 'Pre-Approved')
        ->get();
        return view ('pages.assistant_incharge_BSBA_forth_year',['show' => $show]);
    }
    
    public function student_home(){
        
        $show = DB::table('students')
        ->leftjoin('lists', 'students.id', '=', 'lists.student_id')
        ->leftjoin('departments', 'lists.department_id', '=', 'departments.id')
        ->get();
        return view ('pages.student',['show' => $show]);
    }    

    public function change_password($id){
        
        $users = DB::table('users')->where('username', $id)->get();
        return view ('Modals.change_password',['users' => $users]);
    }   

    public function update_password(Request $request, $id){
        $credentials = $request->only('username','oldpassword');
        $newpassword = $request->newpassword;
        $oldpass = $request->oldpassword;
        $newpass = Hash::make($newpassword);

        $user = User::where('username', $id)->first();
        $pass = $user->password;
        if (Hash::Check($oldpass, $pass)){
            
            $user->password = $newpass;
            $user->save();

            return redirect('/logout');
            
            // if ($user->type == "student"){      
            //     return redirect()->route('student');
            
            // } elseif ($user->type == "incharge"){      
            //     return redirect()->route('incharge');                 
                                
            // } elseif ($user->type == "admin"){
                
            //     return redirect()->route('admin');
            // }
            // elseif ($user->type == "assistant"){     
            //     return redirect()->route('assistant_incharge');
            // }

        } 

        
        return back()->withErrors([
            "Invalid Password!"
        ]);    

    }   

    public function change_password_student($id){
        
        $users = DB::table('users')->where('username', $id)->get();
        return view ('Modals.change_password_student',['users' => $users]);
    }   

    public function update_password_student(Request $request, $id){
        $credentials = $request->only('username','oldpassword');
        $newpassword = $request->newpassword;
        $oldpass = $request->oldpassword;
        $newpass = Hash::make($newpassword);

        $user = User::where('username', $id)->first();
        $pass = $user->password;
        if (Hash::Check($oldpass, $pass)){
            
            $user->password = $newpass;
            $user->save();

            return redirect('/logout');
            
            // if ($user->type == "student"){      
            //     return redirect()->route('student');
            
            // } elseif ($user->type == "incharge"){      
            //     return redirect()->route('incharge');                 
                                
            // } elseif ($user->type == "admin"){
                
            //     return redirect()->route('admin');
            // }
            // elseif ($user->type == "assistant"){     
            //     return redirect()->route('assistant_incharge');
            // }

        } 

        
        return back()->withErrors([
            "Invalid Password!"
        ]);    

    }
}

