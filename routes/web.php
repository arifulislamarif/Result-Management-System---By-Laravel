<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();
/*----------------------------------------------------------------------------------- */
/*-------------------------User Register & Home Route--------------------------------*/
/*----------------------------------------------------------------------------------- */
// Home Route 
Route::get('/home', 'StudentController@index')->name('home')->middleware('auth');
// Register Page View 
Route::get('/register-user', 'RegisterUserController@register_view')->name('register_view');
// Register Post 
Route::post('/register', 'RegisterUserController@register_user')->name('register_user')->middleware('role');

/*----------------------------------------------------------------------------------- */
/*--------------------------------Frontend Student Route------------------------------*/
/*----------------------------------------------------------------------------------- */

// Student Informmation Page View 
 Route::get('student-information','StudentController@student_info')->name('student_info');
 // Student Result Page View 
 Route::get('student-result','StudentController@student_result')->name('student_result');
//  Get Student Information On Page From DB 
 Route::post('student-information-show','StudentController@get_info')->name('get_info');
//  Get Student Result On Page From DB 
 Route::post('student-result-show','ResultController@get_result')->name('get_result');

/*----------------------------------------------------------------------------------- */
/*--------------------------Backend Student Route ------------------------------------*/
/*----------------------------------------------------------------------------------- */

// Show Add Student Page 
 Route::get('student-add','StudentController@student_add')->name('student_add')->middleware('auth');
 // Post Student In DB 
 Route::post('student-add-post','StudentController@student_add_post')->name('student_add_post')->middleware('auth');
 // Manage Student Page Classwise
 Route::get('student-manage','StudentController@student_manage')->name('student_manage')->middleware('auth')->middleware('role');
// Show All Student Page From DB 
 Route::get('student-all','StudentController@student_all')->name('student_all')->middleware('auth');
// Show Specific Student Details 
 Route::get('student-show/{student_id}','StudentController@student_show')->name('student_show')->middleware('auth');
// Edit Specific Student Details
 Route::get('student-edit/{student_id}','StudentController@student_edit')->name('student_edit')->middleware('auth')->middleware('role');
// Update Post Specific Student Details
 Route::post('student-update/{student_id}','StudentController@student_update')->name('student_update')->middleware('auth');
// Delete Specific Student Information
 Route::get('student-delete/{student_id}','StudentController@student_delete')->name('student_delete')->middleware('auth')->middleware('role');

 /*----------------------------------------------------------------------------------- */
/*--------------------------Backend Student Result Route------------------------------*/
/*----------------------------------------------------------------------------------- */

// Show Student Exam List Page Route 
 Route::get('student-exam','ResultController@student_exam_list')->name('student_exam_list')->middleware('auth');
// Show Student Exam List Page Route 
 Route::get('student-exam-mark-manage','ResultController@student_exam_marks_manage')->name('student_exam_marks_manage')->middleware('auth');
// Show Student Exam Marks List Route 
 Route::post('student-exam-marks','ResultController@get_class_result')->name('get_class_result')->middleware('auth');
//  Class Test(1-6) Route
 Route::post('class-test','ResultController@class_test')->name('class_test')->middleware('auth');
//  Semester Exam(1-3) Route 
 Route::post('semester_exam','ResultController@semester_exam')->name('semester_exam')->middleware('auth');
//   Show Specific Student Marks Route 
 Route::get('student-exam-marks-show/{id}','ResultController@student_marks_show')->name('student_marks_show')->middleware('auth');
//   Show Specific Student Marks Route 
 Route::get('student-exam-marks-edit/{id}','ResultController@student_marks_edit')->name('student_marks_edit')->middleware('auth');
//   Update Specific Student Marks Route 
 Route::post('student-exam-marks-update/{id}','ResultController@student_marks_update')->name('student_marks_update')->middleware('auth');
 

