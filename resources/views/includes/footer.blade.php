{{--@extends('layouts.contact')--}}
<footer class="site-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h3>University</h3>
                <p>Perferendis eum illum voluptatibus dolore tempora consequatur minus asperiores temporibus.</p>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h3 class="heading">Quick Link</h3>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <a class="nav-link active" href="{{route('home')}}">Home</a>
                            <a class="nav-link active" href="{{route('facultyMaterials')}}">Faculties</a>
                            <a class="nav-link" href="{{route('blog')}}">Blog</a>
                            <a class="nav-link" href="{{route('about')}}">About</a>
                            <a class="nav-link" href="{{route('contact-us')}}">Contact</a>

                        </ul>
                    </div>
                </div>
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


        <div class="row pt-5">
            <div class="col-md-12 text-center copyright">

                <p class="float-md-left">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>Aou  <i class="fa fa-heart" aria-hidden="true"></i>
                  </p>
                <p class="float-md-right">
                    <a href="#" class="fa fa-facebook p-2"></a>
                    <a href="#" class="fa fa-twitter p-2"></a>
                    <a href="#" class="fa fa-linkedin p-2"></a>
                    <a href="#" class="fa fa-instagram p-2"></a>

                </p>
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
{{--<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>--}}
<script src="{{asset('js/main.js')}}"></script>


<script src="{{asset('js/js.js')}}"></script>
</body>
</html>
