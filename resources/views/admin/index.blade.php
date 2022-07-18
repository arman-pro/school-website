@extends('admin.layout.index')
@section('title', 'Control Your Application')
@section('content')
<div class="page-title">
    <h5>Admin Panel</h5>
    <p class="text-subtitle text-muted">A good admin panel to maintain your Application</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class='card-heading p-1 pl-3'>Admin Panel</h4>
                </div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="alert alert-primary">Wellcome to Dashboard</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        {{-- <div class="col-md-4">
            <div class="card widget-todo">
                <div class="card-body px-0 py-1">
                   <h2>Sidebar Area</h2>
                </div>
            </div>
        </div> --}}
    </div>
</section>
@endsection