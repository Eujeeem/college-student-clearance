<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;
    protected $table = "lists";

    public function students(){

        return $this->belongsTo(Student::class);

    }
    
    public function department(){

        return $this->belongsTo(Department::class);
    }    
}
