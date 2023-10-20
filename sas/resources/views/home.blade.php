@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="row">
<div class="col-12 col-md-4 offset-0 offset-md-2 mt-5">
  <a href="{{asset('rezervacijaAdmin')}}">
<div class="card">
  <div class="card-body homeDiv" >
  <img src="{{asset('images/calendar.png')}}" alt="">
  </div>
</div>
</a>
</div>

<div class="col-md-4 col-12  mt-5">
<a href="{{asset('eKartoni')}}">
<div class="card">
  <div class="card-body homeDiv" >
  <img src="{{asset('images/users.png')}}" alt="">
  </div>
</div>
</a>
</div>
</div>
</div>



<script src="{{URL::asset('/js/script.js')}}" defer></script>
<script src="{{URL::asset('/js/main.js')}}"></script>
         <script>var termini = @json($termini); 
                  let sldani = @json($sve);
         </script>
  
@endsection
