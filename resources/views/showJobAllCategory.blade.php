@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid my-5">
    <div class="card">
        <div class="card-body">
            <h3 class="text-start mt-4">Applied Jobs</h3>
               @if(isset($added_jobs) && count($added_jobs)>0)
            <div class="row">
             
                @foreach($added_jobs as $job)
                <div class="col-sm-8 col-md-4 bg-primary m-4 text-center text-white">
                    <h4 class="text-white">Job Id: {{$job->job_id}}</h4>
                    <h5>Applicants: </h5>
                    <a href="{{route('application',['job_id' => $job->job_id])}}"> <button class="btn btn-primary"> View All <i class="fa-solid fa-right-from-bracket"></i></button> </a>

                </div>
                @endforeach
                @else
                    <div class="h2">No data found</div>
                @endif
            </div>
        </div>
    </div>
</div>




@endsection