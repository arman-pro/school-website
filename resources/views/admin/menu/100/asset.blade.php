@extends('admin.layout.index')
@section('title', 'Celebrationers Expense List')
@section('content')
<div class="page-title">
    <h5>Asset
    </h5>
    <p class="text-subtitle text-muted">100 Years Celebrations Assets</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Asset @if ($amounts->isNotEmpty())
                                            <b> ({{$amounts[0]->persons}})</b>
                                        @endif </td>
                                        <td>
                                            @if ($amounts->isNotEmpty())
                                                <b>{{$amounts[0]->amount}}</b>
                                            @endif
                                        </td>
                                    </tr>
                                    @if ($expenses->isNotEmpty())
                                    <tr>
                                        <td>Expense <b>({{$expenses[0]->total}})</b></td>
                                        <td><b>{{$expenses[0]->amount}}</b></td>
                                    </tr>
                                    @endif
                                    
                                    <tr>
                                        <td>Total:</td>
                                        <td><b>{{$amounts[0]->amount - $expenses[0]->amount}}</b></td>
                                    </tr>
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
