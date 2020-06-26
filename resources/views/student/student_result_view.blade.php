@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-light bg-dark font-weight-bold">
                    Show Student Result
                    <a href="{{ url('/student-information') }}" class="btn btn-success btn-raised fa btn-sm fa-arrow-left float-right ml-2"> Go Student Information Page</a>
                    <a href="{{ url('/') }}" class="btn btn-info btn-raised fa btn-sm fa-arrow-left float-right ml-2"> Go Home Page</a>

                </div>

                <div class="card-body">


                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('get_result') }}" >
                                @csrf                     
                        <div class="form-row">
                            <div class="form-group col-md-4">
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
                              <div class="form-group col-md-4">
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
                              <div class="form-group col-md-4">
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
                        </div>

                        <div class="form-row">                           
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
                              <div class="form-group col-md-6">
                                <label>Roll</label>
                                  <input name="student_roll" value="{{ old('student_roll') }}" 
                                  type="text" 
                                  class="form-control  @error('student_roll') is-invalid @enderror">
                                @error('student_roll')
                                  <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                @enderror
                              </div>
                        </div>
                                 
                            <div class="form-group text-center">
                                <a> <button type="submit" class="btn btn-primary btn-raised">Get Student Result</button></a>
                                </div>               
                              </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        @if (session('result'))
            <div class="col-md-10 mt-3">

                <div class="card">
                    <div class="card-header text-light bg-dark font-weight-bold">
                        Your result
                        <a href="{{ url('student-result') }}" class="btn btn-danger btn-raised float-right fa fa-times"> Dismiss</a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_img text-center mb-2">
                                    @foreach ($student_result as $info)
                                        <img class="rounded-circle" src="{{ asset('images/students') }}/{{ $info->student_image }}" alt="" width="150">
                                    @endforeach
                                  </div>
                              </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <tbody>
                                        @foreach ($student_result as $info)                                                                                                    
                                            <tr>
                                                <th width="25%">Student Name</th>
                                                <td width="25%">{{ $info->student_name }}</td>
                                                <th width="25%">Student Address</th>
                                                <td width="25%">{{ $info->student_address }}</td>
                                            </tr>                                                                                                    
                                            <tr>
                                                <th width="25%">Student Father Name</th>
                                                <td width="25%">{{ $info->student_father_name }}</td>
                                                <th width="25%">Student Mother Name</th>
                                                <td width="25%">{{ $info->student_mother_name }}</td>
                                            </tr>                                                                                                    
                                            <tr>
                                                <th width="25%">Student Class</th>
                                                <td width="25%">{{ $info->student_class }}</td>
                                                <th width="25%">Student Roll</th>
                                                <td width="25%">{{ $info->student_roll }}</td>
                                            </tr>                                                                                                       
                                            <tr>
                                                <th width="25%">Year</th>
                                                <td width="25%">{{ $info->year }}</td>
                                                <th width="25%">Month</th>
                                                <td width="25%">
                                                    @if ($info->month == "January")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 1</span>
                                                    @elseif($info->month == "February")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 2</span>
                                                    @elseif($info->month == "March")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => First Semester</span>
                                                    @elseif($info->month == "May")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 3</span>
                                                    @elseif($info->month == "June")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 4</span>
                                                    @elseif($info->month == "July")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Second Semester</span>
                                                    @elseif($info->month == "September")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 5</span>
                                                    @elseif($info->month == "October")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 6</span>
                                                    @elseif($info->month == "December")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Final Semester</span>
                                                    @endif
                                                </td>
                                            </tr>                                                                                                       
                                            <tr style="font-size: 16px;">
                                                <th class="text-info" width="25%">Bangla</th>
                                                <td width="25%">
                                                    @if ($info->bangla < 8)
                                                    <span class="text-danger font-weight-bold">{{ $info->bangla }}</span> Out Of 20
                                                    @else
                                                    <span class="text-success font-weight-bold">{{ $info->bangla }}</span> Out Of 20
                                                    @endif
                                                </td>
                                                <th class="text-info" width="25%">English</th>
                                                <td width="25%">
                                                    @if ($info->english < 8)
                                                    <span class="text-danger font-weight-bold"> {{ $info->english }}</span> Out Of 20
                                                    @else
                                                    <span class="text-success font-weight-bold"> {{ $info->english }}</span> Out Of 20
                                                    @endif
                                                </td>
                                            </tr>                                                                                                       
                                            <tr style="font-size: 16px;">
                                                <th class="text-info" width="25%">Math</th>
                                                <td width="25%">
                                                    @if ($info->math < 8)
                                                    <span class="text-danger font-weight-bold">{{ $info->math }}</span> Out Of 20
                                                    @else
                                                    <span class="text-success font-weight-bold">{{ $info->math }}</span> Out Of 20
                                                    @endif
                                                </td>
                                                <th class="text-info" width="25%">Religion</th>
                                                <td width="25%">
                                                    @if ($info->religion < 8)
                                                    <span class="text-danger font-weight-bold">{{ $info->religion }}</span> Out Of 20
                                                    @else
                                                    <span class="text-success font-weight-bold">{{ $info->religion }}</span> Out Of 20
                                                    @endif
                                                    
                                                </td>
                                            </tr>                                                                                                       
                                            <tr style="font-size: 16px;">
                                                <th class="text-info" width="25%">Total Marks</th>
                                                <td width="25%">
                                                    @if ($info->total_marks < 32)
                                                    <span class="text-danger font-weight-bold">{{ $info->total_marks }}</span> Out Of 80
                                                    @else
                                                    <span class="text-success font-weight-bold">{{ $info->total_marks }}</span> Out Of 80
                                                    @endif
                                                    
                                                </td>
                                                <th class="text-info" width="25%">Result</th>
                                                <td width="25%">
                                                    @if ($info->bangla < 8 || $info->english < 8 || $info->math < 8 || $info->religion < 8)
                                                        <span class="text-danger font-weight-bold">Failed</span>
                                                    @else
                                                        @if ($info->total_marks < 32)
                                                            <span class="text-danger font-weight-bold">Failed</span>
                                                        @else
                                                            <span class="text-success font-weight-bold"> Passed</span> 
                                                        @endif
                                                    @endif
                                                   
                                                    
                                                </td>
                                            </tr>                                                                                                       
                                        @endforeach                               
                                                                                                                  
                                                                  
                                                                             
                                        
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>

            {{ Session::forget('result') }}

        @endif

        @if (session('result_semester'))
            <div class="col-md-10 mt-3">

                <div class="card">
                    <div class="card-header text-light bg-dark font-weight-bold">Your Result</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_img text-center mb-2">
                                    @foreach ($student_result as $info)
                                        <img class="rounded-circle" src="{{ asset('images/students') }}/{{ $info->student_image }}" alt="" width="150">
                                    @endforeach
                                  </div>
                              </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <tbody>
                                        @foreach ($student_result as $info)                                                                                                    
                                            <tr>
                                                <th width="25%">Student Name</th>
                                                <td width="25%">{{ $info->student_name }}</td>
                                                <th width="25%">Student Address</th>
                                                <td width="25%">{{ $info->student_address }}</td>
                                            </tr>                                                                                                    
                                            <tr>
                                                <th width="25%">Student Father Name</th>
                                                <td width="25%">{{ $info->student_father_name }}</td>
                                                <th width="25%">Student Mother Name</th>
                                                <td width="25%">{{ $info->student_mother_name }}</td>
                                            </tr>                                                                                                    
                                            <tr>
                                                <th width="25%">Student Class</th>
                                                <td width="25%">{{ $info->student_class }}</td>
                                                <th width="25%">Student Roll</th>
                                                <td width="25%">{{ $info->student_roll }}</td>
                                            </tr>                                                                                                       
                                            <tr>
                                                <th width="25%">Year</th>
                                                <td width="25%">{{ $info->year }}</td>
                                                <th width="25%">Month</th>
                                                <td width="25%">
                                                    @if ($info->month == "January")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 1</span>
                                                    @elseif($info->month == "February")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 2</span>
                                                    @elseif($info->month == "March")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => First Semester</span>
                                                    @elseif($info->month == "May")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 3</span>
                                                    @elseif($info->month == "June")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 4</span>
                                                    @elseif($info->month == "July")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Second Semester</span>
                                                    @elseif($info->month == "September")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 5</span>
                                                    @elseif($info->month == "October")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Class Test 6</span>
                                                    @elseif($info->month == "December")
                                                    <span class="text-primary font-weight-bold">{{ $info->month }} => Final Semester</span>
                                                    @endif
                                                </td>
                                            </tr>                                                                                                       
                                            <tr style="font-size: 16px;">
                                                <th class="text-info" width="25%">Bangla</th>
                                                <td width="25%">
                                                    @if ($info->bangla < 33)
                                                    <span class="text-danger font-weight-bold">{{ $info->bangla }}</span> Out Of 100
                                                    @else
                                                    <span class="text-success font-weight-bold">{{ $info->bangla }}</span> Out Of 100
                                                    @endif
                                                </td>
                                                <th class="text-info" width="25%">English</th>
                                                <td width="25%">
                                                    @if ($info->english < 33)
                                                    <span class="text-danger font-weight-bold"> {{ $info->english }}</span> Out Of 100
                                                    @else
                                                    <span class="text-success font-weight-bold"> {{ $info->english }}</span> Out Of 100
                                                    @endif
                                                </td>
                                            </tr>                                                                                                       
                                            <tr style="font-size: 16px;">
                                                <th class="text-info" width="25%">Math</th>
                                                <td width="25%">
                                                    @if ($info->math < 33)
                                                    <span class="text-danger font-weight-bold">{{ $info->math }}</span> Out Of 100
                                                    @else
                                                    <span class="text-success font-weight-bold">{{ $info->math }}</span> Out Of 100
                                                    @endif
                                                </td>
                                                <th class="text-info" width="25%">Religion</th>
                                                <td width="25%">
                                                    @if ($info->religion < 33)
                                                    <span class="text-danger font-weight-bold">{{ $info->religion }}</span> Out Of 100
                                                    @else
                                                    <span class="text-success font-weight-bold">{{ $info->religion }}</span> Out Of 100
                                                    @endif
                                                    
                                                </td>
                                            </tr>                                                                                                       
                                            <tr style="font-size: 16px;">
                                                <th class="text-info" width="25%">Total Marks</th>
                                                <td width="25%">
                                                    @if ($info->total_marks < 132)
                                                    <span class="text-danger font-weight-bold">{{ $info->total_marks }}</span> Out Of 400
                                                    @else
                                                    <span class="text-success font-weight-bold">{{ $info->total_marks }}</span> Out Of 400
                                                    @endif
                                                    
                                                </td>
                                                <th class="text-info" width="25%">Result</th>
                                                <td width="25%">
                                                    @if ($info->bangla < 33 || $info->english < 33 || $info->math < 33 || $info->religion < 33)
                                                        <span class="text-danger font-weight-bold">Failed</span>
                                                    @else
                                                        @if ($info->total_marks < 132)
                                                            <span class="text-danger font-weight-bold">Failed</span>
                                                        @else
                                                            <span class="text-success font-weight-bold"> Passed</span> 
                                                        @endif
                                                    @endif
                                                   
                                                    
                                                </td>
                                            </tr>                                                                                                       
                                        @endforeach                               
                                                                                                                  
                                                                  
                                                                             
                                        
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>

            {{ Session::forget('result_semester') }}

        @endif
      
        
    </div>
</div>
@endsection

@section('script2')
@if (session('message_error')){
    <script>

        swal("Sorry", "Result Not Found!!", "error", {
        button: "Okay",
        });
    </script>
@endif
@endsection
