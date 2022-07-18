@extends('admin.layout.index')
@section('title', 'Office Stuff')
@section('content')
<div class="page-title">
    <h5>Office Stuff Member</h5>
    <p class="text-subtitle text-muted">Add, Delete Your Data</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="p-1">
                                <a href="{{route('admin.officer')}}?page=office-stuff" class="btn btn-sm btn-success">Add New</a>
                            </div>
                            @if (session('delete'))
                                <div class="alert alert-danger">{{session('delete')}}</div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$officers->isEmpty())
                                    @foreach ($officers as $officer)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <img style="width:60px" class="thumbnail-img" src="{{asset('storage/img/teacher').'/'.$officer->image}}" alt="Teacher Image"/>
                                        </td>
                                        <td>
                                            <h5 class="p-0">{{$officer->name}}</h5>
                                            <h6><b>{{$officer->job}}</b><h6>
                                            @if ($officer->description)
                                                <p class="text-justify">
                                                    {{$officer->description}}
                                                </p>
                                            @endif
                                        </td>
                                        <td style="width:25%;">
                                            <div class="d-inline-block">
                                                {{-- update button --}}
                                                <a href="{{ route('admin.officer.edit', ['id'=>$officer->id]) }}?page=office-stuff" class="btn btn-sm btn-info">Update</a>
                                                {{-- delete button --}}
                                                <form action={{route('admin.officer.delete', ['id'=> $officer->id])}} method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-sm text-muted text-center">No Data Available</td>
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