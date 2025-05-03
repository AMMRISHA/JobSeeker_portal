@extends('layouts.app')

@section('content')
<div class="main">
        <div class="box col-md-6">
            <h3 class="text-white">SIGNUP</h3>
        
            <form action="{{route('add.signup.data')}}" method="POST" name="sinupform" id="sinupform">
                @csrf

                <div class="row">
                    <div class="col-md-9">
                    <input type="email" name="email" id="email" placeholder=" Email">
                    </div>
                    
                </div>
                <div class="row">
                        <div class="col-md-6">
                                    <input type="password" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                        
                        </div>
                
                </div>  
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="Firstname" id="Firstname" placeholder="Firstname">
                    </div>
                    <div class="col-md-6">
                    <input type="text" name="Lastname" id="Lastname" placeholder="Lastname">

                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="mobile" id="mobile" placeholder="Mobile No">
                
                    </div>
                    <div class="col-md-6">
                        <input type="text"  class=" datepicker" autocomplete="off" id="dob" name="birthday" placeholder="DOB"         >

                    </div>
                </div>             
            
                <div class="row">
                        <div class="col-md-12 d-flex my-2 ">
                                <div class="col-md-4">  
                                    <label for="is_applicant" class="form-label text-white" style="font-size:15px">What is your designation?</label>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" name="is_applicant" id="is_applicant">
                                        <option value="" selected>Open this select menu</option>
                            
                                        @foreach($user_type as $user)

                                        <option value="{{$user->user_type_id}}">{{$user->user_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                    </div>
                </div>
            
                <button type="submit" name="submit" id="submit" class="sininbtn">SIGN-UP </button><br><br>
                <a href="{{route('login-form')}}">Already have account ?</a>
            </form>


        </div>
    </div>


    @endsection


@push('scripts')


<script>
  
  $(document).ready(function () {
    let sixteenYearsAgo = new Date();
    sixteenYearsAgo.setFullYear(sixteenYearsAgo.getFullYear() - 16);

    $('.datepicker').datetimepicker({
        format: 'd-m-Y',
        timepicker: false,
        scrollInput: false,
        maxDate: sixteenYearsAgo, // Set max date to 16 years ago
        onChangeDateTime: function(dp, $input) {
            $input.trigger('change');
        }
    });
});


</script>

@endpush