@extends('admin.layout.index')
@section('title', 'Create News')
@section('content')
<div class="page-title">
    <h5>News Create</h5>
    <p class="text-subtitle text-muted">Create New News</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <a href="{{route('admin.news')}}" class="btn btn-sm btn-success mb-2">Back</a>
                        @if (session('message'))
                            <div class="alert alert-success" >{{session('message')}}</div>
                        @endif
                            <form action="{{route('admin.news.store')}}" method="post" style="color: black !important;">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="News Title" required />
                                    @error('title')
                                        <small class="text-danger" >{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="News Description" ></textarea>
                                    @error('description')
                                        <small class="text-danger" >{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
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
    ClassicEditor.create(document.querySelector('#description'))
    .catch(e=> console.log(e.message));
</script>
@endsection