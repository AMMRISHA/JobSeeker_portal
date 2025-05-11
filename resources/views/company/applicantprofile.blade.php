@extends('layouts.base')

@section('title', 'Applicant Profile')

@section('content')



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
                                            @if( $user_details  && $user_details->photo != '')
                                            <img width="100px" height="100px" src="{{ asset('storage/'.$user_details->photo) }}" alt="user not found" style="border-radius: 50%" />
                                            @else
                                             
                                            {{-- <img width="60px" height="60px" src="{{ asset('assets/images/users/user.jpg') }}" alt="user" style="border-radius: 50%" /> --}}
                                            @endif

                                    </div>

                                    <h4 class="card-title mb-0">
                                        {{ $user_details && $user_details->name ? $user_details->name : ' '  }}
                                    </h4>
                                     
  
                            </div>
                          

                        <div class="col-md-4">
                            <br>
                            Gender
                            <br>
                            
                          <strong> {{$user_details  && ($user_details->gender) ? $user_details->gender :"--" }}</strong> 
                        </div>
                        <div class="col-md-4">
                            <br>
                            DOB
                            <br>
                            
                                <strong>{{ $user_details && $user_details->birthday ? date('d-m-Y', strtotime($user_details->birthday)) : '-' }}</strong>
                            
                        </div><!--col-->
                        <div class="col-md-4">
                                    <br>
                                        Marital Status
                                    <br>


                                 <strong> {{$user_details && ($user_details->marital_status) ? $user_details->marital_status : '--'}}</strong>  
                                        
                                        
                                    </div><!--col-->
                                    <div class="col-md-4">
                                        <br> Father/Spouse Name
                                        <br />
                                        <strong>{{$user_details && ($user_details->father_name) ? $user_details->father_name : '--' }}</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <br> Mother Name
                                        <br /><strong>{{ $user_details && ($user_details->mother_name) ? $user_details->mother_name : '--' }}</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                            Aadhar No.
                                        <br>
                                          
                                            <strong>{{$user_details && ($user_details->aadhar_no) ? $user_details->aadhar_no : '--'}}</strong> 
                                         
                                        
                                        </div><!--col-->
                                
                                        <div class="col-md-4">
                                        <br>
                                            Citizenship
                                            <br>
                                            <strong>{{$user_details && ($user_details->country) ? get_country_name($user_details->country) : '--'}}</strong> 
                                         
                                    </div><!--col-->
                                    <div class="col-md-4">
                                        <br>
                                            State
                                            <br>
                                            <strong>{{$user_details && ($user_details->state) ? get_state_name($user_details->state) : '--'}}</strong> 
                                         
                                    </div><!--col-->
                                    <div class="col-md-4">
                                        <br>
                                            City
                                            <br>
                                            <strong>{{$user_details && ($user_details->city) ? get_city_name($user_details->city) : '--'}}</strong> 
                                         
                                    </div><!--col-->
                                    <br>
                                    <div class="col-md-9">
                                        <br>
                    
                                        About/Expertise
                                        <br>

                                        <strong>{{$user_details && ($user_details->about) ? $user_details->about : '--'}}</strong> 
                                       
                                    </div><!--col-->
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <br>
                                            Email
                                            <br>
                                            <strong>{{$user_details && $user_details->email ? $user_details->email : ' '}}</strong>
                                        </div>
                                        <div class="col-md-6">
                                            <br>Phone No. <br>
                                            <strong>{{$user_details && $user_details->mobile ? $user_details->mobile : ' '}}</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br>
                                            Skills
                                            <br>
                                            <strong>{{ $applicant_details && $applicant_details->skills ? $applicant_details->skills : ' ' }}</strong>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection