@extends('layout.layout')
@section('title', $notice->title)
@section('body')
<div class="panel panel-primary">
  <div class="panel-heading">{{$notice->title}}</div>
  <div class="panel-body">
    @if (!is_null($notice->file_name))
      <div class="alert alert-info">
        Attach Pdf File Download  
        <a target="_blank" href="{{route('pdf', ['file'=> $notice->file_name])}}" class="btn btn-sm btn-primary" style="float:right" title="click here for downloading">Download</a>
      </div>
    @endif
    <p class="text-muted text-xs">
      Published At: <b>{{date('j F, Y g:i A', strtotime($notice->created_at))}}</b> <br/>
      Last Updated: <b>{{date('j F, Y g:i A', strtotime($notice->updated_at))}}</b>
    </p>
   @if (!is_null($notice->content))
   <p class="text-justify">
    {{$notice->content}}
  </p>
   @endif
  </div>
</div>
@endsection