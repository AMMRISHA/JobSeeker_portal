<!-- #1E7C98 -->

@extends('layouts.app')

@section('content')
<div class="hero-wrap js-fullheight" style="background-image: linear-gradient(90deg, rgba(2, 0, 36, 0.4) 0%, rgba(9, 9, 121, 0.4) 35%, rgba(0, 212, 255, 0.4) 100%), url('images/newbg2.jpg'); height: 600px; " data-stellar-background-ratio="0.5">
  <div class="container h-100 d-flex align-items-center justify-content-center">
    <div class="text-white w-100">
        
      <h1 class="mb-4" style="color:white"><span> Your Dream</span> <br> Job is waiting for</h1>
      <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Job</a>

                  <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">anytime</a>

                </div>
              </div>
              <form action="{{ route('job.search') }}" method="post" class="search-job">
              @csrf 
              <div class="row justify-content-center py-3" style="background-color:white;">

            

                    <div class="col-md-12 tab-wrap">

                      <div class="tab-content p-4" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                          
                          <div class="row">
      
                              <div class="col-md">
                                <div class="form-group">
                                  <div class="form-field">
                                    <div class="icon"><span class="icon-briefcase"></span></div>
                                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="eg. Garphic. Web Developer">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md">
                                <div class="form-group">
                                  <div class="form-field">
                                    <div class="select-wrap">
                                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                      <select name="category" id="category" class="form-control">
                                          @foreach($job_category as $category)
                                          
                                              <option value="{{$category->job_category_id}}">{{$category->job_category}}</option>
                                          @endforeach
                                        
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-group">
                                  <div class="form-field">
                                    <button type="submit" name="search" id="search" class="form-control btn btn-primary">Search</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          
                        </div>

                      
                      </div>
                    </div>
              
              
                
              </div>
            </form>

    </div>
  </div>
</div>

<div id="liveSearchResults" class="list-group position-absolute w-100" style="z-index: 1000;"></div>


<div class="row align-items-center justify-content-center my-5 p-10">
  <div class="col-md-12  p-md-4">
    <h2 class="mb-4 text-center"><span>Recent</span> Jobs</h2>

    <div class="row"> <!-- Job cards row -->

      
    @forelse($job_details as $jobs)
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">{{ $jobs->title }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ get_category_name_by_id($jobs->job_id) }}</h6>
              <p class="card-text">{{ Str::limit($jobs->description, 100) ?? 'No description available' }}</p>
              <p>
                <strong>{{ get_country_name($jobs->country) }}</strong>,
                <strong>{{ get_city_name($jobs->city) }}</strong> <br>
              <a href="{{route('job', ['job_id' => $jobs->job_id])}}"><button class=" my-4 btn btn-primary">Apply</button></a> 
              </p>
            </div>
           
          </div>
        </div>
        @empty
          <p class="text-center">No recent jobs found.</p>
        @endforelse
        

    </div>

  </div>
</div>


      <div class="container p-md-4">
                  <div class="row my-5 text-left" >
                            <div class="col-sm-6 col-md-3 my-5 ">
                                      <img src="{{asset('images/employee.png')}}" alt="">
                                      <div class="media-body my-2">
                                            <h3 class="heading mb-3"  style="text-align: left; text-shadow:none !important; font-size: 14px;
                                  font-weight: 500;">Search Expert Candidates</h3>
                                            <p>A small river named Duden flows by their place and supplies.</p>
                                      </div>
                            </div>
                            <div class="col-sm-6 col-md-3 my-5">
                                      <img src="{{asset('images/resume.png')}}" alt="">
                                      <div class="media-body my-2">
                                            <h3 class="heading mb-3"  style=" text-align: left; text-shadow:none !important;   font-size: 14px;
                                  font-weight: 500;">Search Millions of Jobs</h3>
                                            <p>A small river named Duden flows by their place and supplies.</p>
                                      </div>

                            </div>
                            <div class="col-sm-6 col-md-3 my-5 text-left">
                                    <img src="{{asset('images/collaboration.png')}}" alt="">
                                    <div class="media-body my-2">
                                      <h3  class="heading mb-3 "  style="text-align: left; text-shadow:none !important;font-size: 14px;
                                  font-weight: 500;">Easy To Manage Jobs</h3>
                                      <p>End-to-end maintained with proper manner .</p>
                                    </div>
                            </div>
                              <div class="col-sm-6 col-md-3 my-5">
                                      <img src="{{asset('images/team-support.png')}}" alt="">
                                      <div class="media-body my-2">
                                        <h3 class="heading mb-3 "  style="text-align: left; text-shadow:none !important;font-size: 14px;
                              font-weight: 500;">Top Careers</h3>
                                        <p>A small river named Duden flows by their place and supplies.</p>
                                      </div>
                              </div>
                  </div>
      </div>



