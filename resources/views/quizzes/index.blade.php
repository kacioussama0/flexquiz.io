@extends('layouts.front')

@section('title',__('All Quizzes'))


@section('content')

    <div class="container py-5">

        <h1 class="display-1 fw-bold text-center text-primary mb-5">{{__('Quizzes')}}</h1>

        <div class="row g-4">

        @forelse($quizzes as $quiz)


            <div class="col-md-4 col-12">

                <div class="card shadow " style="height: 400px">


                    <h2 class="card-header text-center bg-primary text-light card-img-top">
                        {{$quiz->title}}
                    </h2>

                    <div class="card-body p-0 overflow-hidden">


                        <img src="{{asset('storage/quizzes/' . $quiz -> image)}}" alt="" class="img-fluid w-100" style="height: 300px ; object-fit: cover">

                    </div>


                    <div class="card-footer text-center bg-secondary">
                        <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-primary">{{__('Edit')}}</a>

                        <form action="{{route('quizzes.destroy',$quiz->id)}}" method="POST" class="d-inline-block" onsubmit="return confirm('{{__('Are You Sure ?')}}')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">{{__('Delete')}}</button>
                        </form>

                    </div>

                </div>


            </div>


        @empty


            <div class="alert alert-warning my-5">
                <h2 class="display-2 text-center">Empty Quizzes</h2>
            </div>


        @endforelse


        </div>

    </div>


@endsection


