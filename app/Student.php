<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 
        'student_fname', 
        'student_lname', 
        'student_class',
        'student_roll',
        'student_father_name',
        'student_mother_name',
        'student_address',
        'student_phone',
        'student_image',
    ];
    protected $dates = ['deleted_at'];

    function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
