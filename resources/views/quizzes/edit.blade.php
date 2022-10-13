@extends('layouts.front')

@section('title',__('Edit Quiz'))


@section('content')

    <div class="container py-5" >

        @section('form-title',__('Edit Quiz'))

        @section('fields')
            <form action="{{route('quizzes.update',$quiz['id'])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            <div class="form-group mb-3">
                <label for="title" class="form-label">{{__('Title')}}</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$quiz['title']}}">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <img src="{{asset('storage/quizzes/' . $quiz['image'])}}" alt="" class="img-fluid d-block rounded" style="width: 250px !important;">

                <label for="image" class="form-label">{{__('Image')}}</label>
                <input type="file" name="image" id="image" class="form-control" value="{{old('image')}}">
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <button type="submit" class="btn btn-secondary text-white w-100 mt-3">{{__('Edit')}}</button>
            </form>

        @endsection

        @include('layouts.card')


    </div>


    </div>

@endsection


