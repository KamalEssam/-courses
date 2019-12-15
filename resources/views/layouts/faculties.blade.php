@include('includes.header')

<div class="card" style="width: 18rem;display: inline-block; text-align: center; margin-left: 71px; margin-top: 114px; ">
    <img class="card-img-top" src="{{url('images/AOUfac.jpg')}}" alt="AOU Faculty image ">
    <div class="card-body">
        <h5 class="card-title"> Old Exams </h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary"> Enter</a>
    </div>
</div>
<div class="card" style="width: 18rem;display: inline-block; text-align: center; margin-left: 71px; margin-top: 114px; ">
    <img class="card-img-top" src="{{url('images/AOUfac.jpg')}}" alt="AOU Faculty image ">
    <div class="card-body">
        <h5 class="card-title"> Student form </h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary"> Enter</a>
    </div>
</div>
<div class="card" style="width: 18rem;display: inline-block; text-align: center; margin-left: 71px; margin-top: 114px; ">
    <img class="card-img-top" src="{{url('images/AOUfac.jpg')}}" alt="AOU Faculty image ">
    <div class="card-body">
        <h5 class="card-title"> Videos </h5>
        <p class="card-text"></p>
        <a href="{{route('showVideos')}}" class="btn btn-primary"> Enter</a>
    </div>
</div>

@include('includes.footer')
