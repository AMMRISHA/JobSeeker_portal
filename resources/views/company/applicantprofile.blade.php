@extends('layouts.base')

@section('title', 'Applicant Profile')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif



<div class="bg-soft-primary my-5" style="border:none;">
    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-md-6">

            </div>
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                      
                        <div class="row mt-4 mb-4" style=" justify-content: space-between; background: white; padding: 20px 10px;border-radius: 20px">
                            <div class="col-12" style="margin: auto;
                                justify-content: center;
                                align-items: center;
                                display: flex;
                                margin-bottom:1px solid ;
                                flex-direction: column;">
                                    <div class="mx-auto">
                                            @if( $applicant_details  && $applicant_details->photo != '')
                                            <img width="100px" height="100px" src="{{ asset('storage/'.$applicant_details->photo) }}" alt="user not found" style="border-radius: 50%" />
                                            @else
                                             
                                            {{-- <img width="60px" height="60px" src="{{ asset('assets/images/users/user.jpg') }}" alt="user" style="border-radius: 50%" /> --}}
                                            @endif

                                    </div>

                                    <h4 class="card-title mb-0">
                                        {{ $applicant_details && $applicant_details->name ? $applicant_details->name : ' '  }}
                                    </h4>
                                     
  
                            </div>
                          

                        <div class="col-md-4">
                            <br>
                            Gender
                            <br>
                            
                          <strong> {{$applicant_details  && ($applicant_details->gender) ? $applicant_details->gender :"--" }}</strong> 
                        </div>
                        <div class="col-md-4">
                            <br>
                            DOB
                            <br>
                            
                                <strong>{{ $applicant_details && $applicant_details->birthday ? date('d-m-Y', strtotime($applicant_details->birthday)) : '-' }}</strong>
                            
                        </div><!--col-->
                        <div class="col-md-4">
                                    <br>
                                        Marital Status
                                    <br>


                                 <strong> {{$applicant_details && ($applicant_details->marital_status) ? $applicant_details->marital_status : '--'}}</strong>  
                                        
                                        
                                    </div><!--col-->
                                    <div class="col-md-4">
                                        <br> Father/Spouse Name
                                        <br />
                                        <strong>{{$applicant_details && ($applicant_details->father_name) ? $applicant_details->father_name : '--' }}</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <br> Mother Name
                                        <br /><strong>{{ $applicant_details && ($applicant_details->mother_name) ? $applicant_details->mother_name : '--' }}</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                            Aadhar No.
                                        <br>
                                          
                                            <strong>{{$applicant_details && ($applicant_details->aadhar_no) ? $applicant_details->aadhar_no : '--'}}</strong> 
                                         
                                        
                                        </div><!--col-->
                                
                                        <div class="col-md-4">
                                        <br>
                                            Citizenship
                                            <br>
                                            <strong>{{$applicant_details && ($applicant_details->country) ? get_country_name($applicant_details->country) : '--'}}</strong> 
                                         
                                    </div><!--col-->
                                    <div class="col-md-4">
                                        <br>
                                            State
                                            <br>
                                            <strong>{{$applicant_details && ($applicant_details->state) ? get_state_name($applicant_details->state) : '--'}}</strong> 
                                         
                                    </div><!--col-->
                                    <div class="col-md-4">
                                        <br>
                                            City
                                            <br>
                                            <strong>{{$applicant_details && ($applicant_details->city) ? get_city_name($applicant_details->city) : '--'}}</strong> 
                                         
                                    </div><!--col-->
                                    <br>
                                   
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <br>
                                            Email
                                            <br>
                                            <strong>{{$applicant_details && $applicant_details->email ? $applicant_details->email : ' '}}</strong>
                                        </div>
                                        <div class="col-md-6">
                                            <br>Phone No. <br>
                                            <strong>{{$applicant_details && $applicant_details->mobile ? $applicant_details->mobile : ' '}}</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br>
                                            Skills
                                            <br>
                                            <strong>{{ $applicant_details && $applicant_details->skills ? $applicant_details->skills : ' ' }}</strong>
                                        </div>
                                         <div class="col-md-9">
                                        <br>
                    
                                        About/Expertise
                                        <br>

                                        <strong>{{$applicant_details && ($applicant_details->about) ? $applicant_details->about : '--'}}</strong> 
                                       
                                    </div><!--col-->
                                    </div>
<hr>                              <h4 class="card-title mb-0">Documents </h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                          
                                           
                                            <strong>  Resume</strong>

                                                                                      <br>
                                                                @if($applicant_details && $applicant_details->resume)
    <div class="col-md-12" style=" height: 200px; overflow: auto; border: 1px solid #ccc;">
        <img src="{{ asset('storage/' . $applicant_details->resume) }}" alt="Resume" style="width:100%; height: auto; max-width: none;">
    </div>
@endif

                                                            <br>
                                        </div>@if(!empty($applicant_details->resume))
                                                <div class="file-box" style="margin-top:5px !important;">
                                                    <strong style="font-size:14px;">
                                                    {{$applicant_details->name}}   resume
                                                       
                                                    </strong>
                                                 
                                                    <a href="{{ route('file.download', basename($applicant_details->resume)) }}" style="margin-left: 10px;"  >
                                                                            <i class="fa fa-download"></i>
                                                    </a>
                                                    <!-- Delete Button -->
                                                 
                                                </div>
                                                @endif


                                    </div>
<hr>                              <h4 class="card-title mb-0">Action </h4>
@if($applicant_details->application_status && $applicant_details->application_status != 'rejected')
                                    <div class="row my-5 text-white">
                                        <div class="col-md-4 d-flex p-2">
                                            <form action="{{route('applicant.not.selected')}}" method="POST">
                                                @csrf
                                                    <input type="hidden" value="{{$applicant_details->user_id}}" name="user_id">
                                                    <input type="hidden" value="{{$applicant_details->job_id}}" name="job_id">
                                                    <button type="submit" class="btn btn-danger mx-4"> 
                                                        <i class="fa-solid fa-xmark"></i>  Not Interested
                                                    </button>
                                            </form>
                                            <form action="{{route('applicant.selected.interview')}}"method="POST">
                                                @csrf
                                                <input type="hidden" value="{{$applicant_details->user_id}}" name="user_id">
                                                <input type="hidden" value="{{$applicant_details->job_id}}" name="job_id">
                                                    
                                                <button class="btn btn-success"> <i class="fas fa-laptop-code"></i> Interview </button>
                                            </form>
                                        </div>
                                    </div>

                        @else

                         <form action="">
                            <button class="btn btn-success"> <i class="fas fa-laptop-code"></i> Interested  </button>
                         </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection