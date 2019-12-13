
@include('includes.header')
    <section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5"  style="background-image: url('images/big_image_2.jpg');">
      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-sm-inner">
          <div class="col-md-7 text-center">

            <div class="mb-5 element-animate">
              <h1 class="mb-2">Register</h1>
              <p class="bcrumb"><a href="index.html">Home</a> <span class="sep ion-android-arrow-dropright px-2"></span>  <span class="current">Register</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="form-wrap">
              <h2 class="mb-5">Register new account</h2>
              <form action="{{route('register')}}" method="post">
                @csrf
                  <div class="row">
                      <div class="col-md-12 form-group">
                              <label for="name">Name </label>
                          <input type="text" id="name" name="name" class="form-control py-2">
                      </div>
                      @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="row">
                      <div class="col-md-12 form-group">
                          <label for="name">Faculty</label>
                          <select class="custom-select" name="faculty_id" >
                              <option selected value="null">Open this select menu</option>
                              @foreach($faculties as $faculty)
                              <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                  @endforeach
                          </select>
                      </div>
                      @error('faculty_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Email Address</label>
                      <input type="email" name="email" class="form-control py-2">
                    </div>
                      @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Password</label>
                      <input type="password" name="password" class="form-control py-2 ">
                    </div>
                      @error('password')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Register" class="btn btn-primary px-5 py-2">
                    </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </section>
@include('includes.footer')
