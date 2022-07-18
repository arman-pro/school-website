@extends('admin.layout.index')
@section('title', $news->title)
@section('content')
<div class="page-title">
    <h5>Show News</h5>
    <p class="text-subtitle text-muted">Show News Details</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <a href="{{route('admin.news')}}" class="btn btn-sm btn-success mb-2">Back</a>
                            <h3>{{$news->title}}</h3>
                            <div class="text-justify">
                               {!!html_entity_decode($news->description)!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection