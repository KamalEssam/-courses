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
        <form class="card card-sm" method="post" action="{{route('search')}}">
            @csrf

            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                    <i class="fas fa-search h4 text-body"></i>
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" type="search"
                           placeholder="Search topics or keywords" value="{{$query}}" name="videoSearch">
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
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-3">
            <h1 class="my-4">Faculty</h1>
            <div class="list-group">
                <a href="{{url('faculty/videos')}}" class="list-group-item">All Videos</a>
                @foreach($faculties as $faculty)
                    <a href="{{url('faculty/video/'.$faculty->name)}}" class="list-group-item">{{$faculty->name}}</a>
                @endforeach
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <div class="row">@if(count($details)>0)
                    @foreach($details as $video)
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

                                @if(auth()->user()->role_id==1)
                                    <div class="row">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary"
                                                style="margin: 0px 43px 10px 37px;width: 76px;height: 40px;"
                                                data-toggle="modal" data-target="#exampleModalCenter"> Edit
                                        </button>
                                        <form action="{{url('/faculty/video/delete/'.$video->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"> delete</button>
                                        </form>
                                    </div>
                            @endif
                            <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{url('/faculty/video/edit/'.$video->id)}}" method="post">
                                                @method('patch')
                                                @csrf
                                                <div class="modal-body">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="name">Video Name </label>
                                                                        <input type="text" id="name" name="video_name"
                                                                               value="{{old("video_name")}}"
                                                                               class="form-control py-2">
                                                                    </div>
                                                                    @error('video_name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="name">Faculty</label>
                                                                        <select class="custom-select" name="faculty_id">
                                                                            <option value="null">Open this select menu
                                                                            </option>
                                                                            @foreach($faculties as $faculty)
                                                                                <option selected
                                                                                        value="{{$faculty->id}}">{{$faculty->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    @error('faculty_id')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="name">Video Tag</label>
                                                                        <input type="text" name="video_tag"
                                                                               value="{{old("video_tag")}}"
                                                                               class="form-control py-2">
                                                                    </div>
                                                                    @error('video_tag')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="name">Video URL </label>
                                                                        <input type="text" name="video_url"
                                                                               value="{{old("video_url")}}"
                                                                               class="form-control py-2">
                                                                    </div>
                                                                    @error('video_url')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                        <p style="padding: 129px 126px 96px 0px;color: #776b7b;width: 1000px;font-size: 78px;">  {{$message}}</p>
                    </div>
                @endif
            </div>
            <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
</div>
@include('includes.footer')
