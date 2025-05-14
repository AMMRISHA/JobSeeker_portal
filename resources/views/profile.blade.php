@extends('layouts.app')

@section('content')

<div style="display: flex
;
    justify-content: end;
    margin-right: 30px;">
<a href="{{ route('abasic.info.edit') }}" class="btn btn-primary btn-sm" style="margin-bottom:0px !important ; padding:5px;">
<i class="fas fa-edit text-sub " style="color:white !important;"></i>   Edit Profile
</a>
</div>
<div class=" col-md-12 bg-soft-primary my-5" style="border:none;">
    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-md-6">

            </div>
            <div class="col-md-12 mx-auto">
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
                                             <br>
                                                                @if($user_details && $user_details->photo)
                                                                    <img src="{{ asset('storage/' . $user_details->photo) }}" width="100" height="100" alt="User Photo" style="border-radius: 50%;" />
                                                                @else
                                                                    @if( $user_details && $user_details->gender == 'female')
                                                                        <img src="{{ asset('images/girl.png') }}" width="100" height="100" style="border-radius: 50%;" class="border" alt="" />
                                                                    @else
                                                                        <img src="{{ asset('images/boy.png') }}" width="100" height="100" style="border-radius: 50%;" class="border" alt="" />
                                                                    @endif
                                                                @endif
                                                            <br>

                                    </div>

                                    <h4 class="card-title mb-0">
                                        {{ $logged_in_user->name }}
                                    </h4>
                                     
  
                            </div>
</div>

<div class="row">

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
                                            @if($logged_in_user->birthday == NULL)
                                                    <strong>- -</strong>
                                            @else
                                                <strong>{{ $logged_in_user->birthday ? date('d-m-Y', strtotime($logged_in_user->birthday)) : '-' }}</strong>
                                            @endif  
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection