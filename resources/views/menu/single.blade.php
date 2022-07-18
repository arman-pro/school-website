@extends('layout.layout')
@section('mini-style')
<style>
    .panel-body > div >figure > img {
        width: 100%;
    }
</style>
@endsection
{{-- page title --}}
@section('title', !is_null($content) ? $content->title:ucwords(str_replace('-', ' ', $name)))
@section('body')
<div class="panel panel-primary">
    <div class="panel-heading">{{!is_null($content) ? $content->title:ucwords(str_replace('-', ' ', $name))}}</div>
    <div class="panel-body">
        @if (!is_null($content))
            @if (!is_null($content->file))
            <a target="_blank" href="{{route('pdf', ['file' => $content->file])}}" class="btn btn-sm btn-info">
                Download Notice
            </a>
            @endif
            @if (!is_null($content->content))
            <div style="margin-top:15px;"> {!! str_replace('&rt;', '>', str_replace('&lt;', '<', $content->content)) !!} </div>
            @endif
            @if (is_null($content->file) && is_null($content->content))
                <p class="alert alert-danger">
                    No Data Available
                </p>
            @endif
        @else
            <div class="alert alert-warning">No Data Available</div>
        @endif
       
    </div>
    
</div>
@endsection