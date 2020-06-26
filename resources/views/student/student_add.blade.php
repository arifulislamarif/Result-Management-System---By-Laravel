@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-light bg-dark font-weight-bold">
                  Add Student
                  <a href="{{ url('/student-all') }}" class="btn btn-warning btn-raised fa btn-sm fa-arrow-left float-right ml-2"> All student</a>
                        <a href="{{ url('/student-manage') }}" class="btn btn-info btn-raised btn-sm fa fa-arrow-left float-right mr-2"> Manage student</a>
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

                    <form method="POST" action="{{ route('student_add_post') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Student First Name<span class="text-danger">*</span></label>
                            <input value="{{ old('student_fname') }}" name="student_fname" type="text" 
                            class="form-control @error('student_fname') is-invalid @enderror"
                             placeholder="Enter First Name">
                            @error('student_fname')
                            <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label>Student Last Name<span class="text-danger">*</span></label>
                            <input value="{{ old('student_lname') }}" name="student_lname" type="text" 
                            class="form-control @error('student_lname') is-invalid @enderror"
                             placeholder="Enter Last Name">
                            @error('student_lname')
                            <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                            @enderror
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Student Class<span class="text-danger">*</span></label>
                            <select value="{{ old('student_class') }}" name="student_class" id="" 
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
                            <label>Student Roll<span class="text-danger">*</span></label>
                            <input value="{{ old('student_roll') }}" name="student_roll" type="text"
                             class="form-control @error('student_roll') is-invalid @enderror" 
                             placeholder="Enter Roll">
                            @error('student_roll')
                            <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                            @enderror
                            @if (session('roll'))
                            <span style="font-weight:bold;" class="text-danger">{{ session('roll') }}<span>
                            @endif
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Student Father's Name<span class="text-danger">*</span></label>
                            <input value="{{ old('student_father_name') }}" name="student_father_name" type="text" 
                            class="form-control @error('student_father_name') is-invalid @enderror" 
                            placeholder="Enter Father's Name">
                            @error('student_father_name')
                            <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label>Student Mother's Name<span class="text-danger">*</span></label>
                            <input value="{{ old('student_mother_name') }}" name="student_mother_name" type="text"
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
                            <input value="{{ old('student_address') }}" name="student_address" type="text" 
                            class="form-control @error('student_address') is-invalid @enderror" 
                            placeholder="Enter Address">
                            @error('student_address')
                            <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label>Phone Number(Father or Mother)<span class="text-danger">*</span></label>
                            <input value="{{ old('student_phone') }}" name="student_phone" type="text" 
                            class="form-control @error('student_phone') is-invalid @enderror" 
                            placeholder="Enter Phone">
                            @error('student_phone')
                            <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                            @enderror
                          </div>
                        </div>

                
                        <div class="form-row">                       
                          <div class="form-group col-md-6">    
                            <img class="mb-2" src="#" id="image"/>                    
                            <label>Student Image<span class="text-danger">*</span></label>
                            <input type="file" name="student_image" 
                            accept="image/*" class="upload" onchange="readURL(this); ">
                            @error('student_image')
                            <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                            @enderror
                            </div>
                          
                          <div class="form-group col-md-6">
                            <button type="submit" href="" class="btn btn-primary btn-raised">Save Student Information</button>
                          </div>
                        </div>                     
                      </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




@section('script')
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
   
        swal("Good job!", "Student Inserted Successful!", "success", {
          button: "Okay",
        });
      </script>
    @endif

@endsection
