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
        return view ('pages.admin');
    }

    public function incharge_home(){
        
        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        return view ('pages.incharge',['show' => $show]);
    }

    public function student_home(){
        
        $show = DB::table('students')
        ->leftjoin('lists', 'students.id', '=', 'lists.student_id')
        ->leftjoin('departments', 'lists.department_id', '=', 'departments.id')
        ->get();
        return view ('pages.student',['show' => $show]);
    }    
}


            //    INCHARGE CODE 
            // $dpname = DB::table('departments')->where('incharge_id', $userid)->value('department_name');
            // $departmentid = DB::table('departments')->where('incharge_id', $userid)->value('id');
            // $user = Incharge::find($userid);
            // $list = DB::table('lists')->get();;
            // $show = DB::table('students')
            // ->join('lists', function ($join) {
            //     $join->on('students.id', '=', 'lists.student_id');
            // })
            // ->get();
            // return view ('pages.incharge',['show' => $show])->with('dpname',$dpname)->with('departmentid',$departmentid);

            // STUDENT CODE
            // $show = DB::table('lists')
            // ->leftjoin('departments', 'lists.department_id', '=', 'departments.id')
            // ->leftjoin('incharge', 'departments.incharge_id', '=', 'incharge.id')
            // ->leftjoin('students', 'students.id', '=', 'lists.student_id')
            // ->get();

            // return view ('pages.student',['show' => $show])->with('userid',$userid);


            // ADMIN CODE
            // $show = DB::table('lists')
            // ->leftjoin('departments', 'lists.department_id', '=', 'departments.id')
            // ->leftjoin('incharge', 'departments.incharge_id', '=', 'incharge.id')
            // ->leftjoin('students', 'students.id', '=', 'lists.student_id')
            // ->get();

            // return redirect()->route('home', ['show' => $show])->with('userid',$userid);