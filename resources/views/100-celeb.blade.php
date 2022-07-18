<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;500;700&display=swap" rel="stylesheet">

    <title>100 Years Celebrations Registration</title>
    <style>
        body,html {
            font-family: 'Raleway', sans-serif;
        }
    </style>
  </head>
  <body>
    <div class="container mt-5">
    <div class="border border-success rounded p-3">
        <h3 class="text-center"><span class="text-success ">100 Years</span> <span class="text-danger">Celebration</span></h3>
        @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
                <span class="float-right">
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('admin.100.view', ['id' => session('last_id')])}}" target="_blank" rel="noopener noreferrer">Show</a>
                </span>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <form action="{{route('100')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="registrationerName">Registrationer Name*</label>
                    <input type="text" name="registrationerName" class="form-control" id="registrationerName" placeholder="Ex Jone Doe" value="{{old('registrationerName')}}" />
                    @error('registrationerName')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="mobile">Mobile*</label>
                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Ex 017...." value="{{old('mobile')}}" />
                    @error('mobile')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="currentProfession">Current Profession*</label>
                    <input type="text" name="currentProfession" class="form-control" id="currentProfession" placeholder="Ex Teacher/Doctore/Farmer" value="{{old('currentProfession')}}" />
                    @error('currentProfession')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image" />
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="sessionYear">Session Year</label>
                    <input type="text" name="sessionYear" class="form-control" id="sessionYear" placeholder="Ex 2015-2017" value="{{old('sessionYear')}}" />
                    @error('sessionYear')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="registrationFee">Registration Fee</label>
                    <input type="number" value="{{$fee[0]->fee}}" class="form-control" id="fee" disabled="true" />
                    <input type="hidden" value="{{$fee[0]->fee}}" name="registrationFee" class="form-control" required />
                    @error('registrationFee')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            {{-- <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="divison">Divison</label>
                    <select name="divison" id="divison" class="form-control">
                        <option value="" hidden>Select Divison</option>
                        <option value="">Rangpur</option>
                    </select>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="district">District</label>
                    <select name="district" id="district" class="form-control">
                        <option value="" hidden>Select District</option>
                        <option value="">Rangpur</option>
                    </select>
                </div>
            </div> --}}
            <div class="form-row">
                <div class="form-group col-md-12 col-sm-12">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control" cols="30" rows="2" placeholder="Write Address">{{old('address')}}</textarea>
                    @error('address')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-success">Registration</button>&nbsp; &nbsp;
                <a type="button" href="{{url('/')}}" class="btn btn-outline-danger">Cancel</a>
            </div>
        </form>
    </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
  </body>
</html>