<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use DB;

class ResultController extends Controller
{
    /*------------------------------------------------------------------------------------------------------- */
    /*---------------------------------Backend Show-------------------------------------------------------- */
    /*------------------------------------------------------------------------------------------------------- */

    /*----------------------Exam List Page ------------- */

    function student_exam_list(){
        return view('student.student_exam_list');
    }

    /*----------------------All Student Exam marks List Page ------------- */

    function student_exam_marks_manage(){
        return view('student.student_exam_marks_manage');
    }

    /*----------------------All Student Exam marks List Page ------------- */

    function get_class_result(Request $request){

        // validation 
        // $request->validate([
        //     'year' => 'required',
        //     'month' => 'required',
        //     'exam_type' => 'required',

        // ],[
        //     'year.required' => 'You must fill in the year field!',
        //     'month.required' => 'You must fill in the month field!',
        //     'exam_type.required' => 'You must fill in the exam type field!',
        // ]);
            
        $year = $request->year;
        $month = $request->month;
        $exam_type = $request->exam_type;
        $student_class = $request->student_class;
        
        if ($exam_type == "semester_1" || $exam_type == "semester_2" || $exam_type == "semester_3") {

            $student_marks = DB::table('results')
            ->where('year', $year)
            ->where('month', $month)
            ->where('exam_type', $exam_type)
            ->where('student_class', $student_class)
            ->get();
            
           
            $request->session()->flash('class_result_mark', 'value');
            return view('student.student_exam_marks_manage',compact('student_marks'));

        }else{

                $student_marks = DB::table('results')
                ->where('year', $year)
                ->where('month', $month)
                ->where('exam_type', $exam_type)
                ->where('student_class', $student_class)
                ->get();
                
            
                $request->session()->flash('class_result_marks', 'value');
                return view('student.student_exam_marks_manage',compact('student_marks'));
    
        }

       


    }

 
    /*----------------------Get Student Result ------------- */


    function get_result(Request $request){

        //   result validation 
          $request->validate([
            'student_class' => 'required',
            'student_roll' => 'required',
            'year' => 'required',
            'month' => 'required',
            'exam_type' => 'required',

        ],[
            'student_class.required' => 'You must fill in the class field!',
            'student_roll.required' => 'You must fill in the roll field!',
            'student_roll.numeric' => 'Roll must be numbers!',
            'year.required' => 'You must fill in the year field!',
            'month.required' => 'You must fill in the month field!',
            'exam_type.required' => 'You must fill in the exam type field!',

        ]);

        $year = $request->year;
        $month = $request->month;
        $exam_type = $request->exam_type;
        $student_class = $request->student_class;
        $student_roll = $request->student_roll;
        
        

        $student_result = DB::table('results')
                    ->where('exam_type', $exam_type)
                    ->first();
        $typeS_exam = $student_result->exam_type;
        
        if ($typeS_exam == "class_test_1" || $typeS_exam == "class_test_2" || $typeS_exam == "class_test_3" || $typeS_exam == "class_test_4" || $typeS_exam == "class_test_5" || $typeS_exam == "class_test_6") {

                        $student_result_count = Result::where('year', $year)
                        ->where('month', $month)
                        ->where('exam_type', $exam_type)
                        ->where('student_class', $student_class)
                        ->where('student_roll', $student_roll)                 
                        ->count();

                        if($student_result_count == 1){

                            $student_result = Result::where('year', $year)
                                ->where('month', $month)
                                ->where('exam_type', $exam_type)
                                ->where('student_class', $student_class)
                                ->where('student_roll', $student_roll)                 
                                ->get();
                            $request->session()->flash('result', 'value');
                            return view('student.student_result_view',compact('student_result'));

                        }else{
                            return back()->with('message_error','Result Not Found!');  
                        }

        }else{


                $student_result_count = Result::where('year', $year)
                ->where('month', $month)
                ->where('exam_type', $exam_type)
                ->where('student_class', $student_class)
                ->where('student_roll', $student_roll)                 
                ->count();

                if($student_result_count == 1){

                    $student_result = Result::where('year', $year)
                        ->where('month', $month)
                        ->where('exam_type', $exam_type)
                        ->where('student_class', $student_class)
                        ->where('student_roll', $student_roll)                 
                        ->get();
                    $request->session()->flash('result_semester', 'value');
                    return view('student.student_result_view',compact('student_result'));

                }else{
                    return back()->with('message_error','Result Not Found!');  
                }


        }


       
       
       
    }


   /*----------------------Class Test Result Save ------------- */

