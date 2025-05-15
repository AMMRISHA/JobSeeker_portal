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
<form action="{{ route('announcement.store') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{$logged_in_user->id}}">
    
    <div class="form-group">
        <label for="title">Announcement Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="message">Announcement Message</label>
        <textarea name="message" class="form-control" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

@endsection