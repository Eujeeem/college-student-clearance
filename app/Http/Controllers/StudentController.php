<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
class StudentController extends Controller
{
   public function view()
   {
       return view("import");

   }

   public function import()
   {
       Excel::Import(new StudentImport, request()->file('file'));
       return redirect()->route('admin_students');
   }
}
