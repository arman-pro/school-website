@extends('admin.layout.index')
@section('title', 'Celebrationers Expense List')
@section('content')
<div class="page-title">
    <h5>Expense List</h5>
    <p class="text-subtitle text-muted">100 Years Celebrations Expense</p>
</div>
<section class="section">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <form action="{{route('admin.100.expense')}}" method="post">
                                @if (session('message'))
                                    <div class="alert alert-success">{{session('message')}}</div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-success">{{session('error')}}</div>
                                @endif
                                {{-- csrf token --}}
                                @csrf
                                <div class="form-group">
                                    <label for="expenseTitle">Expense Title</label>
                                    <input type="text" name='expenseTitle' id="expenseTitle" class="form-control" value="{{old('expenseTitle')}}" placeholder="Ex Decoratoin Fare"/>
                                    @error('expenseTitle')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="expenseAmount">Expense Amount</label>
                                    <input type="number" name="expenseAmount" class="form-control" id="expenseAmount" value="{{old('expenseAmount')}}" placeholder="Ex 5000"/>
                                    @error('expenseAmount')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="notes">Note</label>
                                    <textarea name="note" id="notes" cols="30" rows="2" class="form-control" placeholder="Notes"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" value="<?php echo date("Y-m-d", strtotime('now')); ?>" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-success"><b>Save</b></button>
                                    <a href="{{route('admin.100.expense')}}" class="btn btn-sm btn-outline-danger"><b>Cancel</b></a>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$expenses->isEmpty())
                                    <?php $total=0; ?>
                                    @foreach ($expenses as $expense)
                                    <?php $total = $total + $expense->amount; ?>
                                    <tr>
                                        <td>#{{$loop->iteration}}</td>
                                        <td>{{$expense->title}}</td>
                                        <td>{{$expense->amount}}/-</td>
                                        <td>{{date('j M y', strtotime($expense->created_at))}}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="settings" width="20"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                  <a class="dropdown-item text-info" href="#">Update</a>
                                                  <a class="dropdown-item text-danger" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td class="text-muted text-center" colspan="5">Expense Not Found!!!</td>
                                        </tr>
                                    @endif                                
                                </tbody>
                                @if ($expenses->isNotEmpty())
                                <tfoot>
                                    <tr>
                                        <td><b>Total:</b></td>
                                        <td style="text-align: right" colspan="2">{{$total}}/-</td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                </tfoot>
                                @endif
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection