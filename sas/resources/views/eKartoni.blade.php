@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
@section('content')


<div class="container">
   <h2>E-karton</h2>
    <div class="row">
        <div class="col-md-5 col-sm-12 col-lg-3 col-12">
        <input class="form-control mb-4" onkeydown="pretraziEKarton(this.value)" type="search" name="" placeholder="Unesite ime,prezime ili email" id="">
        </div>
            @foreach($terminiGroup as $j)
            <div class="col-12  ">
               <div class="emails mt-5 mb-5">
                <input type="hidden" class="skriveniEmail" value="{{$j['email']}} , {{$j['phone']}} {{$j['name']}}, {{$j['lname']}} "> 
               <h3 class="h3Emails"> {{$j['name']}} {{$j['lname']}} / <small> {{$j['email']}} {{$j['phone']}}</small></h3> <hr>
                <p id="{{$j['email']}}"></p>
               </div>
            </div>
            @endforeach
      
</div>
</div>




<script src="{{URL::asset('/js/main.js')}}"></script>
         <script>var terminiGroup = @json($terminiGroup); 
         var termini = @json($termini); 
         </script>
         <script>
            function ispiseKartona(){
                
                for(let i = 0; i < termini.length; i++){
                 
                    for(let j = 0; j < terminiGroup.length; j++){
                        console.log(terminiGroup[j].innerText);
                        if(terminiGroup[j].email == termini[i].email){
                            
                            let a = termini[i].date.split('-');
                            document.getElementById(terminiGroup[j].email).innerHTML +=`
                            <p> <span  class="timeMenjaj" >${a[2]}-${a[1]}-${a[0]}  ${termini[i].time} </span> &nbsp  ${termini[i].text}</p>
                           
                            
                            `;
                            }
                        }
                   
                }

                }
           
            
            ispiseKartona();
         </script>
@endsection
