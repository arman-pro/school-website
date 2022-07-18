@extends('admin.layout.index')
@section('title', 'Control Your Application')
@section('content')
<div class="page-title">
    <h5>Page & Category List</h5>
    <p class="text-subtitle text-muted">Create and Update Your Page & Category</p>
</div>
<div class="row">
    <div class="col-12">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger">{{session('delete')}}</div>         
        @endif
    </div>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <h5 class="page-title">Page List</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Page</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$pages->isEmpty())
                                    @foreach ($pages as $page)
                                    <tr>
                                        <td>#{{$loop->iteration}}</td>
                                        <td>{{$page->name}}</td>
                                        <td class="d-inline-block">
                                            <a href="{{route('admin.category').'?'.http_build_query(['id'=>$page->id, 'sub'=>'page', 'action'=>'edit'])}}" class="btn btn-sm btn-primary">Update</a>
                                            <form style="display:inline" action="{{route('admin.page.delete', ['id' => $page->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" >Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="3" class="text-muted text-center">No Page Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4 col-12">
                            @if (!is_null($pageUp))
                                <h5 class="page-title">Update Page</h5>
                                <div class="p-3">
                                    <form action="{{route('admin.page.update', ['id'=>$pageUp->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="page">Page Name</label>
                                            <input type="text" name="page" class="form-control mt-2" id="page" placeholder="Page Name" autofocus="true" value="{{$pageUp->name}}" required />
                                            @error('page')
                                                <small class="text-danger"><b>{{$message}}</b></small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                            <h5 class="page-title">Page Create</h5>
                            <div class="p-3">
                                <form action="{{route('admin.page.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="page">Page Name</label>
                                        <input type="text" name="page" class="form-control mt-2" id="page" placeholder="Page Name" required />
                                        @error('page')
                                            <small class="text-danger"><b>{{$message}}</b></small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                            @endif
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <h5 class="page-title">Category List</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Page</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$categories->isEmpty())
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>#{{$loop->iteration}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->page->name}}</td>
                                            <td style="width:38%;">
                                                <a href="{{route('admin.category').'?'.http_build_query(['id'=>$category->id,'sub'=>'category', 'action'=>'edit'])}}" class="btn btn-sm btn-primary">Update</a>

                                                <button class="btn btn-sm btn-danger" onclick="document.querySelector('#category-delete').submit()" >Delete</button>
                                                <form id="category-delete" action="{{route('admin.category.delete', ['id'=>$category->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4" class="text-muted text-center" style="text-align:center">No Category Found</td>
                                    </tr>
                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4 col-12">
                            @if (!is_null($cate))
                            <h5 class="page-title">Category Update</h5>
                            <form action="{{route('admin.category.update', ['id'=>$cate->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="pageId">Select Page</label>
                                    <select name="pageId" id="pageId" class="form-control mt-2">
                                        <option value="" hidden>Select Page</option>
                                        @if (!$pages->isEmpty())
                                        @foreach ($pages as $pa)
                                            <option {{$pa->id==$cate->page_id?'selected':null}} value="{{$pa->id}}">{{$pa->name}}</option>
                                        @endforeach
                                        @else
                                            <option value="">No Page Avaliable</option>
                                        @endif
                                    </select>
                                    @error('pageId')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Category Name</label>
                                    <input type="text" name="category" class="form-control mt-2" id="category" placeholder="Category Name" autofocus="true" value="{{$cate->name}}" />
                                    @error('category')
                                        <small class="text-danger"><b>{{$message}}</b></small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                                </div>
                            </form>
                            @else
                            <h5 class="page-title">Category Create</h5>
                            <form action="{{route('admin.cateogry.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="pageId">Select Page</label>
                                    <select name="pageId" id="pageId" class="form-control mt-2" required>
                                        <option value="" hidden>Select Page</option>
                                        @if (!$pages->isEmpty())
                                        @foreach ($pages as $page)
                                            <option value="{{$page->id}}">{{$page->name}}</option>
                                        @endforeach
                                        @else
                                            <option value="">No Page Avaliable</option>
                                        @endif
                                    </select>
                                    @error('pageId')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Category Name</label>
                                    <input type="text" name="category" class="form-control mt-2" id="category" value="{{old('category')}}" placeholder="Category Name" required />
                                    @error('category')
                                        <small class="text-danger"><b>{{$message}}</b></small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                                </div>
                            </form>
                            @endif
                            
                        </div>

                    </div>
                </div>
            </div>           

        </div>
    </div>
</section>
@endsection