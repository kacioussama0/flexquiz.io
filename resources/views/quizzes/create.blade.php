@extends('layouts.front')

@section('title',__('Create Quoz'))


@section('content')

    <div class="container py-5" >

        @section('form-title',__('Create Quiz'))

        @section('fields')
            <form action="{{route('quizzes.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group mb-3">
                <label for="title" class="form-label">{{__('Title')}}</label>
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="image" class="form-label">{{__('Image')}}</label>
                <input type="file" name="image" id="image" class="form-control" value="{{old('image')}}">
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


                <div class="form-group mb-3">
                    <label for="categories" class="form-label">{{__('Categories')}}</label>

                    <select name="categories" id="" class="form-select">
                        @foreach($categories as $category)

                            <option value="{{$category['id']}}" @if(old('categories') == $category['id']) selected @endif>{{$category['title']}}</option>

                        @endforeach
                    </select>

                    @error('categories')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-secondary text-white w-100 mt-3">{{__('Create')}}</button>
            </form>

        @endsection

        @include('layouts.card')


    </div>


    </div>

@endsection


