<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\Incharge;
use App\Models\Lists;
use App\Models\Student;
use App\Models\user;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class InchargeController extends Controller
{

    
    public function edit_status($id){
        $student_id = $id;
        $status;
        $department_id;
        $type = Session::get('incharge_id');
        $users = DB::table('departments')
            ->rightjoin('lists', 'lists.department_id', '=', 'departments.id')
            ->where([
                ['lists.student_id', '=', $id],
                ['departments.incharge_id', '=', $type]
            ])->get();

        foreach($users as $user){
            $status = $user->status;
            $list_id = $user->id;
        }    

        $mytime = Carbon::today()->format('Y-m-d');
        if($status == "Pending"){
            $affected = DB::table('lists')
                ->where('id', $list_id)
                ->update([
                    'status' => "Cleared",
                    'date_cleared' => $mytime
                    ]);
            return redirect()->route('incharge');        
        } elseif($status == "Cleared"){
            $affected = DB::table('lists')
                ->where('id', $list_id)
                ->update([
                    'status' => "Pending",
                    'date_cleared' => NULL
                    ]);
            return redirect()->route('incharge');
        }           

    }

    public function edit_notes(Request $request, $id){
        
        $type = Session::get('incharge_id');
        $users = DB::table('departments')
            ->rightjoin('lists', 'lists.department_id', '=', 'departments.id')
            ->where([
                ['lists.student_id', '=', $id],
                ['departments.incharge_id', '=', $type]
            ])->get();

        foreach($users as $user){
            
            $list_id = $user->id;
        }
        
        $affected = DB::table('lists')
        ->where('id', $id)
        ->update([
            'notes' => $request->notes
            ]);
            
        return redirect()->route('incharge');

    }


    public function update_notes( $departmentname, $id){

    	// $lists = Lists::findOrFail($id);

        $department = Department::where('department_name','=', $departmentname)->firstOrFail();
        $lists = Lists::where([['student_id', '=', $id], ['department_id', '=', $department->id]])->firstOrFail();
        $student = Student::find($id);

        

        $show = DB::table('lists')
        ->join('departments', 'lists.department_id', '=', 'departments.id')
        ->join('incharge', 'departments.incharge_id', '=', 'incharge.id')
        ->join('students', 'students.id', '=', 'lists.student_id')
        ->get();
        
    	return view("Modals.edit_notes")->with("lists",$lists)->with("show",$show)->with("student", $student);       

        // return $department->id;

    }

    public function studentStatus(Request $request,$departmentname ){

        $ids = $request->ids;
        $mytime = Carbon::today()->format('Y-m-d');
        $department = Department::where('department_name','=', $departmentname)->firstOrFail();
        $d = 0;

        if($ids==true){
        for ($i=0; $i < count($ids); $i++) { 
            
            $lists = Lists::where([['student_id', '=', $ids[$i]], ['department_id', '=', $department->id]])->firstOrFail();
            $lists->status = "Cleared";
            $lists->date_cleared = $mytime;
            $lists->save();

        }
        
        return redirect()->back();
        }
        elseif($ids==null){
            return redirect()->back();

        }
    }

    
}
