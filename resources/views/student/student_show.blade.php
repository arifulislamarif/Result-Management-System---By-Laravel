@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row justify-content-center">

                <div class="col-md-8">

                <div class="card">
                    <div class="card-header text-light bg-dark font-weight-bold">
                        Student Information
                        <a href="{{ url('/student-all') }}" class="btn btn-warning btn-raised fa btn-sm fa-arrow-left float-right ml-2"> All student</a>
                        <a href="{{ url('/student-manage') }}" class="btn btn-info btn-raised btn-sm fa fa-arrow-left float-right mr-2"> Manage student</a>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_img text-center mb-2">
                                    @foreach ($student_show as $info)
                                        <img class="rounded-circle" src="{{ asset('images/students') }}/{{ $info->student_image }}" alt="image" width="200">
                                    @endforeach
                                  </div>
                              </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <tbody>
                                        @foreach ($student_show as $info)
                                            <tr>
                                                <th width="18%">First Name</th>
                                                <td width="32%">{{ $info->student_fname }}</td>
                                                <th width="18%">Last Name</th>
                                                <td width="32%">{{ $info->student_lname }}</td>
                                            </tr>                                                                                                       
                                            <tr>
                                                <th width="18%">Student Class</th>
                                                <td width="32%">{{ $info->student_class }}</td>
                                                <th width="18%">Student Roll</th>
                                                <td width="32%">{{ $info->student_roll }}</td>
                                            </tr>                                                                                                       
                                            <tr>
                                                <th width="32%">Student Father's Name</th>
                                                <td width="18%">{{ $info->student_father_name }}</td>
                                                <th width="32%">Student Mother's Name</th>
                                                <td width="18%">{{ $info->student_mother_name }}</td>
                                            </tr>                                                                                                       
                                            <tr>
                                                <th width="18%">Student Address</th>
                                                <td width="32%">{{ $info->student_address }}</td>
                                                <th width="18%">Phone Number</th>
                                                <td width="32%">{{ $info->student_phone }}</td>
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
