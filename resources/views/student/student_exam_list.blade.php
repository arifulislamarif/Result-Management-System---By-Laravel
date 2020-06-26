@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-light bg-dark">Exam Type</div>

                <div class="card-body">
                                    
                    <div class="btn-group">

                        <button type="button" class="btn btn-primary dropdown-toggle btn-raised" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Class Test
                        </button>
                        <div class="dropdown-menu nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#class_test_1" role="tab" aria-controls="v-pills-home" aria-selected="true">Class Test 1</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#class_test_2" role="tab" aria-controls="v-pills-profile" aria-selected="false">Class Test 2</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#class_test_3" role="tab" aria-controls="v-pills-messages" aria-selected="false">Class Test 3</a>
                            <a class="nav-link" id="v-pills-message-tab" data-toggle="pill" href="#class_test_4" role="tab" aria-controls="v-pills-messages" aria-selected="false">Class Test 4</a>
                            <a class="nav-link" id="v-pills-messag-tab" data-toggle="pill" href="#class_test_5" role="tab" aria-controls="v-pills-messages" aria-selected="false">Class Test 5</a>
                            <a class="nav-link" id="v-pills-messa-tab" data-toggle="pill" href="#class_test_6" role="tab" aria-controls="v-pills-messages" aria-selected="false">Class Test 6</a>
                            
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning dropdown-toggle btn-raised" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Semester Exam
                        </button>
                        <div class="dropdown-menu nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#semester_1" role="tab" aria-controls="v-pills-home" aria-selected="true">First Semester</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#semester_2" role="tab" aria-controls="v-pills-profile" aria-selected="false">Second Semester</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#semester_3" role="tab" aria-controls="v-pills-messages" aria-selected="false">Final Semester</a>     
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>




