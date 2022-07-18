@extends('admin.layout.index')
@section('title', 'View Content')
@section('content')
<div class="page-title">
    <h5>View Content</h5>
    <p class="text-subtitle text-muted">View content</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <a href="{{route('admin.content')}}" class="btn btn-sm btn-primary mb-5">Back</a>
                            <div class="p-2">
                                @if (!is_null($content))
                                    <h5>{{$content->title}}</h5>
                                    <p class="text-muted">
                                        <small>Page: {{$content->page->name}} &nbsp;&nbsp; Sub-Page: {{$content->category->name}}</small>
                                    </p>
                                    @if (!is_null($content->file))
                                    <p>
                                        Pdf File: <a target="_blank" href="{{route('admin.pdf', ['file' => $content->file])}}">{{$content->file}}</a>
                                    </p>
                                    @endif
                                    @if (!is_null($content->content))
                                        <div class="text-justify mt-2">
                                            {!!
                                                str_replace('&rt;', '>', str_replace('&lt;', '<', $content->content))
                                            !!}
                                        </div>
                                    @endif
                                    
                                @else
                                    <div class="alert alert-secondary">No Found!</div>
                                @endif
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection