<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DB;
use Auth;
use Crypt;

class StudentController extends Controller
{

    /*------------------------------------------------------------------------------------------------------- */
    /*---------------------------------Froentend Show-------------------------------------------------------- */
    /*------------------------------------------------------------------------------------------------------- */

    /*---------------------- Home page After login------------------ */

    public function index()
    {

        $total_student = Student::all()
                ->count();
        $total_users = DB::table('users')
                ->count();
        return view('home',compact('total_student','total_users'));
    }
    /*----------------------Student Info Page------------------ */

    function student_info(){
        return view('student.student_info_view');
    }

    /*----------------------Student Result Page------------------ */

    function student_result(){
        return view('student.student_result_view');
    }

    /*----------------------Get Student Info From Db ------------- */

    function get_info(Request $request){

        $request->validate([
            'student_class' => 'required|string',
            'student_roll' => 'required|numeric',

        ],[        
            'student_class.required' => 'You must select in the class field!',
            'student_roll.required' => 'You must fill in the roll field!',
            'student_roll.numeric' => 'Roll must be number!',
        ]);

        $student_class = $request->student_class;
        $student_roll = $request->student_roll;

        $student_count = DB::table('students')
        ->where('student_class', $student_class)
        ->where('student_roll', $student_roll)
        ->count();

        if ($student_count == 1) {
            $student_info = DB::table('students')
            ->where('student_class', $student_class)
            ->where('student_roll', $student_roll)
            ->get();
            
            $request->session()->flash('infooo', 'value');
            return view('student.student_info_view',compact('student_info'));
        }else{
           
        }

        

    }

     /*------------------------------------------------------------------------------------------------------- */
    /*---------------------------------Backend Show -------------------------------------------------------- */
    /*------------------------------------------------------------------------------------------------------- */

    /*----------------------All Student Show From Db ------------- */

    function student_all(){
        $all_student = Student::latest()->paginate(5);
        return view('student.student_all',compact('all_student'));
    }

    /*----------------------Add Student Page ------------- */
    function student_add(){
        return view('student.student_add');
    }

    // student add  
    function student_add_post(Request $request){

        // add student validation 
          $request->validate([
            'student_fname' => 'required|string',
            'student_lname' => 'required|string',
            'student_class' => 'required|string',
            'student_roll' => 'required|numeric',
            'student_father_name' => 'required|string|max:255',
            'student_mother_name' => 'required|string|max:255',
            'student_address' => 'required',
            'student_phone' => 'required|numeric',
            'student_image' => 'required|image',
        ],[
            'student_fname.required' => 'You must fill in the first name field!',
            'student_lname.required' => 'You must fill in the last name field!',
            'student_class.required' => 'You must fill in the class field!',
            'student_roll.required' => 'You must fill in the roll field!',
            'student_roll.numeric' => 'Roll must be numbers!',
            'student_father_name.required' => 'You must fill in the father name field!',
            'student_mother_name.required' => 'You must fill in the mother name field!',
            'student_address.required' => 'You must fill in the address field!',
            'student_phone.required' => 'You must fill in the phone field!',
            'student_phone.numeric' => 'Phone number must be number!',
            'student_image.required' => 'You must fill in the image field!',
        ]);



        $class = Student::where('student_class',  $request->input('student_class'))->count();
        $roll = Student::where('student_roll',  $request->input('student_roll'))->count();
        
        if($class){
            if ($roll == 0) {
               
               // image validation 

            $image = $request->file('student_image');
            $filename = rand(1,9999999999).'_'.date('YmdHhIis').'_'.rand(1,9999999999).'.'.$image->getClientOriginalExtension();
            if($image->isValid()){
            if ($image->getMimeType() == "image/jpeg" || $image->getMimeType() == "image/png") {
                $image->move(public_path('images/students'),$filename);
 
                Student::create([
                    'user_id' => Auth::user()->id,
                    'student_fname' => $request->student_fname,
                    'student_lname' => $request->student_lname,
                    'student_class' => $request->student_class,
                    'student_roll' => $request->student_roll,
                    'student_father_name' => $request->student_father_name,
                    'student_mother_name' => $request->student_mother_name,
                    'student_address' => $request->student_address,
                    'student_phone' => $request->student_phone,
                    'student_image' => $filename,
                ]);

                return back()->with('message_success','Student Added Successful!');          
            }else{

                return back()->with('message_error','Image is not valid');         
            }
        }




            }else{
                return back()->with('roll','The roll number is already have in this class.Please change the roll number!');
            }
        }



     

    }


    /*----------------------Manage Student Page From Db ------------- */
    function student_manage(){
        // $student_info = Student::latest()->get();
        $class_one = DB::table('students')
                    ->where('student_class',"one")
                    ->whereNull('deleted_at')
                    ->get();
        $class_two = DB::table('students')
                    ->where('student_class',"Two")
                    ->whereNull('deleted_at')
                    ->get();
        $class_three = DB::table('students')
                    ->where('student_class',"Three")
                    ->whereNull('deleted_at')
                    ->get();
        $class_four = DB::table('students')
                    ->where('student_class',"Four")
                    ->whereNull('deleted_at')
                    ->get();
        $class_five = DB::table('students')
                    ->where('student_class',"Five")
                    // ->where('deleted_at', null)
                    ->whereNull('deleted_at')
                    ->get();
        return view('student.student_manage',compact('class_one','class_two','class_three','class_four','class_five'));
    }


    /*----------------------Show Specific Student Information From Db ------------- */

    function student_show($student_id){

        $student_show = Student::where('student_id',$student_id)->get();
        return view('student.student_show',compact('student_show'));

    }

    /*----------------------Show Specific Student Information Edit Page ------------- */
    function student_edit($student_id){

        $student_show = DB::table('students')->where('student_id',$student_id)->first();
        // return $student_show;
        return view('student.student_edit',compact('student_show'));
    }

    /*----------------------Update Specific Student Information ------------- */
    function student_update(Request $request,$student_id){

         // update student validation 
         $request->validate([
            'student_fname' => 'required|string',
            'student_lname' => 'required|string',
            'student_father_name' => 'required|string',
            'student_mother_name' => 'required|string',
            'student_address' => 'required',
            'student_phone' => 'required|numeric',
        ],[
            'student_fname.required' => 'You must fill in the first name field!',
            'student_lname.required' => 'You must fill in the last name field!',
            'student_father_name.required' => 'You must fill in the father name field!',
            'student_mother_name.required' => 'You must fill in the mother name field!',
            'student_address.required' => 'You must fill in the address field!',
            'student_phone.required' => 'You must fill in the phone field!',
            'student_phone.numeric' => 'Phone number must be number!',
        ]);

        Student::where('student_id',$student_id)->update([
            'student_fname' => $request->student_fname,
            'student_lname' => $request->student_lname,
            'student_father_name' => $request->student_father_name,
            'student_mother_name' => $request->student_mother_name,
            'student_address' => $request->student_address,
            'student_phone' => $request->student_phone,
        ]);

        return back()->with('message_success','Student Updated Successful!');   


    }

    /*----------------------Delete Specific Student Information ------------- */
    function student_delete($student_id){
        
        if (Auth::user()->role == 2) {
            Student::where('student_id',decrypt($student_id))->delete();
            return back()->with('message_succe','Student Deleted Successful!');   
        }else{
            abort(404);
        }
       
    }

    




















































}
