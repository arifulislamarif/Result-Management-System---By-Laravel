<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    protected $fillable = [
        'student_id','student_name','student_address','student_father_name','student_mother_name','student_image','exam_type', 'student_class', 'student_roll','year','month','bangla','english','math','religion','total_marks'
    ];


    // function student_info(){
    //     // return $this->hasMany(Student::class);
    //     return $this->hasOne(Student::class);
    // }




}
