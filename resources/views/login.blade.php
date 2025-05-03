@extends('layouts.app')

@section('content')

<div class="main">
    <div class="box">
      <h3 class="text-white">Login</h3><br><br><br>
      <form action="{{ route('login') }}" method="post" name="login" id="login" onsubmit="return validateForm(event)">
        @csrf

        @if($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
        <input type="password" name="password" id="password" placeholder="Password"><br>

        <button class="sininbtn" type="submit" name="submit" id="submit">Login</button><br><br>
        <a href="{{ route('signup') }}">New User?</a> 
        <a href="{{ route('forget.password') }}">Forgot Password?</a>
      </form>
    </div>
</div>

@endsection

@push('after-scripts')
<script>
function validateForm(event) {
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();

    if (email === '') {
        alert("Email is required");
        event.preventDefault();
        return false;
    }

    if (password === '') {
        alert("Password is required");
        event.preventDefault();
        return false;
    }

    return true;
}
</script>
@endpush
