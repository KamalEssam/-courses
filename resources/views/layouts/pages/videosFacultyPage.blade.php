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
<div class="row justify-content-center" style="margin: 73px 16px 33px 108px;">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <div class="col-12 col-md-10 col-lg-8">
        <form class="card card-sm" method="get" action="">
            @csrf
            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                    <i class="fas fa-search h4 text-body"></i>
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" type="search"
                           placeholder="Search topics or keywords">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-success" name="action" value="search" type="submit">Search</button>
                </div>
                <!--end of col-->
            </div>
        </form>
    </div>
    <!--end of col-->
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
        @foreach( $videos  as $vi)
            <div class="col-lg-9">
                <div class="row">
                    @if(count($vi->video)>0)
                        @foreach($vi->video as $video)
                        <div class="col-lg-4 col-md-6 mb-4" style="width: 898px;">
                            <div class="card h-100" style="width: fit-content;">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">
                                            <iframe width="200" height="150" src="{{$video->video_url}}" frameborder="0"
                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            <h5>{{$video->video_tag }}  {{$video->video_name }}   </h5>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="text-center">
                            <p style="padding: 129px 126px 96px 0px;color: #776b7b;width: 1000px;font-size: 78px;">  There's No Videos Now</p>
                        </div>
                    @endif
                </div>
                <!-- /.row -->
            </div>
    @endforeach
    <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
</div>
@include('includes.footer')
