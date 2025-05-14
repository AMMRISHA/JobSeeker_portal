
@extends('layouts.app')

@section('content')
<div class="col-sm-12 col-md-9 p-5" style="margin-left: 11px;">
  
    <h4 class="card-title text-center" style="padding: 0px 0px 10px !important;">Update Your Profile</h4>
    
    
   
</div>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
 
<div class="container-fluid">

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">                
                                     
                <div class="text-start text-smaller text-dark fs-20 card-header bg-theme ps-4 p-2 d-flex justify-content-between" style="padding: 7px 12px !important;">
                    
                        <div>
                            <h3 class="card-title mb-0">{{ $logged_in_user->name }}</h3>
                            <div class="row">
                                <div class="col">
                                    <span class="text-start text-smaller my-2" style="text-transform:none !important;">Fields marked with <span style="color:red;">*</span> are mandatory</span>
                                </div>
                            </div>
                            
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" onclick="window.location='{{ route('profile') }}'" title="Back">
                            <i class="fa fa-reply"></i>
                        </button>
                     
                    </div>
                    <div class="my-5 card-body">
                            
                               
                           <form action="{{route('update.job.info')}}" method ="post" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name ="id" value="{{$logged_in_user->id}}" >
                            <div class="row  mt-4 mb-4">
                                <div class="col-sm-12 col-md-9"  style="margin:auto; display:flex;justify-content: space-between; width:98% !important">




                                        <div class="form-group" style="width:90%">
                                         
                                                    <div class="col-sm-12 col-md-4">
                                                                <br>
                                                                @if($user_details && $user_details->photo)
                                                                    <img src="{{ asset('storage/' . $user_details->photo) }}" width="100" height="100" alt="User Photo" style="border-radius: 50%;" />
                                                                @else
                                                                    @if( $user_details && $user_details->gender == 'female')
                                                                        <img src="{{ asset('images/girl.png') }}" width="100" height="100" style="border-radius: 50%;" class="border" alt="" />
                                                                    @else
                                                                        <img src="{{ asset('images/boy.png') }}" width="100" height="100" style="border-radius: 50%;" class="border" alt="" />
                                                                    @endif
                                                                @endif
                                                            <br>
              
                                                    </div><!--col-->

                                            <br>
                                            <div class="col-sm-12 col-md-6">
                                            <input type="file" name="photo" accept="image/*"> 
                                            </div><!--col-->

                                        </div>
                                               
                                            </div>
                                            <div class="col">
                                    <span class="text-start text-smaller my-2" style="text-transform:none !important;text-align: right;  margin-left:8px;   padding-top: 20px;" >File size must not exceed 2MB</span>
                                </div>
                                <h3 class="text-start mt-4" >
                                               Basic  Information

                                            </h3>  

                                    <div class="form-group  row">
                                                                
                                            <div class="col-sm-12 col-md-4">
                                        
                                            <label class="col-form-label required-field">Name</span></label>
                                                    <input type="text" class="form-control input-box-inner-style " name="name" placeholder="Enter your name" value="{{$logged_in_user->name ? $logged_in_user->name : ''}}">
                                            </div><!--col-->
                                        
                                        
                                         
                                        <div class="col-sm-12 col-md-4">
                                    <label for="" class="col-form-label required-field"> Mobile</label>
                                    <input type="text" class="form-control input-box-inner-style " name="mobile" placeholder="Enter mobile" value="{{$logged_in_user->mobile ? $logged_in_user->mobile : ''}}">
                                        
                                </div>
                               
                                        <div class="col-sm-12 col-md-4">
                                    <div class="form-group" style="margin-bottom:15px !important;">
                                        <label class="col-form-label" >Father/Spouse Name</label>
                                        <input type="text" class="form-control input-box-inner-style "
                                            name="father_name" placeholder="Father/Spouse Name"
                                            value="{{$user_details && $user_details->father_name ? $user_details->father_name : ''}}"
                                            maxlength="50">
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group" style="margin-bottom:15px !important;">
                                        <label >Mother's Name</label>
                                        <input type="text" class="form-control input-box-inner-style"
                                            name="mother_name" placeholder="Mother's Name" 
                                             value="{{$user_details && $user_details->mother_name ? $user_details->mother_name : ''}}"
                                            maxlength="50" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group" style="margin-bottom:15px !important;">
                                        <label >Aadhar No.</label>
                                        <input type="text" class="form-control input-box-inner-style"
                                            name="aadhar_no" placeholder="Aandhar No." 
                                             value="{{$user_details && $user_details->aadhar_no ? $user_details->aadhar_no : ''}}">
                                    </div>
                                </div>     

                                    </div>   <!-- form-group --> 
                                             
                                            
                                    <!-- work information ends -->

                                    
                                             <h3 class="text-start mt-4">
                                               Personal Details

                                            </h3>  
                                

 
                                    <div class="form-group row">
                                    
                                    <div class="col-sm-12 col-md-4" >
                                            
                                            <label class="col-form-label required-field">Gender</label>
                                                <div>
                                                <div class="form-check form-check-inline">
                                                <input type="radio" class="radio-col-blue form-check-input"
                                                    name="gender" id="male" value="male"
                                                    @if(Request::old('gender') == "male") checked
                                                    @elseif(!empty($user_details) && $user_details->gender == "male") checked @endif>

                                                <label class=" form-check-label" for="male">Male</label>

                                                <div class="invalid-feedback">
                                                    &nbsp;Please choose a gender.
                                                </div>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="radio-col-blue form-check-input"
                                                    name="gender" id="female" value="female"
                                                    @if(Request::old('gender') == "female") checked
                                                    @elseif(!empty($user_details) && $user_details->gender == "female") checked @endif>
                                                <label class=" form-check-label" for="female">Female</label>
                                            </div>
                                        </div>
                                                        

                                    
                                                </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">

                                                    
                                        <label class=" form-check-label">Marital Status</label>
                                            <div style="display: flex; gap:10px;">
                        
                                            
                                            <div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="radio-col-blue form-check-input"
                                                    name="marital_status" id="single" value="single"
                                                    @if(Request::old('marital_status') == "single") checked
        @elseif(!empty($user_details) && $user_details->marital_status == "single") checked @endif >
                                                <label class=" form-check-label" for="single">Single</label>
                                                <div class="invalid-feedback">
                                                    &nbsp;Please choose a marital status.
                                                </div>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="radio-col-blue form-check-input"
                                                    name="marital_status" id="married" value="married"
                                                    @if(Request::old('marital_status') == "married") checked
        @elseif(!empty($user_details) && $user_details->marital_status == "married") checked @endif>
                                                <label class=" form-check-label" for="married">Married</label>
                                            </div>
                                        </div>


                                            </div>



                                        </div><!--col-->
                                        
                                </div>
                                <div class="form-group row">
                                <div class="form-group  row">
                                    <!-- Current Address -->
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom:15px !important;">
                                            <label >Address</label>
                                            <input type="text" class="form-control input-box-inner-style"
                                                name="address_2" maxlength="50" placeholder="Address"
                                                value="@if(Request::old('address_2')){{Request::old('address_2')}}@elseif($logged_in_user->address_2){{$logged_in_user->address_2}}@endif">
                                        </div>
                                    </div>
                                        <div class="col-md-4">
                                            <label >Country</label>
                                            <select class="form-control form-select shadow-none text-dark input-box-inner-style border"
                                                    id="country-dd" name="country" >
                                                <option value="{{$user_details && $user_details->country }}">
                                                    {{ $user_details && $user_details->country ? get_country_name($user_details->country) : 'Select Country' }}
                                                </option>
                                                @foreach ($country_details as $country)
                                                    <option value="{{ $country->id }}"
                                                       @if (Request::old('country') == $country->id || ($user_details && $country->id == $user_details->country)) 
                                                            selected 
                                                        @endif>
                                                        {{ $country->title_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label >State</label>
                                            <select class="form-control form-select shadow-none text-dark input-box-inner-style border"
                                                name="state" id="state-dd"
                                                data-user-id="{{ optional($user_details)->state }}">

                                                @if (!empty($user_details) && $user_details->state)
                                                    <option value="{{ $user_details->state }}" selected>
                                                        {{ get_state_name($user_details->state) }}
                                                    </option>
                                                @else
                                                    <option value="">Select State</option>
                                                @endif

                                                @foreach ($state_details as $state)
                                                    <option value="{{ $state->id }}"
                                                        @if (Request::old('state') == $state->id || (optional($user_details)->state == $state->id))
                                                            selected
                                                        @endif>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>
                                        
                                       

                                        <div class="col-sm-12 col-md-4">
                        
                                                        
                                            <label class="col-form-label  required-field">Date of Birth</label>
                                            
                                            <input type="text"  class=" form-control datepicker" autocomplete="off" id="dob" name="birthday" placeholder="dd-mm-yyyy"  value="{{ old('birthday', $logged_in_user->birthday ? \Carbon\Carbon::parse($logged_in_user->birthday)->format('d-m-Y') : '') }}"       >

                                        </div>
                                   
                               
                                
                                    </div>   <!-- form-group --> 
                                    
                                    <div class="form-group row">
                                                      
                                                        
                                                       


                                    </div><!--form-group row-->
                                        <div class="form-group  row">
                                                                
                                            
                                            <label class="col-form-label">About/expertise</label> <br>
                                            <div class="col-sm-12 col-md-6">
        
                                                <textarea name="about" id="about" class="form-control">
                                                    {{ old('about', optional($user_details)->about) }}
                                                </textarea>

                                            </div><!--col-->
    

                                        </div>   <!-- form-group --> 
                               
                                    <!-- identity Information starts -->
                                    



                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-sm-12 col-md-8" style="margin:auto;justify-content: center; align-items:center;display: flex
        ;">
                                            <div class="form-group mb-0 mt-2 clearfix text-center">
                                                <button type="submit" class="btn btn-primary btn-lg" style="margin-bottom:20px !important;">Update</button>
                                            </div><!--form-group-->
                                        </div><!--col-->
                                
                                    </div>
                                  
                                    </form>


      
                                            </div><!--tab panel-->
                    </div>
            </div>
                                    </div> <!-- form-group -->

                               
        </div>
    </div>
</div>
<!-- ============================================================== --><!-- End Container fluid  -->
<!-- ============================================================== -->                    
@endsection




@push('after-styles') 


<style>
      .input-group-text{
        height:33px;
    }
    .col-sm{

    }
    .additional-doc-div-2{
        display: -webkit-inline-box;
    justify-content: left;
    align-items: center;
    gap: 25px;

    }
    .additional-doc-div{
    border: 1px solid #ced4da;
    border-radius: 5px;
    padding: 10px;
    width: 100%;
    max-width:650px;
    
    }
    .file-upload{
        display:flex;
        gap:50px;
    }
  
 
    .fa-download{
        color:#594545;
    }
    .doc-delete-btn{
        border: none;
    background: none;
    color: #CB4154;
    }
    .doc-delete-btn:hover , .doc-delete-btn:active {
        color:#0d6efd;
    }

    .btn-outline-info:hover , .btn-outline-info:active{
        border:unset !important;
        
    }
    a .text-sub:hover{
        color:unset !important;
    }
    .text-sub{
        color:unset !important;
    }
    .table-responsive table tr th:last-child{
        text-align:center;
    }
    .table-responsive table tr td:last-child{
        display: flex
;
    justify-content: center;
    width: fit-content;
    /* gap: 20px; */
    /* border: none !important; */
    align-items: center;
    /* margin: auto; */
    width: auto;
    justify-content: space-evenly;
    }
    tbody{
        border:none !important;
    }
   
  .btn{
    margin-bottom:0px !important;
    padding: 5px 10px !important;
  }  
  

.col-md-8{
  width: 100%;
  margin: 50px auto;
}

.all-form-group-box{
  display: flex;
  flex-wrap: wrap;
  justify-content: left;
  margin-bottom: 100px;
  gap: 30px;
}
.row1{
  min-width: 200px;
  max-width: 100%;
  margin-top: 20px;
}

.col-md-8{
  display: flex;
  justify-content: space-between;
}
.col-sm-6{
  width: 33.3333333%;
    display: flex
;
    flex-direction: column;
    font-family: 'Source Sans Pro', sans-serif !important;
    font-size: 14px !important;
}
hr{
  margin: 1rem 0;
    color: inherit;
    background-color: currentColor;
    border: 0;
    opacity: .25;
}
     label{
       
       margin-bottom:10px;
   }

   @media (min-width: 768px) {
   .col-md-9 {
       flex: 0 0 auto;
       width: 90% !important;
   }
 
}
   
@media (max-width:860px) {
    .file-box strong , .additional-doc-div {
        font-size:12px !important ;
    }
}
.card-title , p , strong , td,th , .row {
   text-transform: capitalize;
}
   </style>



@endpush

<!-- jQuery -->


@push('scripts')


<script>
    ClassicEditor
        .create(document.querySelector('#about'))
        .catch(error => {
            console.error(error);
        });
</script>

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


    $(document).ready(function () {
    $('#photo').on('change', function () {
        var file = this.files[0];
        if (file) {
            var fileType = file.type;
            var validImageTypes = ["image/jpeg", "image/png", "image/jpg"];
            if (!validImageTypes.includes(fileType)) {
                alert("Only image files (JPG, PNG, JPEG) are allowed.");
                $(this).val(''); // Clear the file input
            }
        }
    });
});



</script>


@endpush
