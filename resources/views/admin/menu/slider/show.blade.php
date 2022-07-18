@extends('admin.layout.index')
@section('title', $slider->title)
@section('content')
<div class="page-title">
    <h5>Show Slider</h5>
    <p class="text-subtitle text-sm text-muted">Create, Edit and Delete your Sliders</p>
</div>
<section class="section">
    {{-- <div class="row mb-2"></div> --}}
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-3">
                    <a href={{ url('admin/sliders') }} class="btn btn-sm btn-info">Back</a>
                    <a href={{ route('slider.create') }} class="btn btn-sm btn-success">Create New</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12 text-secondary">
                            <div class="img-thumbnail">
                                <img class="img-fluid" style="width:100%;" src="{{asset('/storage/img/slider')}}/{{$slider->thumbnail}}" alt="Thumbanail Image">
                                <div class="p-2">
                                    <p class="text-sm">{{$slider->subTitle}}</p>
                                    <h3>{{$slider->title}}</h3>
                                    <p class="text-sm">
                                        {{$slider->description}}
                                    </p>
                                </div>
                            </div>
                            <div class="alert alert-secondary mt-2" style='text-align:right;'>
                                @if ($previousId)
                                    <a href={{route('slider.show', ['id'=> $previousId])}} class="btn btn-sm btn-primary">Previous</a>
                                @endif
                                @if ($nextId)
                                <a href={{route('slider.show', ['id' => $nextId])}} class="btn btn-sm btn-primary">Next</a>
                                @endif
                                
                            </div>
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