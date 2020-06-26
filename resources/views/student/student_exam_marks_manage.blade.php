@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-light bg-dark font-weight-bold">
                    Show Student Marks
                </div>

                <div class="card-body">


                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('get_class_result') }}" >
                                @csrf                     
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Year</label>
                                <select value="{{ old('year') }}" name="year" 
                                class="form-control @error('year') is-invalid @enderror">
                                    <option value="">Select Year</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                                @error('year')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                @enderror
                              </div>
                              <div class="form-group col-md-6">
                                <label>Exam Month</label>
                                <select value="{{ old('month') }}" name="month" 
                                class="form-control @error('month') is-invalid @enderror">
                                    <option value="">Select Exam Month</option>
                                    <option value="January">January => CT-1</option>
                                    <option value="February">February => CT-2</option>
                                    <option value="March">March => 1st Semester</option>
                                    <option value="April">April</option>
                                    <option value="May">May => CT-3</option>
                                    <option value="June">June => CT-4</option>
                                    <option value="July">July => 2nd Semester</option>
                                    <option value="August">August</option>
                                    <option value="September">September => CT-5</option>
                                    <option value="October">October => CT-6</option>
                                    <option value="November">November</option>
                                    <option value="December">December => 3rd Semester</option>
                                </select>
                                @error('month')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                @enderror
                              </div>                           
                        </div>

                        <div class="form-row">    
                            <div class="form-group col-md-6">
                                <label>Exam Type</label>
                                <select value="{{ old('exam_type') }}" name="exam_type" 
                                class="form-control @error('exam_type') is-invalid @enderror">
                                    <option value="">Select Exam</option>
                                    <option value="class_test_1">Class Test 1</option>
                                    <option value="class_test_2">Class Test 2</option>
                                    <option value="class_test_3">Class Test 3</option>
                                    <option value="class_test_4">Class Test 4</option>
                                    <option value="class_test_5">Class Test 5</option>
                                    <option value="class_test_6">Class Test 6</option>
                                    <option value="semester_1">First Semester</option>
                                    <option value="semester_2">Second Semester</option>
                                    <option value="semester_3">Final Semester</option>
                                </select>
                                @error('exam_type')
                                <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                @enderror
                              </div>                       
                            <div class="form-group col-md-6">
                                <label>Class</label>
                                <select name="student_class" value="{{ old('student_class') }}"
                                 class="form-control @error('student_class') is-invalid @enderror">
                                    <option value="">Select Class</option>
                                    <option value="One">Class One</option>
                                    <option value="Two">Class Two</option>
                                    <option value="Three">Class Three</option>
                                    <option value="Four">Class Four</option>
                                    <option value="Five">Class Five</option>
                                </select>
                                @error('student_class')
                                <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                @enderror
                              </div>
                        </div>
                                 
                            <div class="form-group text-center">
                                <a> <button type="submit" class="btn btn-primary btn-raised">Get Student Marks</button></a>
                                </div>               
                              </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

