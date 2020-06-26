@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Collections</div>

                <div class="card-body">
                    <div class="card mb-3" style="width: 20rem;">
                        <div class="card-body">
                          <h1 class="card-title">Total Students</h1>
                          <h5><strong class="card-text text-info">{{ $total_student }}</strong></h5>
                        </div>
                      </div>

                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                          <h1 class="card-title">Total Users</h1>
                          <h5><strong class="card-text text-info">{{ $total_users }}</strong></h5>
                        </div>
                    </div>

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
