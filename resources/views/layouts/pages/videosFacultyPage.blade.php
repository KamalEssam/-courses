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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <div class="col-12 col-md-10 col-lg-8">
        <form class="card card-sm" method="get" action="{{route('addVideo')}}">
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
    <!-- Upload  form allowed for admin -->
    @if(auth()->user()->role_id==1)

{{--        <div class="col-12 col-md-10 col-lg-8" style="margin: 10px;">--}}
{{--            <form class="card card-sm" method="post" action="{{route('addUrl')}}">--}}
{{--                @csrf--}}
{{--                <div class="card-body row no-gutters align-items-center">--}}
{{--                    <div class="col-auto">--}}
{{--                        <i class="fas h2 fa-cloud-upload-alt"></i>--}}
{{--                    </div>--}}
{{--                    <!--end of col-->--}}
{{--                    <div class="col">--}}
{{--                        <input class="form-control form-control-lg form-control-borderless" name="addurl" type="search"--}}
{{--                               placeholder="Put your video URL her!">--}}
{{--                    </div>--}}
{{--                    <!--end of col-->--}}
{{--                    <div class="col-auto">--}}
{{--                        <button class="btn btn-lg btn-danger" name="action" value="upload" type="submit">Upload URL--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <!--end of col-->--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
        <!--end of col-->
    <form action="{{route('addVideo')}}" method="post">
        @csrf
        <table>
            <tr>
                <td>
                    <div >
                        <div class="col-md-12 form-group">
                            <label for="name">Video Name </label>
                            <input type="text" id="name" name="video_name" class="form-control py-2">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </td>
                <td>
                    <div >
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
                </td>
                <td>
                    <div >
                        <div class="col-md-12 form-group">
                            <label for="name">Video Tag</label>
                            <input type="text" name="video_tag" class="form-control py-2">
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </td>
            </tr>
        </table>
        <div >
            <div class="col-md-6 form-group">
                <input type="submit" value="Add video" class="btn btn-primary px-5 py-2">
            </div>
        </div>
    </form>
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
        @foreach( $videos  as $vi)
            <div class="col-lg-9">
                <div class="row">
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
                </div>
                <!-- /.row -->
            </div>
    @endforeach
    <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
</div>
@include('includes.footer')
