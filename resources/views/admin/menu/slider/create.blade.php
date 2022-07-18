@extends('admin.layout.index')
@section('title', 'Create Slider')
@section('content')
<div class="page-title">
    <h5>Create New Slider</h5>
    <p class="text-subtitle text-sm text-muted">Create, Edit and Delete your Sliders</p>
</div>
<section class="section">
    {{-- <div class="row mb-2"></div> --}}
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-3">
                    <a href={{url('/admin/sliders') }} class="btn btn-sm btn-success">Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{session('message')}}
                                </div>
                            @endif
                           <form action={{route('slider.store')}} method="post" enctype="multipart/form-data">
                                @csrf
                                <p class="p-0 text-lg"><span class="text-danger "><b>*</b></span> Mark field must be required</p>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="title">Title*</label>
                                        <input type="text" id="title" class="form-control" name="title" value="{{old('title')}}"
                                            placeholder="Title*" autofocus="true" required />
                                        @error('title')
                                        <small class="text-sm text-danger p-0"><b>{{$message}}</b></small>
                                        @enderror
                                                                                   
                                    </div>
                                    <div class="form-group">
                                        <label for="sub-title">Sub Title*</label>
                                        <input type="text" id="sub-title" class="form-control" name="subtitle" value="{{old('subtitle')}}" placeholder="Sub Title*" required/>
                                        @error('subtitle')
                                        <small class="text-sm text-danger p-0"><b>{{$message}}</b></small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail">Thumbnail*</label>
                                        <input type="file" id="thumbnail" class="form-control" name="thumbnail" accept=".png, .jpg, .jpeg" placeholder="Sub Title*" required />
                                        @error('thumbnail')
                                        <small class="text-sm text-danger p-0"><b>{{$message}}</b></small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description*</label>
                                        <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Description" required>{{old('description')}}</textarea>
                                        @error('description')
                                        <small class="text-sm text-danger p-0"><b>{{$message}}<b/></small>
                                        @enderror
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection