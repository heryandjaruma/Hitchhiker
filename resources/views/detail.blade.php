@extends('template.navbar')
@section('title', 'Course Detail')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <h1 class="my-4">
            {{$course->course_name}}
        </h1>

        <!-- Portfolio Item Row -->
        <div class="row rounded p-4 my-5">

            <div class="col-md-8 justify-content-center">
                <div class="col text-center rounded">
                    <img class="img-fluid shadow" src="{{Storage::url('/assets/course-thumbnail/'.$course->image.'.jpg')}}" alt="">
                </div>
            </div>

            <div class="col-md-4">
                <h3 class="my-3">Course Description</h3>
                <p class="text-secondary">{{$course->course_description}}</p>
                <h3 class="my-3">Course Materials</h3>
                <div class="accordion accordion-flush mb-5" id="accordionFlushExample">
                    @foreach ($materials as $m)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                {{$m->material_name}}
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{$m->material_description}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <h4 class="my-3">Course Period</h4>
                <p class="text-primary text-center">{{$course->course_period}} days</p>
                <hr>
                <h5 class="my-3">Price</h5>
                <div  class="col text-center h3 text-primary">
                    {{ 'Rp. '.number_format($course->price, 0, '', '.').',-'}}
                </div>
                <hr>
                @auth
                <div class="col text-center m-5">
                    <form action="/detail/{{$course->id}}" method="POST">
                        @csrf
                        <button class="btn btn-primary">Enroll Now!</button>
                    </form>
                </div>
                @endauth
                @guest
                <div class="col text-center m-5">
                    <form action="/login">
                        <button class="btn btn-primary">Login First!</button>
                    </form>
                </div>
                @endguest
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Related Projects Row -->
        <h3 class="my-4">Recommended Courses</h3>

        <div class="row">
            @foreach ($recommended as $r)
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="/detail/{{$r->id}}" class="text-decoration-none text-secondary">
                    <div class="card" style="width: 18rem;">
                        <img class="img-fluid" src="{{Storage::url('/assets/course-thumbnail/'.$r->image.'.jpg')}}" alt="">
                        <div class="card-body">
                            <p class="card-text">{{$r->course_name}}</p>
                        </div>
                      </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
