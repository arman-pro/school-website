@extends('layout.layout')
@section('title', 'All news list')
@section('body')

<div class="list-group">
    <a class="list-group-item active">
        All News
      </a>
    @if (!$all_newses->isEmpty())
        @foreach ($all_newses as $news)
        <a href="{{route('news.show', ['id'=>$news->id])}}" class="list-group-item">
            {{$news->title}}<br/>   
            <small class="text-sm text-muted">Publis at: {{date('d M, y', strtotime($news->created_at))}}</small>
        </a>
        
        @endforeach
    @else
    <li class="list-group-item text-right"> Notice not Found</li>
    @endif         
    </div>
@endsection