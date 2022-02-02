<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;


class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'student_fname' =>$row['0'],
            'student_lname' =>$row['1'],
            'student_mname' =>$row['2'],
            'course_name' =>$row['3'],
            'student_year' =>$row['4'],
            'student_contactnumber' =>$row['5'],
            

        ]);
    }
}
