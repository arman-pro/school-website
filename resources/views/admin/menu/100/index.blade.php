@extends('admin.layout.index')
@section('title', 'Celebrationers List')
@section('content')
<div class="page-title">
    <h5>Celebrationers List</h5>
    <p class="text-subtitle text-muted">100 Years Celebrations</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="row">
                                <form action="{{route('admin.100.fee', ['id' => $fee[0]->id??20])}}" method="post">
                                    @csrf
                                    <div class="col-md-6 col-sm-12">
                                        <label for="fee">Set Registration Fee</label>
                                        <input type="number" name="fee" class="form-control mb-2" id="fee" value="{{$fee[0]->fee??20}}" placeholder="Set Registration Fee" />
                                        @error('fee')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                        <button type="submit" class="btn btn-secondary">Update</button>
                                    </div>
                                </form>
                            </div>
                            @if (session('delete'))
                                <div class="alert alert-danger mt-2">{{session('delete')}}</div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Profession</th>
                                        <th>Session</th>
                                        <th>Registration</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$celebrationers->isEmpty())
                                    @foreach ($celebrationers as $celebrationer)
                                    <tr>
                                        <td>#{{$loop->iteration}}</td>
                                        <td>{{$celebrationer->name}}</td>
                                        <td>{{$celebrationer->phone}}</td>
                                        <td>{{$celebrationer->profession}}</td>
                                        <td>{{$celebrationer->session ? $celebrationer->session : 'N/A'}}</td>
                                        <td>{{date('j M y',strtotime($celebrationer->created_at))}}</td>
                                        <td>
                                           
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="settings" width="20"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                  <a class="dropdown-item text-success" target="_blank" href="{{route('admin.100.view', ['id' => $celebrationer->id])}}">View</a>
                                                  <a class="dropdown-item text-info" href="#">Update</a>
                                                <form action="{{route('admin.100.delete', ['id' => $celebrationer->id])}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                  <button class="dropdown-item text-danger" type="submit" >Delete</button>
                                                </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-muted text-center">No Data Found!!!</td>
                                    </tr>
                                    @endif
                                    
                                </tbody>
                                <footer>
                                    <tr>
                                        <td><b>Total: <?php echo $celebrationers->count() > 0 ? $celebrationers->count() . ' Person\'s': '0'; ;?></b></td>
                                        <td colspan="6" class="text-right">&nbsp;</td>
                                    </tr>
                                </footer>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection