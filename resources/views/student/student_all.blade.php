@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-light bg-dark font-weight-bold">
                    All Student List
                    <a href="{{ url('/student-add') }}" class="btn btn-warning btn-raised fa btn-sm fa-arrow-left float-right ml-2"> Add student</a>
                        <a href="{{ url('/student-manage') }}" class="btn btn-info btn-raised btn-sm fa fa-arrow-left float-right mr-2"> Manage student</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered text-center" id="example">
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
                        <th class="font-weight-bold text-primary" scope="col">Added By</th>
                        <th width="125" class="font-weight-bold text-primary" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $all_student as $row)                                                       
                        <tr>
                            <td class="pt-4">{{ $all_student->firstItem()+$loop->index }}</td>
                            <td  class="pt-4">{{ ucwords($row->student_fname.' '.$row->student_lname) }}</td>
                            <td><img class="rounded-circle" width="80" height="80" src="{{ asset('images/students') }}/{{ $row->student_image }}" alt=""></td>
                            <td class="pt-4">{{ $row->student_class }}</td>
                            <td class="pt-4">{{ $row->student_roll }}</td>
                            <td class="pt-4">{{ $row->student_father_name }}</td>
                            <td class="pt-4">{{ $row->student_mother_name }}</td>
                            <td class="pt-4">{{ $row->student_address }}</td>
                            <td class="pt-4">{{ $row->student_phone }}</td>
                            <td class="pt-4">{{ $row->user->name }}</td>
                            <td class="pt-4">
                                    <a href="{{ route('student_show',$row->student_id) }}"  class="fa fa-eye btn btn-info btn-raised btn-sm"></a>
                                @if (Auth::user()->role == 2)
                                    <a href="{{ route('student_edit',$row->student_id) }}" class="fa fa-pencil-square-o btn btn-warning btn-raised btn-sm"></a>
                                    <a href="{{ route('student_delete',encrypt($row->student_id)) }}" class="fa fa-trash-o btn btn-danger btn-raised btn-sm"></a>
                                @endif
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  
                  </table>  
                  {{ $all_student->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
      $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

    @if (session('message_success')){
        <script>

            swal("Good job!", "Student Deleted Successful!", "success", {
            button: "Okay",
            });
        </script>
    @endif
    
@endsection