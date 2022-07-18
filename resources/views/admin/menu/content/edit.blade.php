@extends('admin.layout.index')
@section('title', 'Update Content')
@section('content')
<div class="page-title">
    <h5>Edit Content</h5>
    <p class="text-subtitle text-muted">Edit and Update Content</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <a href="{{route('admin.content')}}" class="btn btn-sm btn-info">Back</a>
                            @if (session('message'))
                                <div class="alert alert-success mt-3">{{session('message')}}</div>
                            @endif
                            <nav aria-label="breadcrumb ml-0 mt-2" style="margin-top:15px;margin-bottom:10px;">
                                <ol class="breadcrumb pl-0" style="padding-left:0;">
                                  <li class="breadcrumb-item">Page: <a href="#">{{$content->page->name}}</a></li>
                                  <li class="breadcrumb-item">Category/Sub-Page: <a href="#">{{$content->category->name}}</a></li>
                                </ol>
                            </nav>
                            <form class="mt-3" action="{{route("admin.content.update", ['id'=> $content->id])}}" enctype="multipart/form-data" method="post" >
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control mt-2" placeholder="Title" value="{{$content->title}}" />
                                        @error('title')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                   <div class="{{is_null($content->file) ? 'col-md-6' : 'col-md-3'}} col-sm-12">
                                        <label for="file">Pdf/Image Upload</label>
                                        <input type="file" name="pdfFile" id="file" class="form-control mt-2"/>
                                        <input class="mt-2 mr-2" name="fileNotApplicable" type="checkbox" id="fileNotApplicable" />
                                        <label for="fileNotApplicable"> File Not Applicable</label> <br/>
                                        @error('file')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                   </div>
                                   @if (!is_null($content->file))
                                   <div class="col-md-3 col-sm-12">
                                        <label for="">Old File</label>
                                        <div class="form-control mt-2">
                                            <a href="{{route('admin.pdf', ['file' => $content->file])}}" target="_blank" rel="noopener noreferrer" title="click to view">Pdf Link</a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" id="content" cols="30" rows="5" class="form-control mt-2" placeholder="Write Content">{{ !is_null(old("content")) ? old('content') : str_replace('&rt;', '>', str_replace('&lt;', '<', $content->content))}}</textarea>
                                    <input class="mt-2 mr-2" type="checkbox" name="contentNotApplicable" id="contentNotApplicable"  />
                                    <label for="contentNotApplicable"> Content Not Applicable</label><br/>
                                    @error('content')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor.create(document.querySelector('#content'))
    .catch(e=> console.log(e.message));
</script>

@endsection