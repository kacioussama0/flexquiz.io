@extends('layouts.front')

@section('title',__('Questions'))


@section('content')

    <div class="container-fluid py-5" >

        <h1 class="display-1 fw-bold text-center text-primary">{{__('Questions')}}</h1>


        <div class="d-flex justify-content-between align-items-center mb-5 ">

            <a href="{{url("questions/create/$id")}}" class="btn btn-success btn-lg" >{{__('Create Question')}}</a>
            <a href="" class="btn btn-lg btn-warning">{{__('Back To Quiz')}}</a>

        </div>
        <div class="table-responsive rounded">
        <table class="table table-striped text-center">

            <thead class="bg-light text-primary">
                <tr>
                    <th>{{__('Title Of Question')}}</th>
                    <th>{{__('Choices')}}</th>
                    <th>{{__('ََAnswer')}}</th>
                    <th>{{__('Actions')}}</th>

                </tr>

            </thead>

            <tbody>


            @foreach($questions as $question)

            <tr class="align-middle">
                <td>{{$question['title']}}</td>
                <td>
                    <ol class="m-0 p-0">
                    @foreach(json_decode($question['questions']) as $choice)
                        @if($choice != null)
                            <li>{{$choice}}</li>
                        @endif
                    @endforeach
                    </ol>
                </td>
                <td>{{$question['answer']}}</td>
                <td>
                    <a href="{{route('questions.edit',$question['id'])}}" class=" ms-2 btn btn-warning">{{__('Edit')}}</a>
                    <form action="{{route('questions.destroy',$question['id'])}}" method="POST"  onsubmit="return confirm('Are You Sure ?')" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                    </form>
                </td>


            </tr>


            </tbody>
            @endforeach

        </table>
    </div>



            @if(false)


                <div class="alert alert-warning my-5">
                    <h2 class="display-2 text-center">Empty Questions</h2>
                </div>
            @endempty

    </div>


@endsection


