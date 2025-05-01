@extends('layouts.app')

@section('content')
<div class="main">
        <div class="box">
            <h3>REGISTER YOURSELF</h3><br><br>
            <hr><br><br>
            <form action="{{route('add.signup.data')}}" method="POST" name="sinupform" id="sinupform">
                @csrf
                <input type="email" name="email" id="email" placeholder=" Email">
                <br>
                <input type="password" name="password" id="password" placeholder="Password">
                <br>

                <input type="text" name="Firstname" id="Firstname" placeholder="Firstname">
                <br>

                <input type="text" name="Lastname" id="Lastname" placeholder="Lastname">

                <br>
                <input type="number" name="mobile" id="mobile" placeholder="Mobile No">
                <br>
                <input type="date" name="dob" id="dob" placeholder="Date of Birth">
                <br>
                <button type="submit" name="submit" id="submit" class="sininbtn">SIGN-UP </button><br><br>
                <a href="job-post.php">Already have account ?</a>
            </form>


        </div>
    </div>


    @endsection