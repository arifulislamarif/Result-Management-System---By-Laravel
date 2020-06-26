@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-light bg-dark font-weight-bold">
                    Show Student
                    <a href="{{ url('/student-result') }}" class="btn btn-warning btn-raised fa btn-sm fa-arrow-left float-right ml-2"> Go Student Result Page</a>
                    <a href="{{ url('/') }}" class="btn btn-info btn-raised fa btn-sm fa-arrow-left float-right ml-2"> Go Home Page</a>
                </div>

                <div class="card-body">


                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('get_info') }}" >
                                @csrf                     
                                    <div class="form-group">
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
                                    <div class="form-group">
                                      <label>Roll</label>
                                        <input name="student_roll" value="{{ old('student_roll') }}" 
                                        type="text" 
                                        class="form-control  @error('student_roll') is-invalid @enderror">
                                        @error('student_roll')
                                         <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                    </div>
                                 
                                    <div class="form-group text-center">
                                        <a> <button type="submit" class="btn btn-primary btn-raised">Get Student Information</button></a>
                                      </div>               
                              </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        @if (session('infooo'))
            <div class="col-md-8 mt-3">

                <div class="card">
                    <div class="card-header text-light bg-dark font-weight-bold">
                        Your Result
                        <a href="{{ url('student-information') }}" class="btn btn-danger btn-raised float-right fa fa-times"> Dismiss</a>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_img text-center mb-2">
                                    @foreach ($student_info as $info)
                                        <img class="rounded-circle" src="{{ asset('images/students') }}/{{ $info->student_image }}" alt="" width="150">
                                    @endforeach
                                  </div>
                              </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <tbody>
                                        @foreach ($student_info as $info)
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

            {{ Session::forget('infooo') }}

        @endif
      
        
    </div>
</div>
@endsection
