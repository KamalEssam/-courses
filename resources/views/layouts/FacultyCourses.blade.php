@include('includes.header')
@foreach($facultyCourses as $fac)
<div class="card" style="width: 18rem;display: inline-block; text-align: center; margin-left: 71px;background-color: #05da4280; margin-top: 114px; ">
    <div class="card-body">
        <h5 class="card-title" style="padding: unset;margin: unset;font-size: 20px;">{{$fac->course_code}} - {{ $fac->course_name}}</h5>
        <p class="card-text"></p>
    </div>
</div>
@endforeach
@include('includes.footer')
