@extends('layouts.front')

@section('title',__('All Messages'))


@section('content')

    <div class="container py-5" >


        <h1 class="display-1 fw-bold text-center text-primary">{{__('Messages')}}</h1>
        @if(count($messages))
        <div class="table-responsive">
        <table class="table table-striped">

            <thead class="bg-light text-primary">
                <tr>
                    <th>#</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Message')}}</th>
                    <th>{{__('Actions')}}</th>

                </tr>

            </thead>

            <tbody>
        @foreach($messages as $message)

            <tr>
                <td>{{$message['id']}}</td>
                <td>{{$message['name']}}</td>
                <td>{{$message['email']}}</td>
                <td>{{$message['message']}}</td>
                <td>
                    <form action="{{route('messages/delete',$message['id'])}}" method="POST" onsubmit="return confirm('Are You Sure ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                    </form>
                </td>


            </tr>




        @endforeach

            </tbody>


        </table>
    </div>



        @endif
            @if(!count($messages))


                <div class="alert alert-warning my-5">
                    <h2 class="display-2 text-center">Empty Messages</h2>
                </div>
            @endempty

    </div>


@endsection


