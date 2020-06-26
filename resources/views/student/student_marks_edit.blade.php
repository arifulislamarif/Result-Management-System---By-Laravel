@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

                <div class="col-md-6">

                <div class="card">
                    <div class="card-header text-light bg-dark font-weight-bold">
                        Student's Marks Edit Form
                        <a href="{{ url('/student-exam-mark-manage') }}" class="btn btn-info btn-raised btn-sm fa fa-arrow-left float-right mr-2"> Back</a>
                    </div>

                    <div class="card-body">

                        @if (session('message_error'))
                        <div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('message_error') }}</strong>
                        </div>
                        @endif
        
                            <form method="POST" action="{{ route('student_marks_update',$edit_marks->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Student Name</label>
                                    <input readonly value="{{ $edit_marks->student_name }}" type="text" 
                                    class="form-control">                               
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Student Address</label>
                                    <input readonly value="{{ $edit_marks->student_address }}" type="text" 
                                    class="form-control">                               
                                  </div>
                                 
                          
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Student Father Nane</label>
                                    <input readonly value="{{ $edit_marks->student_father_name }}" type="text" 
                                    class="form-control">                               
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Student Mother Name</label>
                                    <input readonly value="{{ $edit_marks->student_mother_name }}" type="text" 
                                    class="form-control">                               
                                  </div>
                                 
                          
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Class</label>
                                        <input readonly value="{{ $edit_marks->student_class }}" type="text" 
                                        class="form-control">                               
                                      </div>
                                  <div class="form-group col-md-6">
                                    <label>Roll</label>
                                    <input readonly value="{{ $edit_marks->student_roll }}" type="text" 
                                    class="form-control">                               
                                  </div>

                          
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Month</label>
                                    <input readonly value="{{ $edit_marks->month }}" type="text" 
                                    class="form-control">                               
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Year</label>
                                    <input readonly value="{{ $edit_marks->year }}" type="text" 
                                    class="form-control">                               
                                  </div>

                          
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Bangla<span class="text-danger">*</span></label>
                                    <input value="{{ $edit_marks->bangla }}" name="bangla" type="text" 
                                    class="form-control @error('bangla') is-invalid @enderror">
                                    @error('bangla')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>English<span class="text-danger">*</span></label>
                                    <input value="{{ $edit_marks->english }}" name="english" type="text" 
                                    class="form-control @error('english') is-invalid @enderror">
                                     
                                    @error('english')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Math<span class="text-danger">*</span></label>
                                    <input value="{{ $edit_marks->math }}" name="math" type="text" 
                                    class="form-control @error('math') is-invalid @enderror">
                                    @error('math')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Religion<span class="text-danger">*</span></label>
                                    <input value="{{ $edit_marks->religion }}" name="religion" type="text" 
                                    class="form-control @error('religion') is-invalid @enderror">
                                     
                                    @error('religion')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>

        
                        
                                <div class="form-row">                                                           
                                    <div class="form-group col-md-6">
                                      <button type="submit" href="" class="btn btn-primary btn-raised">Update Student Marks</button>
                                    </div>                  
                              </form>
                    </div>
                </div>
            </div>
     
        
    </div>
</div>
@endsection



@section('script')


@if (session('message_success')){
<script>
 
    swal("Good job!", "Student Marks Updated Successful!", "success", {
      button: "Okay",
    });
  </script>
@endif

@endsection 