<div class="container mx-auto p-3">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ">
          <span class="subheading">Categories work wating for you</span>
          <h2 class="mb-4"><span>Current</span> Job Posts</h2>

                  </div>
      </div>
      <div class="row">
        <div class="col-md-3 ">
          <ul class="category">

            <li><a href="#">Web Development <span class="number">2</span></a></li>
            <li><a href="#">Graphic Designer <span class="number">0</span></a></li>
            <li><a href="#">Multimedia <span class="number">0</span></a></li>
            <li><a href="#">Advertising <span class="number"> 0</span></a></li>
          </ul>
        </div>
        <div class="col-md-3 ">
          <ul class="category">
            <li><a href="#">Education &amp; Training <span class="number">0</span></a></li>
            <li><a href="#">English <span class="number"> 0 </span></a></li>
            <li><a href="#">Social Media <span class="number">0</span></a></li>
            <li><a href="#">Writing <span class="number">0</span></a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="category">
            <li><a href="#">PHP Programming <span class="number">0</span></a></li>
            <li><a href="#">Project Management <span class="number">0</span></a></li>
            <li><a href="#">Finance Management <span class="number">0</span></a></li>
            <li><a href="#">Office &amp; Admin <span class="number">0</span></a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="category">
            <li><a href="#">Web Designer <span><span class="number">2</span></span></a></li>
            <li><a href="#">Customer Service <span class="number">0</span></a></li>
            <li><a href="#">Marketing &amp; Sales <span class="number">0</span></a></li>
            <li><a href="#">Software Development <span class="number">0</span></a></li>
          </ul>
        </div>
      </div>
    </div>



    <section class="img " id="section-counter" style="background-image: url(&quot;images/bg_1.jpg&quot;); background-position: 50% -207px;" data-stellar-background-ratio="0.5">
    <div class="container mx-auto p-4">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-3 d-flex justify-content-center counter-wrap ">
              <div class="block-18 text-center">
                <div class="text">
                  <strong class="number" data-number="1350000">1,350,000</strong>
                  <span>Jobs</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ">
              <div class="block-18 text-center">
                <div class="text">
                  <strong class="number" data-number="40000">40,000</strong>
                  <span>Members</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ">
              <div class="block-18 text-center">
                <div class="text">
                  <strong class="number" data-number="30000">30,000</strong>
                  <span>Resume</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ">
              <div class="block-18 text-center">
                <div class="text">
                  <strong class="number" data-number="10500">10,500</strong>
                  <span>Company</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="">
    <div class="bg-primary d-flex align-items-center p-5">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7 text-center heading-section heading-section-white">
            <h2>Subcribe to our Newsletter</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts. Separated they live in</p>
            <div class="row d-flex justify-content-center mt-4 mb-4">
              <div class="col-md-8">
                <form action="#" class="subscribe-form">
                  <div class="form-group d-flex">
                    <input type="text" class="form-control" placeholder="Enter email address">
                    <input type="submit" value="Subscribe" class="submit px-3">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection


@push('scripts')


<script>
$('#keyword').on('keyup', function() {
    let keyword = $(this).val();
    let category = $('#category').val(); // Category dropdown/input

    if (keyword.length >= 2 || category) {  // You can adjust the length condition
        $.ajax({
            url: '{{ route("job.livesearch") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                keyword: keyword,
                category: category
            },
            success: function(response) {
                $('#liveSearchResults').html(response.html).fadeIn();
            }
        });
    } else {
        $('#liveSearchResults').fadeOut();
    }
});

</script>

@endpush