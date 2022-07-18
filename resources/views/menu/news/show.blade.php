@extends('layout.layout')
@section('title', $news->title)
@section('body')
<h4>{{$news->title}}</h4>
<i class="fa fa-calendar"></i> {{date("d M, y", strtotime($news->created_at))}}
<p class="text-justify" style="margin-top:10px;">{!!html_entity_decode($news->description)!!}</p>

@endsection