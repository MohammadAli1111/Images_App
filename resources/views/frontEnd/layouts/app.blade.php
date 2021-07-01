<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Images</title>
    <link rel="stylesheet" href={{URL::asset('assets/bootstrap/css/bootstrap.min.css')}}>
    <link rel="stylesheet" href={{URL::asset('assets/fonts/font-awesome.min.css')}}>
    <link rel="stylesheet" href={{URL::asset('assets/fonts/simple-line-icons.min.css')}}>
    <link rel="stylesheet" href={{URL::asset('assets/css/Footer-Basic.css')}}>
    <link rel="stylesheet" href={{URL::asset('assets/css/aos.css')}}>
    <link rel="stylesheet" href={{URL::asset('assets/css/Lightbox-Gallery.css')}}>
    <link rel="stylesheet" href={{URL::asset('assets/css/lightbox.min.css')}}>
    <link rel="stylesheet" href={{URL::asset('assets/css/Navigation-with-Search.css')}}>
    <link rel="stylesheet" href={{URL::asset('assets/css/Simple-Slider.css')}}>
    <link rel="stylesheet" href={{URL::asset('assets/css/styles.css')}}>
    <link rel="stylesheet" href={{URL::asset('assets/css/swiper.min.css')}}>
</head>

<body>
<header>
    <nav class="navbar navbar-light navbar-expand-md fixed-top shadow-sm navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="{{route('index')}}">Images Company</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="color: var(--pink);background: #450a3b;"><span class="sr-only" style="color: var(--pink);">Toggle navigation</span><span class="navbar-toggler-icon" style="color: var(--pink);"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}" style="color: var(--white);font-style: normal;">{{__("messages.Home")}}</a></li>
                    @if(!Route::is('index'))
                    <li class="nav-item"><a class="nav-link" href="{{route('getAddImage')}}" style="color: var(--white);font-style: normal;">{{__("messages.Add Image")}}</a></li>
                    @endif
                        <li class="nav-item mt-2 mr-2">
                        <div class="dropdown"><a class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown" href="#">{{__("messages.Language")}}</a>
                            <div class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}
                                        <span class="sr-only">(current)</span></a>

                             @endforeach


                            </div>
                        </div>
                    </li>
                </ul>

                <form class="form-inline mr-auto" target="_self">
                    @if(Route::is("index") || Route::is("home") )
                    <div class="form-group">
                        <select class="form-control form-control-sm" required="" name="select">
                            <optgroup label="{{__('messages.Select Image Type')}}">
                                <option value="All" selected="">{{__('messages.All')}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->category}}" >{{$category->category}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        <label for="search-field"><i class="fa fa-search align-self-end"></i></label>
                        <input class="form-control search-field" type="search" placeholder="{{__('messages.Image Name')}}" required  id="search-field" name="search">
                    </div>
                    @endif
                </form>

                <div class="dropdown">
                    @if(Auth::check())
                    <a class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown" href="#">{{ Auth::user()->name }}</a>
                    @else
                        <a class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown" href="#">{{__('messages.Register')}}</a>

                    @endif
                        <div class="dropdown-menu">
                        @if(Route::is('home'))
                        <a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('messages.Profile') }}</a>
                        @endif
                        <a class="dropdown-item" href="/register">{{__('messages.Sign in')}}</a>
                        <a class="dropdown-item" href="/login">{{__('messages.Login')}}</a>
                        <a class="dropdown-item" href="{{  \LaravelLocalization::localizeURL('/logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            {{__('messages.Logout')}}
                        </a>
                        <form id="frm-logout" action="{{  \LaravelLocalization::localizeURL('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

@yield("main")

<footer class="shadow-sm footer-basic">
    <ul class="list-inline">
        <li class="list-inline-item"><a href="{{route('home')}}">{{__("messages.Home")}}</a></li>
        @if(!Route::is('index'))
        <li class="list-inline-item"><a href="{{route('getAddImage')}}">{{__("messages.Add Image")}}</a></li>
        @endif
    </ul>
    <p class="copyright" style="color: var(--white);">Images Company © 2021</p>
</footer>
<script src={{URL::asset('assets/js/jquery.min.js')}}></script>
<script src={{URL::asset('assets/bootstrap/js/bootstrap.min.js')}}></script>
<script src={{URL::asset('assets/js/bs-init.js')}}></script>
<script src={{URL::asset('assets/js/aos.js')}}></script>
<script src={{URL::asset('assets/js/lightbox.min.js')}}></script>
<script src={{URL::asset('assets/js/Simple-Slider.js')}}></script>
<script src={{URL::asset('assets/js/swiper.jquery.min.js')}}></script>
</body>

</html>
