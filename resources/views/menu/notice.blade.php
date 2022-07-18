@extends('layout.layout')
@section('title', 'All Recent Notice')
@section('body')
<div class="panel panel-primary">
  <div class="panel-heading">All Notice List</div>
  <div class="panel-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Title</th>
          <th>Published</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @if (!$notices->isEmpty())
          @foreach ($notices as $notice)
          <tr>
            <td>
              <span class="text-danger">#{{$loop->iteration}}</span> <a href="{{route('details', ['id'=>$notice->id])}}"> {{$notice->title}}</a>
            </td>
            <td class="text-sm">
              {{date('d M, y g:i A', strtotime($notice->created_at))}}
            </td>
            <td>
              @if (!is_null($notice->file_name))
              <a title="click here for download" target="_blank" href="{{route('pdf', ['file' => $notice->file_name])}}" class="btn btn-sm btn-primary">Download</a>
              @endif
            </td>
          </tr>
          @endforeach
        @else
          <tr>
            <td colspan="3" class="text-muted text-center">Not Notice Found</td>
          </tr>
        @endif
      </tbody>
      
    </table>
  
    <div class="btn-group">
      @if (!is_null($notices->nextPageUrl()))
        <a href="{{$notices->nextPageUrl()}}" class="btn btn-sm btn-info">Next</a>
      @endif
      @if (!is_null($notices->previousPageUrl()))
        <a href="{{$notices->previousPageUrl()}}" class="btn btn-sm btn-info">Previous</a>
      @endif
    </div>
  </div>
</div>
@endsection