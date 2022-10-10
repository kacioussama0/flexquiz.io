@extends('layouts.front')

@section('title',__('Contact Us'))


@section('content')

    <div class="container py-5" >




        <div class="card my-3 shadow ">
            <h1 class="card-header bg-primary text-light text-center">{{__('Contact Us')}}</h1>
            <div class="card-body p-4">
                @isset($success)
                    <div class="alert alert-success">{{$success}}</div>
                @endisset

                    @isset($failed)
                        <div class="alert alert-danger">{{$failed}}</div>
                    @endisset
                <form action="" method="POST">

                    @csrf

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">{{__('Name')}}</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">{{__('Email')}}</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="message" class="form-label">{{__('Message')}}</label>
                        <textarea name="message" id="message" class="form-control">{{old('message')}}</textarea>
                        @error('message')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-secondary text-white w-100">{{__('Send')}}</button>
                </form>
            </div>
        </div>


    </div>



@endsection
