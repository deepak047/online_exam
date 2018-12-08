@extends('layouts.app')
@section('content')
<div>
    <div class="col-lg-offset-5">
        <h2>Id : {{$studentId}}</h2>
      <h2>Name : {{$name}}</h2>
        <h2>Course Name : {{$course}}</h2>
        <h3 >Total mark : <b><span style="color: green">{{$total}}</span></b></h3>
		   <h3 >Your total mark : <b><span style="color: green">{{$getScore}}</span></b></h3>
    </div><hr>
       <div style="width:75%;">
	   <h3> Result in doughnut chart</h3>
    {!! $chartjs->render() !!}
</div>
    </div>
    
    
    <br>
    <div class="text-center" > <a href="{{ url('result/create') }}" class="btn btn-primary btn-block">Back</a></div>
@endsection