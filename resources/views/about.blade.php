<!-- #1E7C98 -->

@extends('layouts.app')

@section('content')

<div class="hero-wrap js-fullheight" style="background-image: linear-gradient(90deg, rgba(2, 0, 36, 0.4) 0%, rgba(9, 9, 121, 0.4) 35%, rgba(0, 212, 255, 0.4) 100%), url('images/newbg2.jpg'); height: 600px; " data-stellar-background-ratio="0.5">
  <div class="container h-100 d-flex align-items-center justify-content-center">
    <div class="text-white w-100">
        
      <h1 class="mb-4" style="color:white"><span>About Us</h1>
      <div class="col-md-12 nav-link-wrap">
               
              </div>
          

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


