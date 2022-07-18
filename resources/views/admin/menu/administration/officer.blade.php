<?php
    $title = ucwords(join(' ', explode('-', $page)));
?>
@extends('admin.layout.index')
@section('title', 'Create '.$title)
@section('content')
<div class="page-title">
    <h5>{{$title}}</h5>
    <p class="text-subtitle text-muted">Create New {{$title}} Member</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            @if ($page)
                                <a href="{{url("/admin/$page")}}" class="btn btn-sm btn-info">Back</a>
                            @endif
                            @if (session('message'))
                                <div class="alert alert-success mt-2">{{session('message')}}</div>
                            @endif
                            <form action="{{route('admin.officer.create')}}" method="post" enctype="multipart/form-data" class="p-2">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="page">Administrative Section</label>
                                        <select name="page" id="page" class="form-control mt-2" required>
                                            <option value="" hidden>Select Section</option>
                                            <option value="governing-body" {{$page=='governing-body'?'selected':null}} >Governing Body</option>
                                            <option value="faculty-member" {{$page=='faculty-member'?'selected':null}}>Faculty Member</option>
                                            <option value="office-stuff" {{$page=='office-stuff'?'selected':null}}>Office Stuff</option>
                                        </select>
                                        @error('page')
                                            <small class="text-danger pt-1">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="name">Member Name</label>
                                        <input type="text" name="name" id="id" class="form-control mt-2" placeholder="Ex. Jone Doe" value="{{old('name')}}" {{!empty($page)? 'autofocus="true"':null}} />
                                        @error('name')
                                            <small class="text-danger pt-1">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="position">Member Positon/Job</label>
                                        <input type="text" name="position" id="position" class="form-control mt-2" placeholder="{{$page=='faculty-member'?'Ex. Lecturer of Economics':null}} {{$page=='governing-body'?'President of School Committee':null}} {{$page=='office-stuff'?'Administrative Officer':null}}" value="{{old('position')}}" />
                                        @error('position')
                                            <small class="text-danger pt-1">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="image">Member Image</label>
                                        <input type="file" name="image" id="image" class="form-control mt-2" />
                                        @error('image')
                                            <small class="text-danger pt-1">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control mt-2" value="{{old('description')}}" placeholder="Description"></textarea>
                                    @error('description')
                                        <small class="text-danger pt-1">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="descriptionNotApplicable" class="form-check-input" value="yes" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Description Not Applicable</label>
                                  </div>
                                <div class="form-group" style="text-align:right">
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
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