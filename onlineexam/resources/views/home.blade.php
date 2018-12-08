@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Online Examination</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div class="text-center" > <a href="{{ url('student/create') }}" class="btn btn-success btn-block">Take Online Test</a></div><br>

                <div class="text-center" > <a href="{{ url('result/create') }}" class="btn btn-primary btn-block">View Result</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
