@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

                <div class="col-md-8">

                <div class="card">
                    <div class="card-header text-light bg-dark font-weight-bold">
                        Student Result Marks
                        <a href="{{ url('/student-exam-mark-manage') }}" class="btn btn-warning btn-raised fa btn-sm fa-arrow-left float-right ml-2"> Back</a>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_img text-center mb-2">
                                    @foreach ($show_marks as $info)
                                        <img class="rounded-circle" src="{{ asset('images/students') }}/{{ $info->student_image }}" alt="image" width="200">
                                    @endforeach
                                  </div>
                              </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <tbody>
                                        @foreach ($show_marks as $info)
                                            <tr>
                                                <th width="18%">First Name</th>
                                                <td width="32%">{{ $info->student_name }}</td>
                                                <th width="18%">Student Father's Name</th>
                                                <td width="32%">{{ $info->student_father_name }}</td>
                                            </tr>                                                                                                                                                                                                            
                                            <tr>
                                                <th width="32%">Student Mother's Name</th>
                                                <td width="18%">{{ $info->student_mother_name }}</td>
                                                <th width="32%">Student Class</th>
                                                <td width="18%">{{ $info->student_class }}</td>
                                            </tr>              
                                            <tr>
                                                <th width="18%">Student Roll</th>
                                                <td width="32%">{{ $info->student_roll }}</td>
                                                <th width="18%" class="text-info">Year</th>
                                                <td width="32%">                                       
                                                    <span class="badge badge-pill badge-warning">{{ $info->year }}</span>
                                                </td>
                                            </tr>                                                                                           
                                            <tr>
                                                <th width="18%" class="text-info">Month</th>
                                                <td width="32%">                                                 
                                                    <span class="badge badge-pill badge-warning">{{ $info->month }}</span>
                                                </td>
                                                <th width="18%" class="text-info">Exam Type</th>
                                                <td width="32%">
                                                    @if ($info->exam_type == "class_test_1")
                                                    <span class="badge badge-pill badge-warning">Class Test 1</span>
                                                    @elseif($info->exam_type == "class_test_2")
                                                    <span class="badge badge-pill badge-warning">Class Test 2</span>
                                                    @elseif($info->exam_type == "class_test_3")
                                                    <span class="badge badge-pill badge-warning">Class Test 3</span>
                                                    @elseif($info->exam_type == "class_test_4")
                                                    <span class="badge badge-pill badge-warning">Class Test 4</span>
                                                    @elseif($info->exam_type == "class_test_5")
                                                    <span class="badge badge-pill badge-warning">Class Test 5</span>
                                                    @elseif($info->exam_type == "class_test_6")
                                                    <span class="badge badge-pill badge-warning">Class Test 6</span>
                                                    @endif
                                                </td>
                                            </tr>                                                                                                                                                                                                           
                                            <tr>
                                                <th width="18%" class="text-info">Bangla</th>
                                                <td width="32%">                                    
                                                    @if ($info->bangla < 8)
                                                    <span class="badge badge-danger">{{ $info->bangla }}</span>
                                                    @else
                                                    <span class="badge badge-success">{{ $info->bangla }}</span>
                                                    @endif
                                                </td>
                                                <th width="18%" class="text-info">English</th>
                                                <td width="32%">
                                                    @if ($info->english < 8)
                                                    <span class="badge badge-danger">{{ $info->english }}</span>
                                                    @else
                                                    <span class="badge badge-success">{{ $info->english }}</span>
                                                    @endif
                                                </td>
                                            </tr>                                                                                                       
                                            <tr>
                                                <th width="18%" class="text-info">Math</th>
                                                <td width="32%">
                                                    @if ($info->math < 8)
                                                    <span class="badge badge-danger">{{ $info->math }}</span>
                                                    @else
                                                    <span class="badge badge-success">{{ $info->math }}</span>
                                                    @endif
                                                </td>
                                                <th width="18%" class="text-info">Religion</th>
                                                <td width="32%">
                                                    @if ($info->religion < 8)
                                                    <span class="badge badge-danger">{{ $info->religion }}</span>
                                                    @else
                                                    <span class="badge badge-success">{{ $info->religion }}</span>
                                                    @endif
                                                </td>
                                            </tr>                                                                                                       
                                            <tr>
                                                <th width="18%" class="text-info">Total Marks</th>
                                                <td width="32%">
                                                    @if ($info->total_marks < 32)
                                                    <span class="badge badge-danger">{{ $info->total_marks }}</span>
                                                    @else
                                                    <span class="badge badge-success">{{ $info->total_marks }}</span>
                                                    @endif
                                                </td>
                                                <th width="18%" class="text-info">Result</th>
                                                <td width="32%">                                                  
                                                    @if ($info->total_marks < 32)
                                                    <span class="badge badge-danger">Failed</span>
                                                    @else
                                                    <span class="badge badge-success">Passed</span>
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
     
        
    </div>
</div>
@endsection
