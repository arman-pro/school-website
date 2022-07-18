@extends('admin.layout.index')
@section('title', 'Show All Notice')
@section('content')
<div class="page-title">
    <h5>Notice List</h5>
    <p class="text-subtitle text-muted">A good admin panel to maintain your Application</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            @if (session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                            @if (session('invalid'))
                            <div class="alert alert-danger">{{session('invalid')}}</div>
                            @endif
                            <form style="padding:10px;border:1px solid #ddd;border-radius:5px;" action="{{route('admin.notice.store')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <h6>Create New Notice</h6>
                                
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control mt-2" placeholder="Write Title" value="{{old('title')}}" />
                                        @error('title')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="pdf">Pdf</label>
                                        <input type="file" name="pdf" id="pdf" class="form-control mt-2" value="{{old('pdf')}}"/>
                                        <input type="checkbox" name="notPdf" id="notPdf" /> <label for="notPdf">Pdf/Image Not Applicable</label><br/>
                                        @error('pdfImage')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control mt-2" id="description" cols="30" rows="5" placeholder="Write Description">{{old('description')}}</textarea>
                                    <input type="checkbox" name="descriptionNotApplicable" id="notDesc" /> <label for="notDesc">Description Not Applicable</label><br/>
                                    @error('description')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-info">Save</button>
                                </div>
                            </form>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>File/Description</th>
                                        <th>Publish</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$notices->isEmpty())
                                    @foreach ($notices as $notice)
                                    <tr>
                                        <td>#{{$loop->iteration}}</td>
                                        <td>{{$notice->title}}</td>
                                        <td>
                                            @if (!is_null($notice->file_name))
                                                <a target="_blank" title="click for view and download" href="{{route('admin.pdf', ['file' => $notice->file_name])}}" class="btn btn-sm btn-info">View Pdf</a>
                                            @endif
                                            @if (!is_null($notice->content))
                                                <p title="Description" class="text-justify" style="padding:5px;margin-top:5px;margin-bottom:5px;border:1px solid #ddd;border-radius:5px;">
                                               {{$notice->content}}
                                            </p>
                                            @endif

                                        </td>
                                        <td>
                                            {{date('d-M-y g:i A', strtotime($notice->created_at))}}
                                        </td>
                                        <td style="width:32%;">
                                            <a href="{{route('admin.notice.edit', ['id'=>$notice->id])}}" class="btn btn-sm btn-success">Update</a>
                                            <form style="display:inline" action="{{route('admin.notice.destroy', ['id' => $notice->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-muted">Notice not Available</td>
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