@extends('admin.layout.index')
@section('title', 'Application Slider')
@section('content')
<div class="page-title">
    <h5>Sliders List</h5>
    <p class="text-subtitle text-sm text-muted">Create, Edit and Delete your Sliders</p>
</div>
<section class="section">
    {{-- <div class="row mb-2"></div> --}}
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-1">
                    <a href={{ route('slider.create') }} class="btn btn-sm btn-success">Create New</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            @if (session('message'))
                                <div class="alert alert-danger">
                                    {{session('message')}}
                                </div>
                            @endif
                           <table class="table table-striped">
                               <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>Title</th>
                                       <th>Sub-Title</th>
                                       <th>Thumbnail</th>
                                       <th>Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach ($sliders as $slider)
                                    <tr>
                                        <td>#{{$loop->iteration}}</td>
                                        <td>
                                            {{$slider->title}}
                                        </td>
                                        <td>
                                            {{$slider->subTitle}}
                                        </td>
                                        <td><img style="width:150px;" src={{asset('storage/img/slider/').'/'.$slider->thumbnail}} alt="Not Found"></td>
                                        <td style="width:32%" class="text-center">
                                            <a href={{route('slider.show', ['id' => $slider->id])}} class="btn btn-sm btn-primary">Show</a>
                                            <a href="{{route('slider.edit', ['id'=>$slider->id])}}" class="btn btn-sm btn-info">Update</a>
                                            <a href={{ route('slider.trash', ['id'=>$slider->id]) }} class="btn btn-sm btn-danger">Delete</a>
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
</section>
<script>
    /** 
     * delete slider functiona for accept 
     * @params {int} id
    */

    function deleteSlider(id) {
        // let accept = confirm('Are you sure to delete');
        // if(accept) {
        //     window.location.href = `./admin/sliders/${id}/delete`;
        // }else {
        //     return;
        // }
    }
</script>

@endsection