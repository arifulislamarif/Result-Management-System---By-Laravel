@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <ul class="nav nav-pills nav-pills">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Select Class</a>
                    <div class="dropdown-menu nav " id="v-pills-tab" role="tablist">
                      <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-one" role="tab" aria-controls="v-pills-home" aria-selected="true">Class One</a>
                      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-two" role="tab" aria-controls="v-pills-profile" aria-selected="false">Class Two</a>
                      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-three" role="tab" aria-controls="v-pills-messages" aria-selected="false">Class Three</a>   
                      <a class="nav-link " id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-four" role="tab" aria-controls="v-pills-settings" aria-selected="false">Class Four</a>  
                      <a class="nav-link " id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-five" role="tab" aria-controls="v-pills-settings" aria-selected="false">Class Five</a>          
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="tab-content" id="v-pills-tabContent">
            {{-- class one  --}}
            <div class="tab-pane fade show" id="v-pills-one" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="card">
                <div class="card-header text-light bg-dark font-weight-bold">Manage Student</div>
        
                <div class="card-body">
                    
                    <table class="table table-bordered text-center">
                        <thead>
                          <tr class=" align-content-center">
                            <th class="font-weight-bold text-primary" scope="col">Sl. No.</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Image</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Class</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Roll</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Father's Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Mother's Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Address</th>
                            <th class="font-weight-bold text-primary" scope="col">Phone Number</th>
                            <th width="125" class="font-weight-bold text-primary" scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($class_one as $one)                                                       
                            <tr>
                                <td class="pt-4">{{ $loop->iteration }}</td>
                                <td  class="pt-4">{{ ucwords($one->student_fname.' '.$one->student_lname) }}</td>
                                <td><img class="rounded-circle" width="80" height="80" src="{{ asset('images/students') }}/{{ $one->student_image }}" alt=""></td>
                                <td class="pt-4">{{ $one->student_class }}</td>
                                <td class="pt-4">{{ $one->student_roll }}</td>
                                <td class="pt-4">{{ $one->student_father_name }}</td>
                                <td class="pt-4">{{ $one->student_mother_name }}</td>
                                <td class="pt-4">{{ $one->student_address }}</td>
                                <td class="pt-4">{{ $one->student_phone }}</td>
                                <td class="pt-4">
                                    <a href="{{ route('student_show',$one->student_id) }}"  class="fa fa-eye btn btn-info btn-raised btn-sm"></a>
                                    <a href="{{ route('student_edit',$one->student_id) }}" class="fa fa-pencil-square-o btn btn-warning btn-raised btn-sm"></a>
                                    <a href="{{ route('student_delete', encrypt($one->student_id)) }}" class="fa fa-trash-o btn btn-danger btn-raised btn-sm"></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            </div>
            {{-- class two  --}}
            <div class="tab-pane fade" id="v-pills-two" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <div class="card">
                <div class="card-header text-light bg-dark font-weight-bold">Manage Student</div>
        
                <div class="card-body">
                    
                    <table class="table table-bordered text-center">
                        <thead>
                          <tr class=" align-content-center">
                            <th class="font-weight-bold text-primary" scope="col">Sl. No.</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Image</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Class</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Roll</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Father's Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Mother's Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Address</th>
                            <th class="font-weight-bold text-primary" scope="col">Phone Number</th>
                            <th width="125" class="font-weight-bold text-primary" scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($class_two as $two)                                                       
                            <tr>
                                <td class="pt-4">{{ $loop->iteration }}</td>
                                <td  class="pt-4">{{ ucwords($two->student_fname.' '.$two->student_lname) }}</td>
                                <td><img class="rounded-circle" width="80" height="80" src="{{ asset('images/students') }}/{{ $two->student_image }}" alt=""></td>
                                <td class="pt-4">{{ $two->student_class }}</td>
                                <td class="pt-4">{{ $two->student_roll }}</td>
                                <td class="pt-4">{{ $two->student_father_name }}</td>
                                <td class="pt-4">{{ $two->student_mother_name }}</td>
                                <td class="pt-4">{{ $two->student_address }}</td>
                                <td class="pt-4">{{ $two->student_phone }}</td>
                                <td class="pt-4">
                                    <a href="{{ route('student_show',$two->student_id) }}"  class="fa fa-eye btn btn-info btn-raised btn-sm"></a>
                                    <a href="{{ route('student_edit',$two->student_id) }}" class="fa fa-pencil-square-o btn btn-warning btn-raised btn-sm"></a>
                                    <a href="{{ route('student_delete',encrypt($two->student_id)) }}" class="fa fa-trash-o btn btn-danger btn-raised btn-sm"></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            </div>
            {{-- class three --}}
            <div class="tab-pane fade" id="v-pills-three" role="tabpanel" aria-labelledby="v-pills-messages-tab">
              <div class="card">
                <div class="card-header text-light bg-dark font-weight-bold">Manage Student</div>
        
                <div class="card-body">
                    
                    <table class="table table-bordered text-center">
                        <thead>
                          <tr class=" align-content-center">
                            <th class="font-weight-bold text-primary" scope="col">Sl. No.</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Image</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Class</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Roll</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Father's Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Mother's Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Address</th>
                            <th class="font-weight-bold text-primary" scope="col">Phone Number</th>
                            <th width="125" class="font-weight-bold text-primary" scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($class_three as $three)                                                       
                            <tr>
                                <td class="pt-4">{{ $loop->iteration }}</td>
                                <td  class="pt-4">{{ ucwords($three->student_fname.' '.$three->student_lname) }}</td>
                                <td><img class="rounded-circle" width="80" height="80" src="{{ asset('images/students') }}/{{ $three->student_image }}" alt=""></td>
                                <td class="pt-4">{{ $three->student_class }}</td>
                                <td class="pt-4">{{ $three->student_roll }}</td>
                                <td class="pt-4">{{ $three->student_father_name }}</td>
                                <td class="pt-4">{{ $three->student_mother_name }}</td>
                                <td class="pt-4">{{ $three->student_address }}</td>
                                <td class="pt-4">{{ $three->student_phone }}</td>
                                <td class="pt-4">
                                    <a href="{{ route('student_show',$three->student_id) }}"  class="fa fa-eye btn btn-info btn-raised btn-sm"></a>
                                    <a href="{{ route('student_edit',$three->student_id) }}" class="fa fa-pencil-square-o btn btn-warning btn-raised btn-sm"></a>
                                    <a href="{{ route('student_delete',encrypt($three->student_id)) }}" class="fa fa-trash-o btn btn-danger btn-raised btn-sm"></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            </div>
            {{-- class four  --}}
            <div class="tab-pane fade" id="v-pills-four" role="tabpanel" aria-labelledby="v-pills-settings-tab">
              <div class="card">
                <div class="card-header text-light bg-dark font-weight-bold">Manage Student</div>
        
                <div class="card-body">
                    
                    <table class="table table-bordered text-center">
                        <thead>
                          <tr class=" align-content-center">
                            <th class="font-weight-bold text-primary" scope="col">Sl. No.</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Image</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Class</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Roll</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Father's Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Mother's Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Address</th>
                            <th class="font-weight-bold text-primary" scope="col">Phone Number</th>
                            <th width="125" class="font-weight-bold text-primary" scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($class_four as $four)                                                       
                            <tr>
                                <td class="pt-4">{{ $loop->iteration }}</td>
                                <td  class="pt-4">{{ ucwords($four->student_fname.' '.$four->student_lname) }}</td>
                                <td><img class="rounded-circle" width="80" height="80" src="{{ asset('images/students') }}/{{ $four->student_image }}" alt=""></td>
                                <td class="pt-4">{{ $four->student_class }}</td>
                                <td class="pt-4">{{ $four->student_roll }}</td>
                                <td class="pt-4">{{ $four->student_father_name }}</td>
                                <td class="pt-4">{{ $four->student_mother_name }}</td>
                                <td class="pt-4">{{ $four->student_address }}</td>
                                <td class="pt-4">{{ $four->student_phone }}</td>
                                <td class="pt-4">
                                    <a href="{{ route('student_show',$four->student_id) }}"  class="fa fa-eye btn btn-info btn-raised btn-sm"></a>
                                    <a href="{{ route('student_edit',$four->student_id) }}" class="fa fa-pencil-square-o btn btn-warning btn-raised btn-sm"></a>
                                    <a href="{{ route('student_delete',encrypt($four->student_id)) }}" class="fa fa-trash-o btn btn-danger btn-raised btn-sm"></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            </div>
            {{-- class five  --}}
            <div class="tab-pane fade" id="v-pills-five" role="tabpanel" aria-labelledby="v-pills-settings-tab">
              
              <div class="card">
                <div class="card-header text-light bg-dark font-weight-bold">Manage Student</div>
        
                <div class="card-body">
                    
                    <table class="table table-bordered text-center">
                        <thead>
                          <tr class=" align-content-center">
                            <th class="font-weight-bold text-primary" scope="col">Sl. No.</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Image</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Class</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Roll</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Father's Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Mother's Name</th>
                            <th class="font-weight-bold text-primary" scope="col">Student Address</th>
                            <th class="font-weight-bold text-primary" scope="col">Phone Number</th>
                            <th width="125" class="font-weight-bold text-primary" scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($class_five as $five)                                                       
                            <tr>
                                <td class="pt-4">{{ $loop->iteration }}</td>
                                <td  class="pt-4">{{ ucwords($five->student_fname.' '.$five->student_lname) }}</td>
                                <td><img class="rounded-circle" width="80" height="80" src="{{ asset('images/students') }}/{{ $five->student_image }}" alt=""></td>
                                <td class="pt-4">{{ $five->student_class }}</td>
                                <td class="pt-4">{{ $five->student_roll }}</td>
                                <td class="pt-4">{{ $five->student_father_name }}</td>
                                <td class="pt-4">{{ $five->student_mother_name }}</td>
                                <td class="pt-4">{{ $five->student_address }}</td>
                                <td class="pt-4">{{ $five->student_phone }}</td>
                                <td class="pt-4">
                                    <a href="{{ route('student_show',$five->student_id) }}" class="fa fa-eye btn btn-info btn-raised btn-sm"></a>
                                    <a href="{{ route('student_edit',$five->student_id) }}" class="fa fa-pencil-square-o btn btn-warning btn-raised btn-sm"></a>
                                    <a href="{{ route('student_delete',encrypt($five->student_id)) }}" class="fa fa-trash-o btn btn-danger btn-raised btn-sm"></a>
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
              
</div>
        
@endsection

@section('script')

    @if (session('message_succe')){
        <script>

            swal("Good job!", "Student Deleted Successful!", "success", {
            button: "Okay",
            });
        </script>
    @endif
    
@endsection