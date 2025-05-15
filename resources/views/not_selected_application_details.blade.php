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


                     
<div class="container-fluid my-5">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-between align-items-center">
            <div class="col-md-4">
                 <h3 class="text-start mt-4">Results Shown By Skills Filter</h3>
            </div>
             <div class="col-md-4 d-flex justify-content-end">
               <button type="cancel" name="back" class="btn btn-primary btn-sm " value="Back"
                                                        onclick="document.location ='{{ route('dashboard') }}'" title="Back">
                                                        <i class="fa fa-reply" aria-hidden="true"></i> 
                </button>
             </div>
             </div>
            <div class="mt-4 table-responsive">
                <table class="table table-bordered dataTable no-footer ">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">Job ID</th>
                            <th scope="col">Applicant Id ID</th>  
                             <th scope="col">User ID</th> 
                             <th scope="col">Applied On</th> 
                             <th scope="col">Applicant Skills</th>
                            <th scope="col">Applicant Description</th>
                            <th scope="col">Application_status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="py-5">
                      
                        @forelse($not_selected_application_details as $applied)
                            <tr>
                                <td>{{ $applied->job_id ? $applied->job_id  : ''}}</td>
                                <td>{{$applied->applicant_id ? $applied->applicant_id : ''}}</td>
                                <td>{{  $applied->user_id  ? $applied->user_id : '' }} </td>
                               <td>{{ \Carbon\Carbon::parse($applied->applied_at)->format('d M Y') }}</td>
                              
                                <td> {{ $applied->skills  ? $applied->skills : ''}} </td>
                                <td>{{ $applied->desc_yourself  ? $applied->desc_yourself : '' }} </td>
                                <td>
                                    {{$applied->application_status}}
                                </td>
                                
                                  <td>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i> <!-- Three dots icon -->
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="{{ route('applicant_profile', ['user_id' => $applied->user_id , 'job_id'=> $applied->job_id]) }}"><i class="fa-solid fa-eye"></i> Profile</a></li>
                                            <li><a class="dropdown-item" href="{{ route('job', ['job_id' => $applied->job_id]) }}"><i class="fa-solid fa-eye"></i> Job Details</a></li>
                                            <li><a class="dropdown-item" href="{{ route('job', ['job_id' => $applied->job_id]) }}"><i class="fa-solid fa-xmark"></i>  Not Interested</a></li>
                                            <li><a class="dropdown-item" href="{{ route('job', ['job_id' => $applied->job_id]) }}"><i class="fas fa-laptop-code"></i> Interview</a></li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No Applicants Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


@endsection