@if (session('class_result_marks'))
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-light bg-dark font-weight-bold">
                            All Student List
                            <a href="{{ url('/student-exam-mark-manage') }}" class="btn btn-danger btn-raised float-right fa fa-times"> Dismiss</a>
                        </div>
        
                        <div class="card-body">
                            <table class="table table-bordered text-center" id="example">
                            <thead>
                              <tr class=" align-content-center">
                                <th class="font-weight-bold text-primary" scope="col">Sl. No.</th>
                                <th class="font-weight-bold text-primary" scope="col">Student Name</th>
                                <th class="font-weight-bold text-primary" scope="col">Student Class</th>
                                <th class="font-weight-bold text-primary" scope="col">Student Roll</th>
                                <th class="font-weight-bold text-primary" scope="col">Year</th>
                                <th class="font-weight-bold text-primary" scope="col">Month</th>
                                <th class="font-weight-bold text-primary" scope="col">Exam Type</th>
                                <th class="font-weight-bold text-primary" scope="col">Bangla</th>
                                <th class="font-weight-bold text-primary" scope="col">English</th>
                                <th class="font-weight-bold text-primary" scope="col">Math</th>
                                <th class="font-weight-bold text-primary" scope="col">Religion</th>
                                <th class="font-weight-bold text-primary" scope="col">Total Marks</th>
                                <th width="125" class="font-weight-bold text-primary" scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ( $student_marks as $row)                                                       
                                <tr>
                                    {{-- <td class="pt-4">{{ $student_marks->firstItem()+$loop->index }}</td> --}}
                                    <td class="pt-4">{{$loop->iteration }}</td>
                                    <td  class="pt-4">{{ ucwords($row->student_name) }}</td>
                                    <td class="pt-4">{{ $row->student_class }}</td>
                                    <td class="pt-4">{{ $row->student_roll }}</td>
                                    <td class="pt-4">{{ $row->year }}</td>
                                    <td class="pt-4">{{ $row->month }}</td>
                                    <td class="pt-4">
                                        @if ($row->exam_type == "class_test_1")
                                        <span class="badge badge-pill badge-warning">Class Test 1</span>
                                        @elseif($row->exam_type == "class_test_2")
                                        <span class="badge badge-pill badge-warning">Class Test 2</span>
                                        @elseif($row->exam_type == "class_test_3")
                                        <span class="badge badge-pill badge-warning">Class Test 3</span>
                                        @elseif($row->exam_type == "class_test_4")
                                        <span class="badge badge-pill badge-warning">Class Test 4</span>
                                        @elseif($row->exam_type == "class_test_5")
                                        <span class="badge badge-pill badge-warning">Class Test 5</span>
                                        @elseif($row->exam_type == "class_test_6")
                                        <span class="badge badge-pill badge-warning">Class Test 6</span>
                                        @endif
                                    </td>
                                    <td class="pt-4">
                                         @if ($row->bangla < 8)
                                         <span class="badge badge-danger">{{ $row->bangla }}</span>
                                         @else
                                         <span class="badge badge-success">{{ $row->bangla }}</span>
                                         @endif
                                    </td>
                                    <td class="pt-4">  
                                        @if ($row->english < 8)
                                        <span class="badge badge-danger">{{ $row->english }}</span>
                                        @else
                                        <span class="badge badge-success">{{ $row->english }}</span>
                                        @endif
                                    </td>
                                    <td class="pt-4">
                                        @if ($row->math < 8)
                                        <span class="badge badge-danger">{{ $row->math }}</span>
                                        @else
                                        <span class="badge badge-success">{{ $row->math }}</span>
                                        @endif
                                    </td>
                                    <td class="pt-4">
                                        @if ($row->religion < 8)
                                        <span class="badge badge-danger">{{ $row->religion }}</span>
                                        @else
                                        <span class="badge badge-success">{{ $row->religion }}</span>
                                        @endif
                                    </td>
                                    <td class="pt-4">                                   
                                        @if ($row->total_marks < 32)                                  
                                        <span class="badge badge-danger">{{ $row->total_marks }}</span>
                                        @else
                                        <span class="badge badge-success">{{ $row->total_marks }}</span>
                                        @endif
                                    </td>
                                    <td class="pt-4">
                                        <a href="{{ route('student_marks_show', $row->id ) }}"  class="fa fa-eye btn btn-info btn-raised btn-sm"></a>
                                        <a href="{{ route('student_marks_edit', $row->id ) }}" class="fa fa-pencil-square-o btn btn-warning btn-raised btn-sm"></a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                          
                          </table>  
                          {{-- {{ $all_student->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


            {{ Session::forget('class_result_marks') }}

@endif
@if (session('class_result_mark'))
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-light bg-dark font-weight-bold">
                            All Student List
                            <a href="{{ url('/student-exam-mark-manage') }}" class="btn btn-danger btn-raised float-right fa fa-times"> Dismiss</a>
                        </div>
        
                        <div class="card-body">
                            <table class="table table-bordered text-center" id="example">
                            <thead>
                              <tr class=" align-content-center">
                                <th class="font-weight-bold text-primary" scope="col">Sl. No.</th>
                                <th class="font-weight-bold text-primary" scope="col">Student Name</th>
                                <th class="font-weight-bold text-primary" scope="col">Student Class</th>
                                <th class="font-weight-bold text-primary" scope="col">Student Roll</th>
                                <th class="font-weight-bold text-primary" scope="col">Year</th>
                                <th class="font-weight-bold text-primary" scope="col">Month</th>
                                <th class="font-weight-bold text-primary" scope="col">Exam Type</th>
                                <th class="font-weight-bold text-primary" scope="col">Bangla</th>
                                <th class="font-weight-bold text-primary" scope="col">English</th>
                                <th class="font-weight-bold text-primary" scope="col">Math</th>
                                <th class="font-weight-bold text-primary" scope="col">Religion</th>
                                <th class="font-weight-bold text-primary" scope="col">Total Marks</th>
                                <th width="125" class="font-weight-bold text-primary" scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ( $student_marks as $row)                                                       
                                <tr>
                                    {{-- <td class="pt-4">{{ $student_marks->firstItem()+$loop->index }}</td> --}}
                                    <td class="pt-4">{{$loop->iteration }}</td>
                                    <td  class="pt-4">{{ ucwords($row->student_name) }}</td>
                                    <td class="pt-4">{{ $row->student_class }}</td>
                                    <td class="pt-4">{{ $row->student_roll }}</td>
                                    <td class="pt-4">{{ $row->year }}</td>
                                    <td class="pt-4">{{ $row->month }}</td>
                                    <td class="pt-4">
                                        @if ($row->exam_type == "semester_1")
                                        <span class="badge badge-pill badge-warning">First Semester</span>
                                        @elseif($row->exam_type == "semester_2")
                                        <span class="badge badge-pill badge-warning">Second Semester</span>
                                        @elseif($row->exam_type == "semester_3")
                                        <span class="badge badge-pill badge-warning">Final Semester</span>
                                        @endif
                                    </td>
                                    <td class="pt-4">
                                         @if ($row->bangla < 33)
                                         <span class="badge badge-danger">{{ $row->bangla }}</span>
                                         @else
                                         <span class="badge badge-success">{{ $row->bangla }}</span>
                                         @endif
                                    </td>
                                    <td class="pt-4">  
                                        @if ($row->english < 33)
                                        <span class="badge badge-danger">{{ $row->english }}</span>
                                        @else
                                        <span class="badge badge-success">{{ $row->english }}</span>
                                        @endif
                                    </td>
                                    <td class="pt-4">
                                        @if ($row->math < 33)
                                        <span class="badge badge-danger">{{ $row->math }}</span>
                                        @else
                                        <span class="badge badge-success">{{ $row->math }}</span>
                                        @endif
                                    </td>
                                    <td class="pt-4">
                                        @if ($row->religion < 33)
                                        <span class="badge badge-danger">{{ $row->religion }}</span>
                                        @else
                                        <span class="badge badge-success">{{ $row->religion }}</span>
                                        @endif
                                    </td>
                                    <td class="pt-4">                                   
                                        @if ($row->total_marks < 132)                                  
                                        <span class="badge badge-danger">{{ $row->total_marks }}</span>
                                        @else
                                        <span class="badge badge-success">{{ $row->total_marks }}</span>
                                        @endif
                                    </td>
                                    <td class="pt-4">
                                        <a href="{{ route('student_marks_show', $row->id ) }}"  class="fa fa-eye btn btn-info btn-raised btn-sm"></a>
                                        <a href="{{ route('student_marks_edit', $row->id ) }}" class="fa fa-pencil-square-o btn btn-warning btn-raised btn-sm"></a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                          
                          </table>  
                          {{-- {{ $all_student->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>



            {{ Session::forget('class_result_mark') }}
        @endif

       
      
        
    </div>
</div>
@endsection

{{-- @section('script2')
@if (session('message_error')){
    <script>

        swal("Sorry", "Result Not Found!!", "error", {
        button: "Okay",
        });
    </script>
@endif
@endsection --}}
