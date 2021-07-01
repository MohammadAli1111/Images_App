@extends("frontEnd.layouts.app")

@section("main")
<main style="margin-top: 80px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel slide" data-ride="carousel" id="carousel-1" style="box-shadow: 2px 2px 6px #450a3b;">
                    <div class="carousel-inner">
                        <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/align-fingers-71282_1280.jpg" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/nature-3082832_1920.jpg" alt="Slide Image"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/earth-11595_1920.jpg" alt="Slide Image"></div>
                    </div>
                    <div>
                        <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a>

                        <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a>
                    </div>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>

            <div class="col-md-12">
                <h2 class="text-center" style="color: var(--pink);">Images</h2>
            </div>
        </div>


        <div class="row" style="margin-bottom: 2px;">
            @foreach($images as $image )
            <div class="col-md-6 col-lg-4">
                <div class="card" data-aos="fade-up-right" style="background: linear-gradient(0deg, #450a3b, #d9aac7), rgba(255,0,214,0.25);text-align: center;">
                    <img class="card-img-top w-100 d-block" data-bss-parallax-bg="true" src="{{$image->path}}" style="background-position: center;background-size: cover;">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;color: rgb(255,255,255);">{{$image->name}}</h4>

                        <a class="card-link" href="{{route('index.download',["id"=>$image->id])}}"><i class="fa fa-download" style="color: #ffffff;"></i></a>

                        <a class="card-link" href="{{route('like',["id"=>$image->id])}}"><i class="icon-like" style="color: #ffffff;"></i>
                            <label style="color: var(--white);margin: 1px;">{{$image->mylike}}</label></a>

                        <a class="card-link" href="{{route('dislike',["id"=>$image->id])}}"><i class="icon-dislike" style="color: #ffffff;"></i>
                            <label style="color: var(--white);margin: 1px;">{{$image->unlike}}</label></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
