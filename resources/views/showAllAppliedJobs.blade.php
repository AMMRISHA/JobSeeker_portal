@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid my-5">
    <div class="card">
        <div class="card-body">
            <h3 class="text-start mt-4">Applied Jobs</h3>

            <div class="mt-4 table-responsive">
                <table class="table table-bordered dataTable no-footer ">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">Job ID</th>
                             <th scope="col">User ID</th>                            
                            <th scope="col">Applicant Details</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Job Details</th>
                            <th scope="col">Applied On</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="py-5">
                        @forelse($applied_job_application as $applied)
                            <tr>
                                <td>{{ $applied->job_id }}</td>
                                <td>{{$applied->id}}</td>
                                <td>
                                    {{ $applied->name }}<br>
                                    {{ $applied->email }}<br>
                                    {{ $applied->mobile }}
                                </td>
                                <td>{{ $applied->company_name }}</td>
                                <td>
                                    {{ $applied->title }}, {{ get_category_name_by_id($applied->category) }}<br><br>
                                    <strong>Key Skills:</strong> {{ $applied->key_skills }}<br><br>
                                    <strong>Description:</strong> {{ $applied->description }}<br><br>
                                    <strong>Location:</strong> {{ get_country_name($applied->country) }}, {{ get_city_name($applied->city) }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($applied->applied_at)->format('d M Y') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i> <!-- Three dots icon -->
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="{{ route('applicant_profile', ['user_id' => $applied->id]) }}"><i class="fa-solid fa-eye"></i> Profile</a></li>
                                            <li><a class="dropdown-item" href="{{ route('job', ['job_id' => $applied->job_id]) }}"><i class="fa-solid fa-eye"></i> Job Details</a></li>
                                            <li><a class="dropdown-item" href="{{ route('job', ['job_id' => $applied->job_id]) }}"><i class="fa-solid fa-eye"></i> Not Interested</a></li>
                                            <li><a class="dropdown-item" href="{{ route('job', ['job_id' => $applied->job_id]) }}"><i class="fa-solid fa-eye"></i> Interview</a></li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No Jobs Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
