
@include('includes.header')

    <section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_2.jpg);">
      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-sm-inner">
          <div class="col-md-7 text-center">

            <div class="mb-5 element-animate">
              <h1 class="mb-2">Contact Us</h1>
              <p class="bcrumb"><a href="index.html">Home</a> <span class="sep ion-android-arrow-dropright px-2"></span>  <span class="current">Contact Us</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="site-section element-animate">
      <div class="container">
        <div class="row">
          <div class="col-md-8 pr-md-5">
            <form action="#" method="post">
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" class="form-control py-2">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="phone">Phone</label>
                      <input type="text" id="phone" class="form-control py-2">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" class="form-control py-2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="message">Write Message</label>
                      <textarea name="message" id="message" class="form-control py-2" cols="30" rows="8"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Send Message" class="btn btn-primary">
                    </div>
                  </div>
                </form>
          </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h3 class="heading">Contact Information</h3>
                <div class="block-23">
                    <ul>
                        <li><span class="icon ion-android-pin"></span><span class="text">P.O.Box 21473 Jeddah 12015,Nahdat Ash Sharq ,As Salamah ,Jeddah,Saudi Arabia</span></li>
                        <li><a href="#"><span class="icon ion-ios-telephone"></span><span class="text"> +966 9200 00268
</span></a></li>
                        <li><a href="#"><span class="icon ion-android-mail"></span><span class="text">info@arabou.edu.sa</span></a></li>
                        <li><span class="icon ion-android-time"></span><span class="text">Saturday &mdash; wednesday 8:00am - 5:00pm</span></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>

      </div>
    </section>
    <!-- END section -->
    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3709.8343830408385!2d39.14798688505782!3d21.59238688569572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3da7ce5e6202b%3A0xa1624967671fb600!2z2KfZhNis2KfZhdi52Kkg2KfZhNi52LHYqNmK2Kkg2KfZhNmF2YHYqtmI2K3YqQ!5e0!3m2!1sar!2seg!4v1574208775805!5m2!1sar!2seg" width="600" height="450" frameborder="0" style="border:0; width: 80%;
    margin-left: 10%;
    border-color: #020202;" allowfullscreen=""></iframe>
    </div>


@include('includes.footer')