<div class="tab-content" id="v-pills-tabContent">
{{-- Class Test Tab Start  --}}

    {{-- Class Tab one  --}}
    <div class="tab-pane fade mb-5" id="class_test_1" role="tabpanel" aria-labelledby="v-pills-home-tab">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-light bg-dark">Class Test 1</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('class_test') }}">
                                @csrf
                                <h4 class="text-info text-center mb-3">Student Information</h4>
                                <input type="hidden" name="exam_type" value="class_test_1">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Student Class<span class="text-danger">*</span></label>
                                    <select value="{{ old('student_class') }}" name="student_class" 
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
                                  </div>
                                </div>
        
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Year<span class="text-danger">*</span></label>
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
                                    <label>Month<span class="text-danger">*</span></label>
                                    <select value="{{ old('month') }}" name="month" 
                                    class="form-control @error('month') is-invalid @enderror">
                                        <option value="">Select Month</option>
                                        <option value="January">January</option>                                    
                                    </select>
                                    @error('month')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
                                <h4 class="text-info text-center mb-3">Student Subject</h4>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Bangla<span class="text-danger">*</span></label>
                                    <input value="{{ old('bangla') }}" name="bangla" type="text" 
                                    class="form-control @error('bangla') is-invalid @enderror" 
                                    >
                                    @error('bangla')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>English<span class="text-danger">*</span></label>
                                    <input value="{{ old('english') }}" name="english" type="text" 
                                    class="form-control @error('english') is-invalid @enderror" 
                                    >
                                    @error('english')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Math<span class="text-danger">*</span></label>
                                    <input value="{{ old('math') }}" name="math" type="text" 
                                    class="form-control @error('math') is-invalid @enderror" 
                                    >
                                    @error('math')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Religion<span class="text-danger">*</span></label>
                                    <input value="{{ old('religion') }}" name="religion" type="text" 
                                    class="form-control @error('religion') is-invalid @enderror" 
                                    >
                                    @error('religion')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
        
                        
                                <div class="form-row">                                                         
                                  <div class="form-group col-md-6">
                                    <button type="submit" href="" class="btn btn-primary btn-raised">Save Student Result</button>
                                  </div>
                                  <div class="form-group col-md-2 offset-md-1">
                                    <button type="reset" href="" class="btn btn-danger btn-raised ml-3">Reset All</button>
                                  </div>
                                </div>                     
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    {{-- Class Tab two  --}}
        <div class="tab-pane fade mb-5" id="class_test_2" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-light bg-dark">Class Test 2</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('class_test') }}">
                                @csrf
                                <h4 class="text-info text-center mb-3">Student Information</h4>
                                <input type="hidden" name="exam_type" value="class_test_2">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Student Class<span class="text-danger">*</span></label>
                                    <select value="{{ old('student_class') }}" name="student_class" 
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
                                  </div>
                                </div>
        
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Year<span class="text-danger">*</span></label>
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
                                    <label>Month<span class="text-danger">*</span></label>
                                    <select value="{{ old('month') }}" name="month" 
                                    class="form-control @error('month') is-invalid @enderror">
                                        <option value="">Select Month</option>
                                        <option value="February">February</option>
                                    </select>
                                    @error('month')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
                                <h4 class="text-info text-center mb-3">Student Subject</h4>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Bangla<span class="text-danger">*</span></label>
                                    <input value="{{ old('bangla') }}" name="bangla" type="text" 
                                    class="form-control @error('bangla') is-invalid @enderror" 
                                    >
                                    @error('bangla')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>English<span class="text-danger">*</span></label>
                                    <input value="{{ old('english') }}" name="english" type="text" 
                                    class="form-control @error('english') is-invalid @enderror" 
                                    >
                                    @error('english')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Math<span class="text-danger">*</span></label>
                                    <input value="{{ old('math') }}" name="math" type="text" 
                                    class="form-control @error('math') is-invalid @enderror" 
                                    >
                                    @error('math')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Religion<span class="text-danger">*</span></label>
                                    <input value="{{ old('religion') }}" name="religion" type="text" 
                                    class="form-control @error('religion') is-invalid @enderror" 
                                    >
                                    @error('religion')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
        
                        
                                <div class="form-row">                                                         
                                  <div class="form-group col-md-6">
                                    <button type="submit" href="" class="btn btn-primary btn-raised">Save Student Result</button>
                                  </div>
                                  <div class="form-group col-md-2 offset-md-1">
                                    <button type="reset" href="" class="btn btn-danger btn-raised ml-3">Reset All</button>
                                  </div>
                                </div>                     
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            {{-- Class Tab Three  --}}
        <div class="tab-pane fade mb-5" id="class_test_3"role="tabpanel" aria-labelledby="v-pills-messages-tab">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-light bg-dark">Class Test 3</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('class_test') }}">
                                    @csrf
                                    <h4 class="text-info text-center mb-3">Student Information</h4>
                                    <input type="hidden" name="exam_type" value="class_test_3">
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Student Class<span class="text-danger">*</span></label>
                                        <select value="{{ old('student_class') }}" name="student_class" 
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
                                      </div>
                                    </div>
            
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Year<span class="text-danger">*</span></label>
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
                                        <label>Month<span class="text-danger">*</span></label>
                                        <select value="{{ old('month') }}" name="month" 
                                        class="form-control @error('month') is-invalid @enderror">
                                            <option value="">Select Month</option>
                                            <option value="May">May</option>                                         
                                        </select>
                                        @error('month')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <h4 class="text-info text-center mb-3">Student Subject</h4>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Bangla<span class="text-danger">*</span></label>
                                        <input value="{{ old('bangla') }}" name="bangla" type="text" 
                                        class="form-control @error('bangla') is-invalid @enderror" 
                                        >
                                        @error('bangla')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>English<span class="text-danger">*</span></label>
                                        <input value="{{ old('english') }}" name="english" type="text" 
                                        class="form-control @error('english') is-invalid @enderror" 
                                        >
                                        @error('english')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Math<span class="text-danger">*</span></label>
                                        <input value="{{ old('math') }}" name="math" type="text" 
                                        class="form-control @error('math') is-invalid @enderror" 
                                        >
                                        @error('math')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>Religion<span class="text-danger">*</span></label>
                                        <input value="{{ old('religion') }}" name="religion" type="text" 
                                        class="form-control @error('religion') is-invalid @enderror" 
                                        >
                                        @error('religion')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
            
                            
                                    <div class="form-row">                                                         
                                      <div class="form-group col-md-6">
                                        <button type="submit" href="" class="btn btn-primary btn-raised">Save Student Result</button>
                                      </div>
                                      <div class="form-group col-md-2 offset-md-1">
                                        <button type="reset" href="" class="btn btn-danger btn-raised ml-3">Reset All</button>
                                      </div>
                                    </div>                     
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


