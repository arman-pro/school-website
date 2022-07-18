@extends('admin.layout.index')
@section('title', 'Administration Person\'s Message')
@section('content')
<div class="page-title">
    <h5>Administrations Person's Messages Edit</h5>
    <p class="text-subtitle text-muted">Write and Update Administrations Person's Message</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12"> 
                            <p class="p-1">
                                <a href="{{url('/admin/messages')}}" class="btn btn-sm btn-info">Back</a>    
                            </p>  
                            @if (session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif                             
                            <form class="p-2" action={{ route('admin.message.store', ['id'=>$message->id]) }} method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body p-3">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="teacher">Teacher Name</label>
                                            <input type="text" name="teacher" id="teacher" class="form-control mt-1" placeholder="Name" value="{{$message->messengerName}}" />
                                            @error('teacher')
                                            <small class="text-sm text-danger p-0"><b>{{$message}}</b></small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form group">
                                        <img style="width:150px;" src="{{asset('/storage/img/teacher').'/'.$message->messengerImage}}" alt="{{$message->messengerImage}}" class="img-thumbnail">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control mt-1" />
                                            @error('image')
                                            <small class="text-sm text-danger p-0"><b>{{$message}}</b></small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="position">Position</label>
                                            <input type="text" name="position" id="position" class="form-control mt-1" placeholder="Position" value="{{$message->position}}" />
                                            @error('position')
                                            <small class="text-sm text-danger p-0"><b>{{$message}}</b></small>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Write Message">{{$message->messages}}</textarea>
                                        @error('message')
                                        <small class="text-sm text-danger p-0"><b>{{$message}}</b></small>
                                        @enderror
                                    </div>
                                    <div class="form-group" style="text-align:right">
                                        <button type="submit" class="btn btn-sm btn-success">Save</button>
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