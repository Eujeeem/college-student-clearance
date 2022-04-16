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

        }
        return back()->withErrors([
            "Invalid Login!"
        ]);

    }

    public function admin_home(){

        $department = Department::count();
        $student = Student::count();
        $incharge = Incharge::count();
        $users = DB::table('users')->where('type', '=', 'assistant')->count();

        
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
        ->get();
        return view ('pages.incharge',['show' => $show]);
    }
    public function incharge_home_first(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.year_first',['show' => $show]);
    }
    public function incharge_home_second(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.year_second',['show' => $show]);
    }
    public function incharge_home_third(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.year_third',['show' => $show]);
    }
    public function incharge_home_forth(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.year_fourth',['show' => $show]);
    }

    public function incharge_home_BSIT(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        // ->where('students.course_name', 'Bachelor of Science in Information Technology')
        ->get();
        return view ('pages.incharge_BSIT',['show' => $show]);
    }

    public function incharge_BSIT_first_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSIT_first_year',['show' => $show]);
    }

    public function incharge_BSIT_second_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSIT_second_year',['show' => $show]);
    }

    public function incharge_BSIT_third_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSIT_third_year',['show' => $show]);
    }

    public function incharge_BSIT_forth_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSIT_forth_year',['show' => $show]);
    }

    public function incharge_home_BSHM(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSHM',['show' => $show]);
    }

    public function incharge_BSHM_first_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSHM_first_year',['show' => $show]);
    }

    public function incharge_BSHM_second_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSHM_second_year',['show' => $show]);
    }

    public function incharge_BSHM_third_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSHM_third_year',['show' => $show]);
    }

    public function incharge_BSHM_forth_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSHM_forth_year',['show' => $show]);
    }


    public function incharge_home_BSSW(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        // ->where('students.course_name', 'Bachelor of Science in Social Work')
        ->get();
        return view ('pages.incharge_BSSW',['show' => $show]);
    }
    public function incharge_BSSW_first_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSSW_first_year',['show' => $show]);
    }

    public function incharge_BSSW_second_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSSW_second_year',['show' => $show]);
    }

    public function incharge_BSSW_third_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSSW_third_year',['show' => $show]);
    }

    public function incharge_BSSW_forth_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSSW_forth_year',['show' => $show]);
    }
    public function incharge_home_BSED(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        // ->where('students.course_name', 'Bachelor in Secondary Education')
        ->get();
        return view ('pages.incharge_BSED',['show' => $show]);
    }
    public function incharge_BSED_first_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSED_first_year',['show' => $show]);
    }

    public function incharge_BSED_second_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSED_second_year',['show' => $show]);
    }

    public function incharge_BSED_third_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSED_third_year',['show' => $show]);
    }

    public function incharge_BSED_forth_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSED_forth_year',['show' => $show]);
    }
    public function incharge_home_BEED(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        // ->where('students.course_name', 'Bachelor in Elementary Education')
        ->get();
        return view ('pages.incharge_BEED',['show' => $show]);
    }

    public function incharge_BEED_first_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BEED_first_year',['show' => $show]);
    }

    public function incharge_BEED_second_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BEED_second_year',['show' => $show]);
    }

    public function incharge_BEED_third_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BEED_third_year',['show' => $show]);
    }

    public function incharge_BEED_forth_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BEED_forth_year',['show' => $show]);
    }

    public function incharge_home_BSBA(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        // ->where('students.course_name', 'Bachelor of Science in Business Administrator')
        ->get();
        return view ('pages.incharge_BSBA',['show' => $show]);
    }

    public function incharge_BSBA_first_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSBA_first_year',['show' => $show]);
    }

    public function incharge_BSBA_second_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSBA_second_year',['show' => $show]);
    }

    public function incharge_BSBA_third_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSBA_third_year',['show' => $show]);
    }

    public function incharge_BSBA_forth_year(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge_BSBA_forth_year',['show' => $show]);
    }
    
    public function student_home(){
        
        $show = DB::table('students')
        ->leftjoin('lists', 'students.id', '=', 'lists.student_id')
        ->leftjoin('departments', 'lists.department_id', '=', 'departments.id')
        ->get();
        return view ('pages.student',['show' => $show]);
    }    
}