{{-- Class Tab Four  --}}
        <div class="tab-pane fade mb-5" id="class_test_4" role="tabpanel" aria-labelledby="v-pills-message-tab">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-light bg-dark">Class Test 4</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('class_test') }}">
                                    @csrf
                                    <h4 class="text-info text-center mb-3">Student Information</h4>
                                    <input type="hidden" name="exam_type" value="class_test_4">
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Student Class<span class="text-danger">*</span></label>
                                        <select value="{{ old('student_class') }}" name="student_class" 
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
                                      </div>
                                    </div>
            
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Year<span class="text-danger">*</span></label>
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
                                        <label>Month<span class="text-danger">*</span></label>
                                        <select value="{{ old('month') }}" name="month" 
                                        class="form-control @error('month') is-invalid @enderror">
                                            <option value="">Select Month</option>
                                            <option value="June">June</option>                                         
                                        </select>
                                        @error('month')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <h4 class="text-info text-center mb-3">Student Subject</h4>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Bangla<span class="text-danger">*</span></label>
                                        <input value="{{ old('bangla') }}" name="bangla" type="text" 
                                        class="form-control @error('bangla') is-invalid @enderror" 
                                        >
                                        @error('bangla')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>English<span class="text-danger">*</span></label>
                                        <input value="{{ old('english') }}" name="english" type="text" 
                                        class="form-control @error('english') is-invalid @enderror" 
                                        >
                                        @error('english')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Math<span class="text-danger">*</span></label>
                                        <input value="{{ old('math') }}" name="math" type="text" 
                                        class="form-control @error('math') is-invalid @enderror" 
                                        >
                                        @error('math')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>Religion<span class="text-danger">*</span></label>
                                        <input value="{{ old('religion') }}" name="religion" type="text" 
                                        class="form-control @error('religion') is-invalid @enderror" 
                                        >
                                        @error('religion')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
            
                            
                                    <div class="form-row">                                                         
                                      <div class="form-group col-md-6">
                                        <button type="submit" href="" class="btn btn-primary btn-raised">Save Student Result</button>
                                      </div>
                                      <div class="form-group col-md-2 offset-md-1">
                                        <button type="reset" href="" class="btn btn-danger btn-raised ml-3">Reset All</button>
                                      </div>
                                    </div>                     
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
{{-- Class Tab Five  --}}
        <div class="tab-pane fade mb-5" id="class_test_5"role="tabpanel" aria-labelledby="v-pills-messag-tab">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-light bg-dark">Class Test 5</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('class_test') }}">
                                    @csrf
                                    <h4 class="text-info text-center mb-3">Student Information</h4>
                                    <input type="hidden" name="exam_type" value="class_test_5">
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Student Class<span class="text-danger">*</span></label>
                                        <select value="{{ old('student_class') }}" name="student_class" 
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
                                      </div>
                                    </div>
            
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Year<span class="text-danger">*</span></label>
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
                                        <label>Month<span class="text-danger">*</span></label>
                                        <select value="{{ old('month') }}" name="month" 
                                        class="form-control @error('month') is-invalid @enderror">
                                            <option value="">Select Month</option>
                                            <option value="September">September</option>                                         
                                        </select>
                                        @error('month')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <h4 class="text-info text-center mb-3">Student Subject</h4>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Bangla<span class="text-danger">*</span></label>
                                        <input value="{{ old('bangla') }}" name="bangla" type="text" 
                                        class="form-control @error('bangla') is-invalid @enderror" 
                                        >
                                        @error('bangla')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>English<span class="text-danger">*</span></label>
                                        <input value="{{ old('english') }}" name="english" type="text" 
                                        class="form-control @error('english') is-invalid @enderror" 
                                        >
                                        @error('english')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Math<span class="text-danger">*</span></label>
                                        <input value="{{ old('math') }}" name="math" type="text" 
                                        class="form-control @error('math') is-invalid @enderror" 
                                        >
                                        @error('math')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>Religion<span class="text-danger">*</span></label>
                                        <input value="{{ old('religion') }}" name="religion" type="text" 
                                        class="form-control @error('religion') is-invalid @enderror" 
                                        >
                                        @error('religion')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
            
                            
                                    <div class="form-row">                                                         
                                      <div class="form-group col-md-6">
                                        <button type="submit" href="" class="btn btn-primary btn-raised">Save Student Result</button>
                                      </div>
                                      <div class="form-group col-md-2 offset-md-1">
                                        <button type="reset" href="" class="btn btn-danger btn-raised ml-3">Reset All</button>
                                      </div>
                                    </div>                     
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
{{-- Class Tab six  --}}
        <div class="tab-pane fade mb-5" id="class_test_6"role="tabpanel" aria-labelledby="v-pills-messa-tab">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-light bg-dark">Class Test 6</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('class_test') }}">
                                    @csrf
                                    <h4 class="text-info text-center mb-3">Student Information</h4>
                                    <input type="hidden" name="exam_type" value="class_test_6">
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Student Class<span class="text-danger">*</span></label>
                                        <select value="{{ old('student_class') }}" name="student_class" 
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
                                      </div>
                                    </div>
            
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Year<span class="text-danger">*</span></label>
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
                                        <label>Month<span class="text-danger">*</span></label>
                                        <select value="{{ old('month') }}" name="month" 
                                        class="form-control @error('month') is-invalid @enderror">
                                            <option value="">Select Month</option>
                                            <option value="October">October</option>                                         
                                        </select>
                                        @error('month')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <h4 class="text-info text-center mb-3">Student Subject</h4>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Bangla<span class="text-danger">*</span></label>
                                        <input value="{{ old('bangla') }}" name="bangla" type="text" 
                                        class="form-control @error('bangla') is-invalid @enderror" 
                                        >
                                        @error('bangla')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>English<span class="text-danger">*</span></label>
                                        <input value="{{ old('english') }}" name="english" type="text" 
                                        class="form-control @error('english') is-invalid @enderror" 
                                        >
                                        @error('english')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Math<span class="text-danger">*</span></label>
                                        <input value="{{ old('math') }}" name="math" type="text" 
                                        class="form-control @error('math') is-invalid @enderror" 
                                        >
                                        @error('math')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>Religion<span class="text-danger">*</span></label>
                                        <input value="{{ old('religion') }}" name="religion" type="text" 
                                        class="form-control @error('religion') is-invalid @enderror" 
                                        >
                                        @error('religion')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
            
                            
                                    <div class="form-row">                                                         
                                      <div class="form-group col-md-6">
                                        <button type="submit" href="" class="btn btn-primary btn-raised">Save Student Result</button>
                                      </div>
                                      <div class="form-group col-md-2 offset-md-1">
                                        <button type="reset" href="" class="btn btn-danger btn-raised ml-3">Reset All</button>
                                      </div>
                                    </div>                     
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

