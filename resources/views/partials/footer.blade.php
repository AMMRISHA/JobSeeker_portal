<footer class="footer bg-dark section p-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md">
        <div class="footer-widget mb-4">
          <h2 class="heading-2 text-white">About</h2>
          <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
           <ul class="footer-social list-unstyled float-md-left float-lft mt-3 d-flex">
            <li class="animate"><a href="#"><img src="{{ asset('images/facebook-app-symbol.png') }}" alt="Footer Image" class="img-fluid mb-3">
            </a></li>
            <li class="animate"><a href="#"><img src="{{ asset('images/instagram.png') }}" alt="Footer Image" class="img-fluid mb-3">
            </a></li>
            <li class="animate"><a href="#"><img src="{{ asset('images/twitter.png') }}" alt="Footer Image" class="img-fluid mb-3">
            </a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="footer-widget mb-4">
          <h2 class="heading-2 text-white">Employers</h2>
          <ul class="list-unstyled">
            <li><a href="#" class="py-2 d-block text-white">How it works</a></li>
            <li><a href="#" class="py-2 d-block text-white">Register</a></li>
            <li><a href="#" class="py-2 d-block text-white">Post a Job</a></li>
            <li><a href="#" class="py-2 d-block text-white">Advance Skill Search</a></li>
            <li><a href="#" class="py-2 d-block text-white">Recruiting Service</a></li>
            <li><a href="#" class="py-2 d-block text-white">Blog</a></li>
            <li><a href="#" class="py-2 d-block text-white">Faq</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="footer-widget mb-4 ml-md-4">
          <h2 class="heading-2 text-white">Workers</h2>
          <ul class="list-unstyled">
            <li><a href="#" class="py-2 d-block text-white">How it works</a></li>
            <li><a href="#" class="py-2 d-block text-white">Register</a></li>
            <li><a href="#" class="py-2 d-block text-white">Post Your Skills</a></li>
            <li><a href="#" class="py-2 d-block text-white">Job Search</a></li>
            <li><a href="#" class="py-2 d-block text-white">Employer Search</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="footer-widget mb-4">
          <h2 class="heading-2 text-white">Have a Questions?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li class="text-white">Kalyani, Nadia, West Bengal</li>
              <li class="text-white">8967689621089</a></li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Footer bottom content -->
    <div class="row">
      <div class="col-md-12 text-center">
        <p class="text-white">
          Copyright &copy;
          <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with
          <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-white">jobsearch.com</a>
        </p>
      </div>
    </div>
  </div>
</footer>

@section('scripts')
<!-- Add any page-specific scripts -->

<script>
  $(document).ready(function () {
    // Initialize custom scripts
    $('#example').DataTable();  // Example DataTable initialization
  });
</script>
@endsection
