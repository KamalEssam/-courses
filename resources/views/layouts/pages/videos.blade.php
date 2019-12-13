@include('includes.header')
<!-- Page Content -->
<style>
    .form-control-borderless {
        border: none;
    }

    .form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
        border: none;
        outline: none;
        box-shadow: none;
    }
</style>

    <!-- Search form -->
   <div class="row justify-content-center" style="
    margin: 73px 16px 33px 108px;
">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

       <div class="col-12 col-md-10 col-lg-8">
        <form class="card card-sm" method="get" action="{{route('search')}}">
            @csrf
            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                    <i class="fas fa-search h4 text-body"></i>
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-success"name="action" value="search" type="submit">Search</button>
                </div>
                <!--end of col-->
            </div>
        </form>
    </div>
    <!--end of col-->
    <!-- Upload  form allowed for admin -->
       @if(auth()->user()->role_id==1)

       <div class="col-12 col-md-10 col-lg-8" style="margin: 10px;">
        <form class="card card-sm"method="post" action="{{route('addUrl')}}">
            @csrf
            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                    <i class="fas h2 fa-cloud-upload-alt"></i>
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" name="addurl" type="search" placeholder="Put your video URL her!">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-danger"name="action" value="upload" type="submit">Upload URL</button>
                </div>
                <!--end of col-->
            </div>
        </form>
    </div>
    <!--end of col-->

 @endif
    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Faculty</h1>
            <div class="list-group">
                @foreach($faculties as $faculty)
                    <a href="{{url('faculty/video/'.$faculty->name)}}" class="list-group-item">{{$faculty->name}}</a>
                @endforeach
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <div class="row">

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Item Two</a>
                            </h4>
                            <h5>$24.99</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
   </div>
@include('includes.footer')