{{-- Class Test Tab end  --}}

{{-- Semester Tab Start  --}}

    {{-- Semester Tab one  --}}
    <div class="tab-pane fade mb-5" id="semester_1" role="tabpanel" aria-labelledby="v-pills-home-tab">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-light bg-dark">First Semester</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('semester_exam') }}">
                                @csrf
                                <h4 class="text-info text-center mb-3">Student Information</h4>
                                <input type="hidden" name="exam_type" value="semester_1">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Student Class<span class="text-danger">*</span></label>
                                    <select value="{{ old('student_class') }}" name="student_class" 
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
                                  </div>
                                </div>
        
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Year<span class="text-danger">*</span></label>
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
                                    <label>Month<span class="text-danger">*</span></label>
                                    <select value="{{ old('month') }}" name="month" 
                                    class="form-control @error('month') is-invalid @enderror">
                                        <option value="">Select Month</option>
                                        <option value="March">March</option>                                         
                                    </select>
                                    @error('month')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
                                <h4 class="text-info text-center mb-3">Student Subject</h4>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Bangla<span class="text-danger">*</span></label>
                                    <input value="{{ old('bangla') }}" name="bangla" type="text" 
                                    class="form-control @error('bangla') is-invalid @enderror" 
                                    >
                                    @error('bangla')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>English<span class="text-danger">*</span></label>
                                    <input value="{{ old('english') }}" name="english" type="text" 
                                    class="form-control @error('english') is-invalid @enderror" 
                                    >
                                    @error('english')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label>Math<span class="text-danger">*</span></label>
                                    <input value="{{ old('math') }}" name="math" type="text" 
                                    class="form-control @error('math') is-invalid @enderror" 
                                    >
                                    @error('math')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>Religion<span class="text-danger">*</span></label>
                                    <input value="{{ old('religion') }}" name="religion" type="text" 
                                    class="form-control @error('religion') is-invalid @enderror" 
                                    >
                                    @error('religion')
                                    <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                    @enderror
                                  </div>
                                </div>     
                                <div class="form-row">                                                         
                                  <div class="form-group col-md-6">
                                    <button type="submit" href="" class="btn btn-primary btn-raised">Save Student Result</button>
                                  </div>
                                  <div class="form-group col-md-2 offset-md-1">
                                    <button type="reset" href="" class="btn btn-danger btn-raised ml-3">Reset All</button>
                                  </div>
                                </div>                     
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    {{-- Semester Tab two  --}}
        <div class="tab-pane fade  mb-5" id="semester_2" role="tabpanel" aria-labelledby="v-pills-profile-tab">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-light bg-dark">Second Semester</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('semester_exam') }}">
                                    @csrf
                                    <h4 class="text-info text-center mb-3">Student Information</h4>
                                    <input type="hidden" name="exam_type" value="semester_2">
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Student Class<span class="text-danger">*</span></label>
                                        <select value="{{ old('student_class') }}" name="student_class" 
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
                                      </div>
                                    </div>
            
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Year<span class="text-danger">*</span></label>
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
                                        <label>Month<span class="text-danger">*</span></label>
                                        <select value="{{ old('month') }}" name="month" 
                                        class="form-control @error('month') is-invalid @enderror">
                                            <option value="">Select Month</option>
                                            <option value="July">July</option>                                         
                                        </select>
                                        @error('month')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <h4 class="text-info text-center mb-3">Student Subject</h4>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Bangla<span class="text-danger">*</span></label>
                                        <input value="{{ old('bangla') }}" name="bangla" type="text" 
                                        class="form-control @error('bangla') is-invalid @enderror" 
                                        >
                                        @error('bangla')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>English<span class="text-danger">*</span></label>
                                        <input value="{{ old('english') }}" name="english" type="text" 
                                        class="form-control @error('english') is-invalid @enderror" 
                                        >
                                        @error('english')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Math<span class="text-danger">*</span></label>
                                        <input value="{{ old('math') }}" name="math" type="text" 
                                        class="form-control @error('math') is-invalid @enderror" 
                                        >
                                        @error('math')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>Religion<span class="text-danger">*</span></label>
                                        <input value="{{ old('religion') }}" name="religion" type="text" 
                                        class="form-control @error('religion') is-invalid @enderror" 
                                        >
                                        @error('religion')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>     
                                    <div class="form-row">                                                         
                                      <div class="form-group col-md-6">
                                        <button type="submit" href="" class="btn btn-primary btn-raised">Save Student Result</button>
                                      </div>
                                      <div class="form-group col-md-2 offset-md-1">
                                        <button type="reset" href="" class="btn btn-danger btn-raised ml-3">Reset All</button>
                                      </div>
                                    </div>                     
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

            {{-- Semsester Tab Three  --}}

        <div class="tab-pane fade  mb-5" id="semester_3"role="tabpanel" aria-labelledby="v-pills-messages-tab">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-light bg-dark">Final Semester</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('semester_exam') }}">
                                    @csrf
                                    <h4 class="text-info text-center mb-3">Student Information</h4>
                                    <input type="hidden" name="exam_type" value="semester_3">
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Student Class<span class="text-danger">*</span></label>
                                        <select value="{{ old('student_class') }}" name="student_class" 
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
                                      </div>
                                    </div>
            
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Year<span class="text-danger">*</span></label>
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
                                        <label>Month<span class="text-danger">*</span></label>
                                        <select value="{{ old('month') }}" name="month" 
                                        class="form-control @error('month') is-invalid @enderror">
                                            <option value="">Select Month</option>
                                            <option value="December">December</option>                                         
                                        </select>
                                        @error('month')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <h4 class="text-info text-center mb-3">Student Subject</h4>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Bangla<span class="text-danger">*</span></label>
                                        <input value="{{ old('bangla') }}" name="bangla" type="text" 
                                        class="form-control @error('bangla') is-invalid @enderror" 
                                        >
                                        @error('bangla')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>English<span class="text-danger">*</span></label>
                                        <input value="{{ old('english') }}" name="english" type="text" 
                                        class="form-control @error('english') is-invalid @enderror" 
                                        >
                                        @error('english')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label>Math<span class="text-danger">*</span></label>
                                        <input value="{{ old('math') }}" name="math" type="text" 
                                        class="form-control @error('math') is-invalid @enderror" 
                                        >
                                        @error('math')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>Religion<span class="text-danger">*</span></label>
                                        <input value="{{ old('religion') }}" name="religion" type="text" 
                                        class="form-control @error('religion') is-invalid @enderror" 
                                        >
                                        @error('religion')
                                        <span style="font-weight:bold;" class="text-danger">{{ $message }}<span>
                                        @enderror
                                      </div>
                                    </div>     
                                    <div class="form-row">                                                         
                                      <div class="form-group col-md-6">
                                        <button type="submit" href="" class="btn btn-primary btn-raised">Save Student Result</button>
                                      </div>
                                      <div class="form-group col-md-2 offset-md-1">
                                        <button type="reset" href="" class="btn btn-danger btn-raised ml-3">Reset All</button>
                                      </div>
                                    </div>                     
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

{{-- Semester Tab end  --}}


</div>



@endsection

@section('script')

    @if (session('message_success')){
        <script>

            swal("Good job!", "Result Added Successful!", "success", {
            button: "Okay",
            });
        </script>
    @endif

    @if ($errors->any())
        <script>

            swal("Validation Error!", "Please Check Errors!", "error", {
            button: "Okay",
            });
        </script>
    @endif

@endsection