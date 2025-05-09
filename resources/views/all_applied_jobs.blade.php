
@extends('layouts.app')

@section('content')


<div class="container-fluid my-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12   ">
                  <h3 class="text-start mt-4">Applied Jobs</h3>
                  
                    <div class="mt-4">
                        <table class="table  dataTable no-footer" >
                            <thead>
                                <tr>
                                    <th scope="col">Job Id</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Job Details</th>
                                    <th scope="col">Applied On</th>
                                    <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($job_details)
                                     @foreach($job_details as $jobs)

                                     <tr>
                                        <td>{{$jobs->job_id}}</td>
                                        <td>{{$jobs->company_name}}</td>
                                        <td>{!! $jobs->title . " , " . get_category_name_by_id($jobs->category) . '<br>' .  '<br>' . '<strong >' . $jobs->key_skills .' </strong> ', '<br>' .'<strong>Description : </strong> '. $jobs->description . '<br>' .  '<br>' .'<strong>Location:</strong> ' . get_country_name($jobs->country) . " , " .get_city_name($jobs->city) !!}</td>
                                        <td>{{ \Carbon\Carbon::parse($jobs->applied_at)->format('d M Y') }}</td>
                                      
                                        <td>
                                            <a class="btn btn-danger" href="{{route('withdraw', ['job_id' =>$jobs->job_id ])}}">Withdraw</a>
                                            <a class="btn btn-primary" href="{{route('job', ['job_id' =>$jobs->job_id ])}}">See Job</a>
                                        </td>
                                     </tr>




                                     @endforeach


                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No Jobs Found</td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>

                    </div>
     
                </div>
            </div>
        </div>
    </div>
</div>

@endsection