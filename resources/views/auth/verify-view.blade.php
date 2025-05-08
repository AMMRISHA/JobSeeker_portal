
@extends('layouts.app')

@section('content')

{{$user->verification_code}}
<div class="container-fluid">
    <div class="card my-5">
        <div class="card-body">
            <div class="col-md-9">
            <form action="{{ route('verified') }}" method="post">
                @csrf
                <input type="hidden" name="email" value="{{ $user->email }}">
                <label for="verification_code" class="form-label">Enter Code</label>
                <input type="text" name="verification_code" class="form-control" placeholder="Enter the verification code">
                <button type="submit" class="btn btn-primary">Verify</button>
            </form>

            </div>
        </div>
    </div>
</div>

@endsection