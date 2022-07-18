@extends('admin.layout.index')
@section('title', 'Content List')
@section('content')
<div class="page-title">
    <h5>Content List</h5>
    <p class="text-subtitle text-muted">Create & Update Content List</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <a href="{{route('admin.content.create')}}" class="btn btn-sm btn-primary">Creaet New Content</a>
                            @if (session('delete'))
                                <div class="alert alert-danger mt-2">{{session('delete')}}</div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Page</th>
                                        <th>File/Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($contents->isEmpty() != true)
                                        @foreach ($contents as $content)
                                        <tr>
                                            <td>#{{$loop->iteration}}</td>
                                            <td>{{$content->title}}</td>
                                            <td>
                                               Page:  <b>{{$content->page->name}}</b> <br/>
                                                Category: <b>{{$content->category->name}}</b>
                                            </td>
                                            <td>
                                                @if (!is_null($content->file))
                                                <a target="_blank" href="{{route('admin.pdf', ['file'=>$content->file])}}">Pdf</a>
                                                @endif
                                                <br/>
                                                @if (!is_null($content->content))
                                                    <span class="text-muted">Content</span>
                                                @endif
                                                @if(is_null($content->file) && is_null($content->content)) 
                                                    <b>N/A</b>
                                                @endif
                                            </td>
                                            <td class="block" style="width:33%;" >
                                                <a href="{{route('admin.content.view', ['id'=>$content->id])}}" class="btn btn-sm btn-info">
                                                    View
                                                </a>
                                                <a href="{{route('admin.content.edit', ['id' => $content->id])}}" class="btn btn-sm btn-primary">
                                                    Update
                                                </a>
                                                <form style="display: inline" action="{{route('admin.content.destroy', ['id'=>$content->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                       @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class='text-muted' style="text-align:center">No Data Found!</td>
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