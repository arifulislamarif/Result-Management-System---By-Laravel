@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row justify-content-center">

                <div class="col-md-8">

                <div class="card">
                    <div class="card-header text-light bg-dark font-weight-bold">
                        Student Edit
                        <a href="{{ url('/student-all') }}" class="btn btn-warning btn-raised fa btn-sm fa-arrow-left float-right ml-2"> All student</a>
                        <a href="{{ url('/student-manage') }}" class="btn btn-info btn-raised btn-sm fa fa-arrow-left float-right mr-2"> Manage student</a>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_img text-center mb-5">
                                    
                                        <img class="rounded-circle" src="{{ asset('images/students') }}/{{ $student_show->student_image }}" alt="image" width="200">
                                    
                                  </div>
                              </div>
                        </div>
                        @if (session('message_error'))
                        <div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('message_error') }}</strong>
                        </div>
                        @endif
        
                            <form method="POST" action="{{ route('student_update',$student_show->student_id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Student First Name<span class="text-danger">*</span></label>
                                    <input value="{{ $student_show->student_fname }}" name="student_fname" type="text" 
                                    class="form-control @error('student_fname') is-invalid @enderror"
                                     placeholder="Enter First Name">
                                    @error('student_fname')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Student Last Name<span class="text-danger">*</span></label>
                                    <input value="{{ $student_show->student_lname }}" name="student_lname" type="text" 
                                    class="form-control @error('student_lname') is-invalid @enderror"
                                     placeholder="Enter Last Name">
                                    @error('student_lname')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
        
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Student Father's Name<span class="text-danger">*</span></label>
                                    <input value="{{ $student_show->student_father_name }}" name="student_father_name" type="text" 
                                    class="form-control @error('student_father_name') is-invalid @enderror" 
                                    placeholder="Enter Father's Name">
                                    @error('student_father_name')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Student Mother's Name<span class="text-danger">*</span></label>
                                    <input value="{{ $student_show->student_mother_name }}" name="student_mother_name" type="text"
                                     class="form-control @error('student_mother_name') is-invalid @enderror" 
                                     placeholder="Enter Mother's Name">
                                    @error('student_mother_name')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
        
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Student Address<span class="text-danger">*</span></label>
                                    <input value="{{ $student_show->student_address }}" name="student_address" type="text" 
                                    class="form-control @error('student_address') is-invalid @enderror" 
                                    placeholder="Enter Address">
                                    @error('student_address')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Phone Number(Father or Mother)<span class="text-danger">*</span></label>
                                    <input value="{{ $student_show->student_phone }}" name="student_phone" type="text" 
                                    class="form-control @error('student_phone') is-invalid @enderror" 
                                    placeholder="Enter Phone">
                                    @error('student_phone')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
                        
                                <div class="form-row">                                                           
                                    <div class="form-group col-md-6">
                                      <button type="submit" href="" class="btn btn-primary btn-raised">Update Student Information</button>
                                    </div>                  
                              </form>
                    </div>
                </div>
            </div>
     
        
    </div>
</div>
@endsection



@section('script2')
<script type="text/javascript">
    function readURL(input) {
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#image')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@if (session('message_success')){
<script>
 
    swal("Good job!", "Student Updated Successful!", "success", {
      button: "Okay",
    });
  </script>
@endif
@endsection

