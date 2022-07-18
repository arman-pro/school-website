@extends('layout.layout')
{{-- page title --}}
@section('title', "President's Message")
@section('body')
<div class="panel panel-primary">
    <div class="panel-heading">Message Of President</div>
    <div class="panel-body">
        <img class="thumbnail" style="width:250px;margin:auto;" src="{{asset('storage/img/teacher')}}/{{$message[0]->messengerImage}}" alt="Teacher Image: {{$message[0]->messengerImage}}"/>
       <p class="text-justify">{{$message[0]->messages}}</p>
        <p>
            <b>{{$message[0]->messengerName}}</b><br/>
            <b>{{$message[0]->position}}</b><br/>
            {{-- <b>Nowpara School and College</b> --}}
        </p>
    </div>
</div>

@endsection