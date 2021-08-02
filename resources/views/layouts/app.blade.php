<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">

 

  <title>{{ config('app.name', 'Laravel') }}</title>
  <style type="text/css">
  body{
    background-color: cornflowerblue;
    height: auto;
  }
  .forbg{
    background-color: cornflowerblue;
    height: auto;
  }
  .forrow{
    justify-content: center;
  }
  .forcolumn{
    border-radius: 40px;
    /*background-color: rgb(22 0 49 / 82%);*/
    margin-top: 50px;
    padding-bottom: 30px;
    background: linear-gradient( 
1deg
, #000000b3, transparent);
  }
  .username{
   
    width: 250px;
    border-radius: 18px;
    background-color: #add8e6a6;
    border: none;
    font-style: italic;
    margin: 10px;
    padding:10px;
  }
  .password{
    width: 250px;
    border-radius: 18px;
    background-color: #add8e6a6;
    border: none;
    margin-top: 10px;
    font-style: italic;
    margin: 10px;
    padding:10px;
  }
  .rememberme{
    margin: 20px;
  }
  .button2 {
    background-color: rgb(78 140 255 / 1);
    border-radius: 15px;
    width: 250px;
    border: none;
    margin-left:8px;
   
   
  }
  .login{
    white-space: nowrap;
    text-align: center;
    font-style: normal;
    font-weight: bold;
    font-size: 22px;
    color: rgba(255,255,255,1);
    margin-top: 10px;
  }
  .psw{
    color: #fff;
    margin-left: 72px;
  }
  ::placeholder {
    color: #fff;
    opacity: 1;
  }

  .traffic-jam {
  margin: auto;
  color: white;
  height: 80px;
  width: 80px;
  display: flex;
  fill: rgba(255, 255, 255, 1);
  justify-content: center;
  align-content: center;
  align-items: center;
}
</style>
</head>
<body>
<div id="stars"></div>
<div id="stars2"></div>
<div id="stars3"></div>


@yield('content')

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>
</html>