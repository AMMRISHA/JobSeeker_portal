@extends('layouts.base')

@section('title', 'Jobs')

@section('content')
<div style="display: flex; justify-content: end; margin-right: 30px;">
    <button type="button" class="btn btn-primary btn-sm my-5" data-bs-toggle="modal" data-bs-target="#createJobModal">
        <i class="fas fa-plus"></i> Create
    </button>
</div>

<div class="container-fluid my-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-start mt-4">All Jobs</h3>
                    <div class="mt-4">
                        <table class="table dataTable no-footer">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Company Name</th>
                                    <th>Title</th>
                                    <th>Key Skills</th>
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Added Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($job_details) && count($job_details) > 0)
                                    @foreach($job_details as $jobs)
                                        <tr>
                                            <td>{{ $jobs->job_id }}</td>
                                            <td>{{ $jobs->company_name }}</td>
                                            <td>{{ $jobs->title }}</td>
                                            <td>{{ $jobs->key_skills }}</td>
                                            <td>{{ $jobs->description }}</td>
                                            <td><strong>Location:</strong> {{ get_country_name($jobs->country) }}, {{ get_city_name($jobs->city) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($jobs->applied_at)->format('d M Y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{ route('job', ['job_id' => $jobs->job_id]) }}"><i class="fa-solid fa-eye"></i> View</a></li>
                                                        <li>
                                                            <button
                                                                type="button"
                                                                class="dropdown-item editJobBtn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editJobModal"
                                                                data-job-id="{{ $jobs->job_id }}"
                                                                data-title="{{ $jobs->title }}"
                                                                data-company-name="{{ $jobs->company_name }}"
                                                                data-key-skills="{{ $jobs->key_skills }}"
                                                                data-description="{{ $jobs->description }}"
                                                                data-country="{{ $jobs->country }}"
                                                                data-city="{{ $jobs->city }}"
                                                                data-category="{{ $jobs->category }}"
                                                            >
                                                                <i class="fas fa-edit text-sub"></i> Edit
                                                            </button>
                                                        </li>
                                                        <li><a class="dropdown-item text-danger" href="#"><i class="fa-solid fa-trash"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">No Jobs Found</td>
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

<!-- Create Job Modal -->
<div class="modal fade" id="createJobModal" tabindex="-1" aria-labelledby="createJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('store.job') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Job Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="company_name">
                    </div>

                    <div class="mb-3">
                        <label for="key_skills" class="form-label">Key Skills</label>
                        <input type="text" class="form-control" name="key_skills">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Job Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" name="country">
                                <option value="101">India</option>
                                <option value="102">USA</option>
                            </select>
                        </div>

                        @if(isset($job_category) && count($job_category))
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="category">
                                @foreach($job_category as $category)
                                    <option value="{{ $category->job_category_id }}">{{ $category->job_category }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="col-md-6 mb-3">
                            <label for="city" class="form-label">City</label>
                            <select class="form-select" name="city">
                                <option value="1">Kolkata</option>
                                <option value="2">Delhi</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Job</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Job Modal -->
<div class="modal fade" id="editJobModal" tabindex="-1" aria-labelledby="editJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('update.job') }}" method="POST">
            @csrf
            <input type="hidden" name="job_id" id="edit_job_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_title" class="form-label">Job Title</label>
                        <input type="text" class="form-control" id="edit_title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="edit_company_name" name="company_name">
                    </div>

                    <div class="mb-3">
                        <label for="edit_key_skills" class="form-label">Key Skills</label>
                        <input type="text" class="form-control" id="edit_key_skills" name="key_skills">
                    </div>

                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Job Description</label>
                        <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_country" class="form-label">Country</label>
                            <select class="form-select" id="edit_country" name="country">
                                <option value="101">India</option>
                                <option value="102">USA</option>
                            </select>
                        </div>

                        @if(isset($job_category) && count($job_category))
                        <div class="col-md-6 mb-3">
                            <label for="edit_category" class="form-label">Category</label>
                            <select class="form-select" id="edit_category" name="category">
                                @foreach($job_category as $category)
                                    <option value="{{ $category->job_category_id }}">{{ $category->job_category }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="col-md-6 mb-3">
                            <label for="edit_city" class="form-label">City</label>
                            <select class="form-select" id="edit_city" name="city">
                                <option value="1">Kolkata</option>
                                <option value="2">Delhi</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Job</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Script to fill Edit Modal -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.editJobBtn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('edit_job_id').value = this.dataset.jobId;
            document.getElementById('edit_title').value = this.dataset.title;
            document.getElementById('edit_company_name').value = this.dataset.companyName;
            document.getElementById('edit_key_skills').value = this.dataset.keySkills;
            document.getElementById('edit_description').value = this.dataset.description;
            document.getElementById('edit_country').value = this.dataset.country;
            document.getElementById('edit_city').value = this.dataset.city;
            document.getElementById('edit_category').value = this.dataset.category;
        });
    });
});
</script>
@endsection
