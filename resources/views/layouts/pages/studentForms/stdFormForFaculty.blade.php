@include('includes.header')
<!-- Page Content -->
<!-- Upload  form allowed for admin  -->
<div class="row rowOfcontent" style="margin-top: 58px;">
    <div style="margin-left: 27px;" class="col-lg-3">
        <h1 class="my-4">Faculty</h1>
        <div class="list-group">
            <a href="{{url('/faculties/posts')}}" class="list-group-item">All posts</a>
            @foreach($faculties as $faculty)
                <a href="{{url('faculty/'.$faculty->name.'/posts')}}" class="list-group-item">{{$faculty->name}}</a>
            @endforeach
        </div>
    </div>
    <div class="col-lg-3">
        <div class="well well-sm well-social-post" style="margin-top: 92px;">
            <form class="postForm" action="{{route('postText')}}" method="post" enctype="multipart/form-data">
                @csrf
                <ul class="list-inline" id='list_PostActions' style="padding-bottom: 10px">
                    <li class='active'><a  >what's your status ?</a></li>
                    <li>Add photos   <input  type="file" name="image" class="btn btn-dark"></li>
                </ul>
                <textarea class="form-control" name="postText" placeholder="What's in your mind?"></textarea>
                <ul class='list-inline post-actions'>
                    <li class='pull-right'><input type="submit" style="margin: 10px;"  value="Post" class='btn btn-primary btn-xs'>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <!-- display files from storage/.col-lg-3 -->
    <style>
    .panel-body{
        margin: 10px 10px 10px 10px;
    }
        .panel-default{

            width: 50%;
            margin: 17px 0px 0px 528px;
            background-color: #efefef;
            height: auto;
            border-radius: 10px 10px 10px;

        }
        .userImg{
            border-radius: 100px;
            width: 42px;
            height: 41px;
            margin: -7px 16px -5px 1px;
        }
    .postImg{
        width: 483px;
        height: auto;

    }

    </style>
    @foreach($posts as $post)
    @foreach($post->post as $post)
    <div class="col-lg-9">
        <div class="row">

            @if(count($posts)>0)

                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="//placehold.it/150x150" class="userImg img-circle pull-left"> <a href="#"></a>
                        <div class="clearfix"></div>
                        <hr> <p>{{$post->postText}}</p>
                        <hr>
                        @if($post->imagePath != null)
                        <div >
                            <img src="{{ Storage::url($post->imagePath)}}" class="postImg img-circle pull-left">

                        </div>
                        @endif
                        <form action="{{route('comment',$post->id)}}" method="post">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                                </div>
                                <input type="text" class="form-control" name="comment" style=" margin-top: 10px;" placeholder="Add a comment..">
                            </div>
                        </form>

                    </div>
                </div>
            @else
                <div class="text-center">
                    <p class="nothingParagraph"> There's No Posts Now</p>
                </div>
            @endif
        </div>
        <!-- /.row -->
    </div>
        @endforeach
    @endforeach
    <!-- /.col-lg-9 -->
</div>
<!-- /.row -->
</div>
<script>

</script>

@include('includes.footer')
