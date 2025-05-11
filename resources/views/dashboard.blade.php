

@extends('layouts.base')

@section('title', 'Dashboard')
@section('content')

<div class="col-md-8 mx-auto" style="margin-top: 100px;">

<div class="container-fluid ">
   
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center d-flex align-items-center">
                 <div class="col-lg-8">
                    <h3 class="dashboard-main-heading text-primary">{{$user_details && $user_details->company_name ? $user_details->company_name : ''}} </h3>
                </div>
                <div class="col-lg-8 text-center">
                    <h5 class="dashboard-table-heading">Welcome back, {{$logged_in_user->name}} !</h5>
                </div>
            </div>
        </div>
    </div>
</div>
   <div class="container-fluid">
            <div class="row  ">
                    <div class="col-12 py-5">
                        <div class=" text-dark py-2 text-uppercase shadow-sm fw-bold" style="font-size: 14px !important; background-color: rgb(237,239,255) !important;" type="button" >
                                    Notices
                        </div>
                     
                        <div class="card py-1 my-5">
                        <div class="card-body">
                        <div class="row accordion-collapse show p-5" id="study-abroad-stats">		
                                
                            <div class="col-md-4 col-sm-4 col-6 py-2">
                                <div class="card bg-primary text-white" style=" height:95px; cursor:pointer;" >
                                    <div class="card-body">
                                                <div class="stats-heading">
                                                    <span>Total Applications</span>
                                                    <i class="fas fa-chart-pie float-end"></i>
                                                </div>
                                                <div class="stats-count">00</div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4 col-sm-4 col-6 py-2">
                                <div class="card bg-primary text-white" style=" height:95px; cursor:pointer;" >
                                    <div class="card-body">
                                                <div class="stats-heading">
                                                    <span>Upcoming Interview</span>
                                                    <i class="fas fa-chart-pie float-end"></i>
                                                </div>
                                                <div class="stats-count">00</div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4 col-sm-4 col-6 py-2">
                                <div class="card bg-primary text-white" style=" height:95px; cursor:pointer;" >
                                    <div class="card-body">
                                                <div class="stats-heading">
                                                    <span>Total Jobs Created</span>
                                                    <i class="fas fa-chart-pie float-end"></i>
                                                </div>
                                                <div class="stats-count">00</div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4 col-sm-4 col-6 py-2">
                                <div class="card bg-primary text-white" style=" height:95px; cursor:pointer;" >
                                    <div class="card-body">
                                                <div class="stats-heading">
                                                    <span>Total Selected</span>
                                                    <i class="fas fa-chart-pie float-end"></i>
                                                </div>
                                                <div class="stats-count">00</div>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-md-4 col-sm-4 col-6 py-2">
                                <div class="card bg-primary text-white" style=" height:95px; cursor:pointer;" >
                                    <div class="card-body">
                                                <div class="stats-heading">
                                                    <span>Tickets Arrises</span>
                                                    <i class="fas fa-chart-pie float-end"></i>
                                                </div>
                                                <div class="stats-count">00</div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
    </div>
</div>
</div>
</div>
@endsection
