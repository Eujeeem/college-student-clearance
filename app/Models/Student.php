<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";

    protected $fillable = ['student_fname','student_lname','student_mname','course_name','student_year','student_contactnumber'];
    public function lists(){

        return $this->hasMany(Lists::class);
    }    

    
}
