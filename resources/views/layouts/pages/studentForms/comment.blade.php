@include('includes.header')
<!-- Page Content -->
<!-- Upload  form allowed for admin  -->
<div class="row rowOfcontent" style="margin-top: 58px;">
    <div style="margin-left: 27px;" class="col-lg-3">
        <h1 class="my-4">Faculty</h1>
        <div class="list-group">
            <a href="{{url('/faculties/posts')}}" class="list-group-item">All Posts </a>
            @foreach($faculties as $faculty)
                <a href="{{url('faculty/'.$faculty->name.'/posts')}}" class="list-group-item">{{$faculty->name}}</a>
            @endforeach
        </div>
    </div>

    <!-- display files from storage/.col-lg-3 -->
    <style>
        .panel-body {
            margin: 10px 10px 10px 10px;
        }

        .panel-default {

            width: 50%;
            margin: 17px 0px 0px 528px;
            background-color: #efefef;
            height: auto;
            border-radius: 10px 10px 10px;

        }

        .userImg {
            border-radius: 100px;
            width: 42px;
            height: 41px;
            margin: -7px 16px -5px 1px;
        }

        .postImg {
            width: 483px;
            height: auto;

        }

    </style>
    @foreach($post as $postD)
        <div class="col-lg-9">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="//placehold.it/150x150" class="userImg img-circle pull-left"> <a
                            href="#">{{$postD->user->name}}</a>
                        <div class="clearfix"></div>
                        <hr>
                        <p>{{$postD->postText}}</p>
                        <hr>
                        @if($postD->imagePath != null)
                            <div>
                                <img src="{{ Storage::url($postD->imagePath)}}" class="postImg img-circle pull-left">

                            </div>
                        @endif
                        <form action="{{route('comment',$postD->id)}}" method="post">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" style="margin-top: 10px;">{{count($postD->comment)}} comment</button>
                                </div>
                                <input type="text" name="comment" class="form-control" style=" margin-top: 10px;"
                                       placeholder="Add a comment..">
                                <input type="submit" value="post" style="margin-left: 5px;height: 39px;margin-top: 10px;" name="submitComment" class="btn-primary">
                            </div>

                        </form>
                        <hr>
                        @foreach($postD->comment as $comment)
                            <div class="comment">
                                <div class="row" style="margin-left: 10px;">
                                    <img src="//placehold.it/150x150" class="userImg img-circle pull-left"> <a
                                        href="#">{{$comment->user_name}}</a>
                                    <!-- Example single danger button -->
                                    @if(auth()->user()->id == $comment->user_id)
                                    <div class="btn-group" style="float: right;left: 977px;position: absolute;">
                                        <button type="button" class="btn btn-light dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                style="background-color: #efefef;border-color: #efefef;">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('delete.comment',$comment->id)}}">delete</a>
                                        </div>
                                    </div>
                                        @endif
                                </div>
                                <p style=" margin-left: 10px;padding-top: 10px;padding-left: 58px;">{{$comment->comment}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
    @endforeach
</div>
<!-- /.row -->
</div>


@include('includes.footer')
