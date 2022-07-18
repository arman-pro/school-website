@extends('layout.layout')
{{-- page title --}}
@section('title', "Pricipal ".$message[0]->messengerName."'s message")
@section('body')
<div class="panel panel-primary">
    <div class="panel-heading">Message Of Principal</div>
    <div class="panel-body">
        <img class="thumbnail" style="width:250px;margin:auto;" src="{{asset('storage/img/teacher')}}/{{$message[0]->messengerImage}}" alt="Teacher Image"/>
        <p class="text-justify">{{$message[0]->messages}}</p>
        <p>
            <b>{{$message[0]->messengerName}}</b><br/>
            <b>{{$message[0]->position}}</b><br/>
        </p>
    </div>
</div>

@endsection