   function class_test(Request $request){

    // result validation 
    $request->validate([
        'student_class' => 'required',
        'student_roll' => 'required',
        'year' => 'required',
        'month' => 'required',
        'bangla' => 'required|numeric|min:1|max:20',
        'english' => 'required|numeric|min:1|max:20',
        'math' => 'required|numeric|min:1|max:20',
        'religion' => 'required|numeric|min:1|max:20',

    ],[
        'student_class.required' => 'You must fill in the class field!',
        'student_roll.required' => 'You must fill in the roll field!',
        'student_roll.numeric' => 'Roll must be numbers!',
        'year.required' => 'You must fill in the year field!',
        'month.required' => 'You must fill in the month field!',
        'bangla.required' => 'You must fill in the bangla field!',
        'english.required' => 'You must fill in the english field!',
        'math.required' => 'You must fill in the math field!',
        'religion.required' => 'You must fill in the religion field!',
        'bangla.numeric' => 'Bangla field must be numbers!',
        'english.numeric' => 'English field must be numbers!',
        'math.numeric' => 'Math field must be numbers!',
        'religion.numeric' => 'Religion field must be numbers!',

    ]);

    $exam_type = $request->exam_type;
    $student_class = $request->student_class;
    $student_roll = $request->student_roll;
    $year = $request->year;
    $month = $request->month;
    $bangla = $request->bangla;
    $english = $request->english;
    $math = $request->math;
    $religion = $request->religion;
    $total_marks = $bangla+ $english+$math+$religion;
    
    $student = DB::table('students')
    ->where('student_class',$student_class)
    ->where('student_roll',$student_roll)
    ->first();

    $id = $student->student_id;
    $student_name = $student->student_fname.' '.$student->student_lname;
    $student_address = $student->student_address;
    $student_father_name = $student->student_father_name;
    $student_mother_name = $student->student_mother_name;
    $student_image = $student->student_image;
            


    Result::create([
        'student_id' => $id,
        'student_name' => $student_name,
        'student_address' => $student_address,
        'student_father_name' => $student_father_name,
        'student_mother_name' => $student_mother_name,
        'student_image' => $student_image,
        'exam_type' => $exam_type,
        'student_class' => $student_class,
        'student_roll' => $student_roll,
        'year' => $year,
        'month' => $month,
        'bangla' => $bangla,
        'english' =>$english,
        'math' =>$math,
        'religion' => $religion,
        'total_marks' =>$total_marks,

    ]);


    return back()->with('message_success','Result Added Successful!'); 
    


}


   /*----------------------Semester Exam Result Save ------------- */

   function semester_exam(Request $request){

    // result validation 
    $request->validate([
        'student_class' => 'required',
        'student_roll' => 'required',
        'year' => 'required',
        'month' => 'required',
        'bangla' => 'required|numeric|min:1|max:100',
        'english' => 'required|numeric|min:1|max:100',
        'math' => 'required|numeric|min:1|max:100',
        'religion' => 'required|numeric|min:1|max:100',

    ],[
        'student_class.required' => 'You must fill in the class field!',
        'student_roll.required' => 'You must fill in the roll field!',
        'student_roll.numeric' => 'Roll must be numbers!',
        'year.required' => 'You must fill in the year field!',
        'month.required' => 'You must fill in the month field!',
        'bangla.required' => 'You must fill in the bangla field!',
        'english.required' => 'You must fill in the english field!',
        'math.required' => 'You must fill in the math field!',
        'religion.required' => 'You must fill in the religion field!',
        'bangla.numeric' => 'Bangla field must be numbers!',
        'english.numeric' => 'English field must be numbers!',
        'math.numeric' => 'Math field must be numbers!',
        'religion.numeric' => 'Religion field must be numbers!',

    ]);


    $exam_type = $request->exam_type;
    $student_class = $request->student_class;
    $student_roll = $request->student_roll;
    $year = $request->year;
    $month = $request->month;
    $bangla = $request->bangla;
    $english = $request->english;
    $math = $request->math;
    $religion = $request->religion;
    $total_marks = $bangla+ $english+$math+$religion;
    
    $student = DB::table('students')
    ->where('student_class',$student_class)
    ->where('student_roll',$student_roll)
    ->first();

    $id = $student->student_id;
    $student_name = $student->student_fname.' '.$student->student_lname;
    $student_address = $student->student_address;
    $student_father_name = $student->student_father_name;
    $student_mother_name = $student->student_mother_name;
    $student_image = $student->student_image;
            


    Result::create([
        'student_id' => $id,
        'student_name' => $student_name,
        'student_address' => $student_address,
        'student_father_name' => $student_father_name,
        'student_mother_name' => $student_mother_name,
        'student_image' => $student_image,
        'exam_type' => $exam_type,
        'student_class' => $student_class,
        'student_roll' => $student_roll,
        'year' => $year,
        'month' => $month,
        'bangla' => $bangla,
        'english' =>$english,
        'math' =>$math,
        'religion' => $religion,
        'total_marks' =>$total_marks,

    ]);


    return back()->with('message_success','Result Added Successful!'); 
    


}


   /*----------------------Show Specific Student Marks ------------- */

    function student_marks_show($id){
        
        $show_marks = Result::where('id',$id)
                        ->get();
        return view('student.student_marks_show',compact('show_marks'));
        
    }

   /*----------------------Show Edit Page With Specific Student Marks ------------- */

    function student_marks_edit($id){

        $edit_marks = Result::where('id',$id)
                        ->first();
       
        return view('student.student_marks_edit',compact('edit_marks'));

    }


   /*----------------------Show Edit Page With Specific Student Marks ------------- */

    function student_marks_update(Request $request,$id){
       

            // update student validation 
            $request->validate([
                'bangla' => 'required|numeric',
                'english' => 'required|numeric',
                'math' => 'required|numeric',
                'religion' => 'required|numeric',
            ],[
                'bangla.required' => 'You must fill in the bangla marks field!',
                'english.required' => 'You must fill in the english marks field!',
                'math.required' => 'You must fill in the math marks field!',
                'religion.required' => 'You must fill in the religion marks field!',
                'bangla.numeric' => 'Bangla field must be number!',
                'english.numeric' => 'English field must be number!',
                'math.numeric' => 'Math field must be number!',
                'religion.numeric' => 'Religion field must be number!',
            ]);
                
            $marks_id = $id;
           
            Result::where('id',$marks_id)->update([
                'bangla' => $request->bangla,
                'english' => $request->english,
                'math' => $request->math,
                'religion' => $request->religion,
            ]);
    
            return back()->with('message_success','Result Marks Updated Successful!');   
    

    }






















}
