@extends('layouts.app')

@section('content')

<div class="container-fluid my-5">
    <div class="card">
        <div class="card-body">
            <div class="col-12  text-center">
                 <strong>You Have successfully submitted the application.</strong>
        
            </div>
            <div class="col-12  d-flex align-items-center justify-content-center">
                  <a class="btn btn-primary" href="{{route('index')}}">
                     <i class="fa fa-arrow-left"></i> Back to home
                </a>
            </div>
          
        </div>
    </div>
</div>

@endsection