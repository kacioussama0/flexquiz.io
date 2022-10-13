<div class="d-flex justify-content-center align-items-center " style="height: 100vh">
<div class="card my-3 shadow w-100">
    <h1 class="card-header bg-primary text-light text-center">@yield('form-title')</h1>
    <div class="card-body p-5">
        @isset($success)
            <div class="alert alert-success">{{$success}}</div>
        @endisset

        @isset($failed)
            <div class="alert alert-danger">{{$failed}}</div>
        @endisset




            @yield('fields')
    </div>
</div>
</div>
