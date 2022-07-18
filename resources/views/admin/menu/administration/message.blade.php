@extends('admin.layout.index')
@section('title', 'Administration Person\'s Message')
@section('content')
<div class="page-title">
    <h3>Administrations Person's Messages</h3>
    <p class="text-subtitle text-muted">Write and Update Administrations Person's Message</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="p-2">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Messenger</th>
                                            <th>Profile</th>
                                            <th>Messages</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $message)
                                            <tr>
                                                <td class="text-sm">
                                                <p class="p-0"> <b>{{$message->messengerName}}</b></p>
                                                <p class="p-0"> <b>{{$message->position}}</b></p>
                                                </td>
                                                <td>
                                                    <img style="width:100px;" class="thumbnail-img" src="{{asset('storage/img/teacher').'/'.$message->messengerImage}}" alt="Teacher Image">
                                                </td>
                                                <td>
                                                    <p class="text-sm text-justify">{{$message->messages}}</p>
                                                </td>
                                                <td>
                                                    <a href={{route('admin.edit', ['id' => $message->id])}} class="btn btn-sm btn-primary">Update</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>


@endsection