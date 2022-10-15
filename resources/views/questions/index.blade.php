@extends('layouts.front')

@section('title',__('All Categories'))


@section('content')

    <div class="container py-5" >


        <h1 class="display-1 fw-bold text-center text-primary">{{__('Categories')}}</h1>


        <a href="{{route('categories.create')}}" class="btn btn-lg btn-success mb-5">{{__('Create Category')}}</a>

        <div class="row g-3">

        @forelse($categories as $category)


            <div class="col-md-4 col-12">

                <div class="card shadow " style="height: 400px">


                    <h2 class="card-header text-center bg-primary text-light card-img-top">
                        {{$category->title}}
                    </h2>

                    <div class="card-body p-0 overflow-hidden">


                        <img src="{{asset('storage/categories/' . $category -> image)}}" alt="" class="img-fluid w-100" style="height: 300px ; object-fit: cover">

                    </div>


                    <div class="card-footer text-center bg-secondary">
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary">{{__('Edit')}}</a>
                        <a href="{{route('categories.show',$category->id)}}" class="btn btn-success">{{__('Show')}}</a>
                        <form action="{{route('categories.destroy',$category->id)}}" method="POST" class="d-inline-block" onsubmit="return confirm('{{__('Are You Sure ?')}}')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">{{__('Delete')}}</button>
                        </form>

                    </div>

                </div>


            </div>


        @empty


            <div class="alert alert-warning my-5">
                <h2 class="display-2 text-center">Empty Categories</h2>
            </div>


        @endforelse


        </div>

    </div>


@endsection


