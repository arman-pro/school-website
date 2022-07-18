@extends('admin.layout.index')
@section('title', 'Control Your Application')
@section('content')
<div class="page-title">
    <h5>Admin Panel</h5>
    <p class="text-subtitle text-muted">A good admin panel to maintain your Application</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <a href="{{route('amdin.notice')}}" class="btn btn-sm btn-info mb-2">Back</a>
                            <form style="padding:10px;border:1px solid #ddd;border-radius:5px;" action="{{route('admin.notice.update', ['id'=> $notice->id])}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <h6>Update Notice</h6>
                                @if (session('message'))
                                    <div class="alert alert-success">{{session('message')}}</div>
                                @endif
                                @if (session('invalid'))
                                    <div class="alert alert-success">{{session('invalid')}}</div>
                                @endif
                                
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control mt-2" placeholder="Write Title" value="{{$notice->title}}" />
                                        @error('title')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <label for="pdf">Pdf</label>
                                        <input type="file" name="pdf" id="pdf" class="form-control mt-2" value="{{old('pdf')}}"/>
                                        <input type="checkbox" name="pdfNot" id="notPdf" /> <label for="notPdf">Pdf Not Applicable</label><br/>
                                        @error('pdf')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <label for="">&nbsp;</label>
                                        <div class="form-control mt-2" ><a target="_blank" href="{{route('admin.pdf', ['file'=>$notice->file_name])}}">View Old File</a></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    
                                    <textarea name="description" class="form-control mt-2" id="description" cols="30" rows="5" placeholder="Write Description">{{ is_null(old('description'))?$notice->content:old('description') }}</textarea>
                                    <input type="checkbox" name="descriptionNotApplicable" id="notDesc" /> <label for="notDesc">Description Not Applicable</label><br/>
                                    @error('description')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-info">Update</button>
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