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

        $mytime = Carbon::now();
        if($status == "Pending"){
            $affected = DB::table('lists')
                ->where('id', $list_id)
                ->update([
                    'status' => "Cleared",
                    'date_cleared' => $mytime,
                    'notes' => ""
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
        ->where('id', $list_id)
        ->update([
            'notes' => $request->notes
            ]);
            
        return redirect()->route('incharge');

    }

    
}
