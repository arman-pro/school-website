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

    <title>View Details</title>
    <style>
        body,html {
            font-family: 'Raleway', sans-serif;
        }
    </style>
  </head>
  <body>
    <div class="container mt-5">
        @if ($celebrationer!=null)
        <table class="table">
            <tbody>
                <tr>
                    <td><b>Name: </b>{{$celebrationer->name}}</td>
                    <td><b>Phone: </b>{{$celebrationer->phone}}</td>
                </tr>
                <tr>
                    <td><b>Profession: </b>{{$celebrationer->profession}}</td>
                    <td><b>Session: </b>{{$celebrationer->session?$celebrationer->session:"N/A"}}</td>
                </tr>
                <tr>
                    <td><b>Fee: </b>{{$celebrationer->fee}}</td>
                    <td><b>Address: </b>{{$celebrationer->address}}</td>
                </tr>
            </tbody>
        </table>
        @else
            <div class="alert alert-secondary text-light">Not Found!</div>
        @endif
    </div>
  </body>
</html>