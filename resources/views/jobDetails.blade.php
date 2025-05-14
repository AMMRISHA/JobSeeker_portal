@extends('layouts.app')

@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-8 mx-auto p-4">

     
        <div class="card">
            <div class="card-body">



                <div class="row align-items-center">
                
                        <h4 class="card-title mb-0 text-center ">
                    <strong> {{ get_category_name_by_id($job_details->job_id) }} </strong> 
                        </h4>
                
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12 my-2">
                    
                    <strong>Title :</strong>   
                    {{$job_details->title}}
                    </div>
                    <div class="col-md-12 my-2">
                    
                    <strong> Company :</strong>   
                    {{$job_details->company}}
                    </div>
                    <div class="col-md-12 my-1">
                        <strong>Description :</strong>
                        {{$job_details->description}}
                    </div>
                    <div class="col-md-12 my-1">
                        <strong>Skills required :</strong>
                        {{$job_details->key_skills}}
                    </div>
                    <div class="col-md-12 my-5">
                        <strong>Location :</strong>
                        {{get_country_name($job_details->country) . ',' . get_state_name($job_details->city)}}
                    </div>
                </div>
                @if(Auth::check() )
                    @if(Auth::user()->is_applicant == 1)
                    <a href="{{route('apply' , ['job_id' => $job_details->job_id])}}"><button class="btn btn-primary">Apply</button></a>
                    @else
                        <a href="#"><button class="btn btn-primary">Edit</button></a>
                
                    @endif
                @else
                    <a href="{{route('login-form')}}"><button class="btn btn-primary">Login to Apply</button></a>
            
                @endif
            </div>
        </div>
    </div>
   </div>
    </div>




@endsection