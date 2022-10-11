@extends('layouts.front')

@section('title',__('Home Page'))


@section('content')


    <div class="container">

        <!-- Start Landing Page -->


        <div class="row align-items-center py-5">

        <div class="col-md-6 col-12 text-center">
             <h1 class="display-1 mb-4 fw-bold text-primary">تحديات رائعة</h1>
            <p class="mb-4">مرحبا بكم في فليكس كويز المكان الذي يمكنك إيجاد تحديات وانشاء تحديات لغيرك</p>
            <h4 class="mb-4 display-6 fw-semibold text-secondary">ماذا تنتظر ?</h4>
            <a href="{{route('register')}}" class="btn btn-lg btn-secondary text-white d-block mx-auto">سجل معنا</a>
        </div>


        <div class="col-md-6 col-12">
            <img src="{{asset('imgs/quiz-landing.jpg')}}" alt="landing-page" class="img-fluid">
        </div>

    </div>

<!-- End Landing Page -->



<!-- Start Features -->

    <section class="py-5">


        <h2 class="bg-primary p-4 text-center text-light rounded-pill mb-5">مميزاتنا</h2>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="card border-3 border-secondary shadow">
                    <div class="card-body text-center">
                        <h3 class="display-6 fw-semibold mb-3 text-">تحديات</h3>
                        <i class="fa fa-trophy mb-3" style="font-size: 40px"></i>
                        <p>تحديات شيقة وممتعة ما راح تمل معنا</p>
                    </div>
                </div>

            </div>


            <div class="col-md-4">

                <div class="card border-3 border-secondary shadow">
                    <div class="card-body text-center">
                        <h3 class="display-6 fw-semibold mb-3 text-">تصميم مميز</h3>
                        <i class="fa fa-palette mb-3" style="font-size: 40px"></i>
                        <p>تصميم راح يخليك ما تخرج من الموقع</p>
                    </div>
                </div>

            </div>


            <div class="col-md-4">

                <div class="card border-3 border-secondary shadow">
                    <div class="card-body text-center">
                        <h3 class="display-6 fw-semibold mb-3 text-">إختبر ذكائك</h3>
                        <i class="fa fa-brain mb-3" style="font-size: 40px"></i>
                        <p>إختبر قدراتك ونمي مهاراتك بحل التحديات</p>
                    </div>
                </div>

            </div>

        </div>



    </section>
        <!-- End Features -->
</div>


@endsection
