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
        <form class="card card-sm" method="post" action="{{route('search.file')}}">
            @csrf
            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                    <i class="fas fa-search h4 text-body"></i>
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" value="{{$query}}"
                           name="fileSearch" type="search"
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
    <style>

    </style>
    <!-- Upload  form allowed for admin  -->
    @if(auth()->user()->role_id==1)
        <form class="md-form" action="{{route('upload')}}" method="post" style="margin: 10px"
              enctype="multipart/form-data">
            @csrf
            <div class="file-field">
                <a class="btn-floating purple-gradient mt-0 float-left">
                    <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                    <input type="file" name="file" class="btn btn-dark">
                    @foreach($errors->all() as $message)
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @endforeach
                    @if( $message=Session::get("message"))
                        <div class="alert alert-success" role="alert">
                            {{$message}}
                        </div>
                    @endif
                </a>
                <button type="submit" class="btn btn-primary" style="margin-left: 10px; height: 43px;">Upload</button>
            </div>
        </form>
@endif
<!--end of col-->
    <div class="row" style="margin-top: 58px;">
        <div class="col-lg-3">
            <h1 class="my-4">Faculty</h1>
            <div class="list-group">
                <a href="{{url('/faculty/files')}}" class="list-group-item">All Videos</a>
                @foreach($faculties as $faculty)
                    <a href="{{url('faculty/'.$faculty->name.'/files')}}" class="list-group-item">{{$faculty->name}}</a>
                @endforeach
            </div>
        </div>
        <!-- display files from storage/.col-lg-3 -->
        <div class="col-lg-9">
            <div class="row">
                @if(count($details)>0)
                    @foreach($details as $file)
                        <div class="col-lg-4 col-md-6 mb-4" style="width: 898px;">
                            <div class="card h-100" style="width: fit-content;">
                                <a href="#"><img class="card-img-top" src="{{url('icon/filePng.png')}}"
                                                 style="width:73%" alt=""></a>
                                <div class="card-body">
                                    <div class="line" style="width: 200px;">
                                        <a href="{{route('download',$file->id)}}">{{$file->fileName}}</a>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary"><a style="color: #000000;"
                                                                                     href="{{route('download',$file->id)}}">Download</a>
                                    </button>
                                    @if(auth()->user()->role_id==1)
                                    <form style="    display: contents;"
                                          action="{{url('/faculty/file/delete/'.$file->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"> Delete</button>
                                    </form>
                                        @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                        <p class="nothingParagraph"> There's No files Now</p>
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
