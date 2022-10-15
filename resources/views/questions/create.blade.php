@extends('layouts.front')

@section('title',__('Create Question'))




@section('content')

    <div class="container py-5 my-5" >

        @section('form-title',__('Create Question'))

        @section('fields')



            <form action="" method="POST">
                @csrf
            <div class="form-group mb-3">
                <label for="title" class="form-label">{{__('Title Of Question')}}</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



                <div class="form-group">

                    <label for="questions" class="form-label">{{__('Questions')}}</label>
                    <div class="row">
                        @for($i = 1 ; $i <= 6 ; $i++ )
                            <div class="col-md-6 col-12">
                                <label for="question-{{$i}}">{{$i}} . @if($i == 4 or $i == 5 or $i == 6) {{__('Optional')}} @endif</label>
                                <input type="text" name="question-{{$i}}" id="question-{{$i}}" class="form-control @error("question-$i") is-invalid @enderror mb-3" value = "{{old("question-$i")}}">
                                @error("question-$i")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        @endfor
                    </div>

                    <div class="row">

                        <div class="form-group col-md-6 col-12">
                            <label for="answer" class="form-label">{{__('ََAnswer')}}</label>
                            <input type="text" name="answer" class="form-control @error('answer') is-invalid @enderror" value = "{{old('answer')}}">
                            @error('answer')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-12">
                            <label for="point" class="form-label">{{__('Point')}}</label>
                            <input type="number" min="1" max="10" name="point" class="form-control @error('point') is-invalid @enderror" value = "{{old('point','1')}}">
                            @error('point')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>


                </div>

            <button type="submit" class="btn btn-secondary text-white w-100 mt-3">{{__('Create')}}</button>
            </form>

        @endsection

        @include('layouts.card')


    </div>


    </div>

@endsection


