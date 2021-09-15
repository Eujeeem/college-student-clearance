<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";

    public function incharge(){

        return $this->hasMany(Incharge::class);
    }      

    public function lists(){

        return $this->hasMany(Lists::class);
    }    
}
