@extends('layout.layout')
@section('title', 'Home')
@section('body')
    <div class="panel panel-primary">
        <div class="panel-heading text-center">Today's Wisdom Word</div>
        <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        </div>
    </div>

  <div class="panel panel-primary">
    <div class="panel-heading text-center">Today's Student Birthday</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img style="width: 100%;" src={{asset('/img/student/man.png')}} alt="student image">
            <div class="caption">
              <h5>Lorem ipsum</h5>
              <p>
                Class: Six | Roll: 06
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img style="width: 100%;" src={{asset('/img/student/man.png')}} alt="student image">
            <div class="caption">
              <h5>Lorem ipsum</h5>
              <p>
                Class: Six | Roll: 06
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img style="width: 100%;" src={{asset('/img/student/man.png')}} alt="student image">
            <div class="caption">
              <h5>Lorem ipsum</h5>
              <p>
                Class: Six | Roll: 06
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection