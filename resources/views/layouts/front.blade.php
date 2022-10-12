<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('imgs/logo.svg')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <title>{{__(config('app.name'))}} | @yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
</head>
<body>

<div class="loader bg-secondary d-flex flex-column">
    <img src="{{asset('imgs/logo.svg')}}" alt="flexQuiz" class="logo-img mb-3" style="width: 300px">
    <div class="spinner-grow text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>






    <!-- Start Header -->

    <header class="">

        <nav class="navbar navbar-expand-lg p-0 bg-secondary border-3 shadow border-bottom border-primary ">
            <div class="container-fluid py-1">
                <a class="navbar-brand me-0 ms-3" href="{{url('/')}}">
                    <img src="{{asset('imgs/logo.svg')}}" alt="" class="logo-img">
                </a>
                <button class="navbar-toggler border-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars text-primary"></i>
                </button>
                <div class="collapse navbar-collapse mt-lg-0 mt-md-3" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 p-0 mb-lg-0 w-100">
                        <li class="nav-item text-light">
                            <a class="nav-link active" aria-current="page" href="{{url('/')}}"> <i class="fa fa-home ms-2"></i>{{__('Home')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-question ms-2"></i> {{__('Quizzes')}}</a>
                        </li>


                        @auth
                            <li class="nav-item">
                                <a class="nav-link " href=""><i class="fa fa-list ms-2 "></i>{{__('Leaderboard')}}</a>
                            </li>
                        @endauth


                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-users ms-2"></i> {{__('About Us')}}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}"><i class="fa fa-envelope ms-2"></i> {{__('Contact Us')}}</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-globe ms-2"></i> {{__('Languages')}}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('english')}}">{{__('English')}}</a></li>
                                <li><a class="dropdown-item" href="{{route('arabic')}}">{{__('Arabic')}}</a></li>
                            </ul>
                        </li>



                        <ul class="navbar-nav me-lg-auto  p-0 ">

                            @guest

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('login')}}"><i class="fa fa-right-to-bracket ms-2"></i>{{__('Login')}}</a>
                                </li>


                                <li class="nav-item  ">
                                    <a class="nav-link" href="{{route('register')}}"><i class="fa fa-clipboard ms-2"></i> {{__('Register')}}</a>
                                </li>

                            @endguest

                        </ul>



                        @auth

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-right-from-bracket ms-2"></i>{{__('Logout')}}</a>
                            </li>

                    @endauth




                </div>
            </div>
        </nav>


    </header>


    <!-- End Header -->




    @yield('content')



    <footer class="bg-secondary py-3">

        <div class="container-fluid d-flex align-items-center justify-content-between">
            <img src="{{asset('imgs/logo.svg')}}" alt="" class="logo-img">
            <p class="mb-0 text-white">{{__('All Right Reserved By FlexQuiz') .' '. date('Y')}} </p>
        </div>

    </footer>



<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
