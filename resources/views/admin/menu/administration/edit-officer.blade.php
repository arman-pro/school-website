<?php
    $title = ucwords(join(' ', explode('-', $page)));
?>
@extends('admin.layout.index')
@section('title', "Edit $title")
@section('content')
<div class="page-title">
    <h5>Edti {{$title}}</h5>
    <p class="text-subtitle text-muted">Edit {{$title}} Member</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="p-1">
                                <a href="{{url('/admin').'/'.$page}}" class="btn btn-sm btn-info">Back</a>
                            </div>
                            @if (session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                            <form action={{ route('admin.officer.update', ['id'=>$officer->id]) }} method="post" enctype="multipart/form-data" class="p-2">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="page">Administrative Section</label>
                                        <select name="page" id="page" class="form-control mt-2" autofocus="true" required>
                                            <option value="" hidden>Select Section</option>
                                            <option value="governing-body" {{$officer->page=='governing-body'?'selected':null}} >Governing Body</option>
                                            <option value="faculty-member" {{$officer->page=='faculty-member'?'selected':null}}>Faculty Member</option>
                                            <option value="office-stuff" {{$officer->page=='office-stuff'?'selected':null}}>Office Stuff</option>
                                        </select>
                                        @error('page')
                                            <small class="text-danger pt-1">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="name">Member Name</label>
                                        <input type="text" name="name" id="id" class="form-control mt-2" placeholder="Ex. Jone Doe" value="{{$officer->name}}" />
                                        @error('name')
                                            <small class="text-danger pt-1">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="position">Member Positon/Job</label>
                                        <input type="text" name="position" id="position" class="form-control mt-2" placeholder="Ex. Lecturer of Economics/President of School Committee" value="{{$officer->job}}" />
                                        @error('position')
                                            <small class="text-danger pt-1">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="image">Member Image</label>
                                        <input type="file" name="image" id="image" class="form-control mt-2" accept=".png, .jpg, .jpeg" />
                                        @error('image')
                                            <small class="text-danger pt-1">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <img style="width:80px;" src="{{asset('/storage/img/teacher').'/'.$officer->image}}" alt="{{$officer->image}}" class="img-thumbnail"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control mt-2" placeholder="Description">{{$officer->description}}</textarea>
                                    @error('description')
                                        <small class="text-danger pt-1">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="descriptionNotApplicable" class="form-check-input" value="yes" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Description Not Applicable</label>
                                  </div>
                                <div class="form-group" style="text-align:right">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
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