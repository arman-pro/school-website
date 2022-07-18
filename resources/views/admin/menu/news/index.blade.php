@extends('admin.layout.index')
@section('title', 'News List')
@section('content')
<div class="page-title">
    <h5>News</h5>
    <p class="text-subtitle text-muted">Create, Read, Update & Delete News</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-success mb-2">Create News</a>
                        @if (session('delete'))
                            <div class="alert alert-danger">{{session('delete')}}</div>
                        @endif
                            <table class="table table-striped">
                                <thead class="bg-secondary text-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$newses->isEmpty())
                                    @foreach ($newses as $news)
                                        <tr>
                                            <td>#{{$loop->iteration}}</td>
                                            <td>{{$news->title}}</td>
                                            <td style="width:30%;" class="block">
                                                <a href="{{route('admin.news.edit', ['id' => $news->id])}}" class="btn btn-info btn-sm">Edit</a>
                                                <a href="{{route("admin.news.show", ['id' => $news->id])}}" class="btn btn-success btn-sm">Read</a>
                                                <form style="display: inline" action="{{route('admin.news.delete', ['id' => $news->id])}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center text-muted" colspan="3">Not Found!</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection
