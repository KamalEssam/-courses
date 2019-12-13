
    @include('includes.header')

    <div class="card" style="    width: 70%;
    margin-top: 82px;
    margin-left: 232px;
    margin-bottom: 16px;">
        <div class="card-header">
            The equalized courses for this student
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Completed Courses :
            @foreach($Completed as $compCourse)
                    <button type="button" class="btn btn-success">{{$compCourse}}</button>
                @endforeach
            </li>
            <li class="list-group-item"> Not Completed Courses :
                @foreach($notCom as $notCompCourse)
                    <button type="button" class="btn btn-danger">{{$notCompCourse}}</button>
                @endforeach</li>
            <li class="list-group-item">Completed Credit Hour :

                    <button type="button" class="btn btn-success">{{$course_hours}}</button> of
                    <button type="button" class="btn btn-danger">{{$All_course_hours}}</button>

            </li>


        </ul>
    </div>
    @include('includes.footer')
