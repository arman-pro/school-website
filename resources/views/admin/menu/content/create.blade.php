@extends('admin.layout.index')
@section('title', 'Create New Content')
@section('content')
<div class="page-title">
    <h5>Create New Content</h5>
    <p class="text-subtitle text-muted">Create & Update Content List</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <a href="{{route('admin.content')}}" class="btn btn-sm btn-info">Show All</a>
                            @if (session('message'))
                                <div class="alert alert-success mt-3">{{session('message')}}</div>
                            @endif
                            <form class="mt-3" action="{{route('admin.content.store')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="page">Page</label>
                                        <select name="page" id="page" class="form-control mt-2" style="background:white;" onchange="getCategory(this.value)" >
                                            <option value="" hidden>Select Page</option>
                                            @if (!$pages->isEmpty())
                                                @foreach ($pages as $page)
                                                    <option value="{{$page->id}}">{{$page->name}}</option>
                                                @endforeach
                                            @else
                                            <option value="">Page Not Found</option>
                                            @endif
                                        </select>

                                        @error('page')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="category">Category</label>
                                        <select name="category" id="category" class="form-control mt-2" disabled>
                                            <option value="" hidden>Select Category</option>
                                        </select>
                                        @error('category')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control mt-2" placeholder="Title" value="{{old('title')}}" />
                                        @error('title')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                   <div class="col-md-6 col-sm-12">
                                        <label for="file">Pdf/Image Upload</label>
                                        <input type="file" name="pdfFile" id="file" class="form-control mt-2"/>
                                        <input class="mt-2 mr-2" name="fileNotApplicable" type="checkbox" id="fileNotApplicable" />
                                        <label for="fileNotApplicable"> File Not Applicable</label> <br/>
                                        @error('pdfFile')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                   </div>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" id="content" cols="30" rows="5" class="form-control mt-2" placeholder="Write Content">{{old('content')}}</textarea>
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
<script>
    // run this script when content loaded

    function getCategory(id) {
        // as soons as disabled and background black while reuest success
        document.querySelector('#category').style.background = '#ddd';
        document.querySelector('#category').disabled = true;
        axios.get(`api/category/${id}`)
        .then(function(res){
            var output = '';
            output += `<option value='' hidden>Select Category</option>`;
            if(res.status == 200) {
                document.querySelector('#category').disabled = false;
                document.querySelector('#category').style.background = 'white';
                res.data.map(function(cat){
                    output += `<option value='${cat.id}' >${cat.name}</option>`;
                })
            } else if($res.status == 404) {
                output += `<option value=''>Not Found</option>`;
                throw new Error('Category Not Found');
            }
            // set output in cateogry field
            document.querySelector('#category').innerHTML = output;
        })
        .catch(function(err) {
            console.log(err.message);
        })
    }
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#content'))
    .catch(e=> console.log(e.message));
</script>
@endsection