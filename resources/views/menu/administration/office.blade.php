@extends('layout.layout')
{{-- page title --}}
@section('title', 'Office Stuff')
@section('body')
<div class="panel panel-primary">
    <div class="panel-heading">Office Stuff</div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @if (!$officers->isEmpty())
                @foreach ($officers as $officer)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img style="width:100px;" src={{asset('storage/img/teacher'.'/'.$officer->image)}} alt="{{$officer->image}}"/>
                        </td>
                        <td class="text-sm">
                            <p style="margin-bottom:3px;"><b>{{$officer->name}}</b></p>
                            <p class="text-muted">
                                <b>{{$officer->job}}</b>
                            </p>
                            <p class="text-justify">
                                {{$officer->description}}
                            </p>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr>
                    <td class='text-sm text-muted' colspan="3" style="text-align:center">No Data Available</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection