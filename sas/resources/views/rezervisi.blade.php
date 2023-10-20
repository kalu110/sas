<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
       
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
    @include('layouts/flash')
    @if(Session::has('message'))

    @endif
        <div class="container-fluid" style="height:600px; width:100%; margin:0; padding:0;">
    <img  style="width:100%; height:600px;" src="{{asset('images/rezervacija.jpg')}}" alt=""></div>
    <div class="col-4 offset-4 mt-5 predprvi">
       <h4 class="text-center"> Zakažite Vaš termin u samo par klikova!</h4>
        <div class="col-2 offset-5"><button onclick="closeAndOpenOne()" class="btn btn-primary" style="width:100%;">Zakazi</button></div>
        </div>
        <form  name="rezervacijaForma"  method="post" action="{{url('dodajRezervaciju')}}">
       @csrf
         <div class="container">
            <div class="row m-5">
                <div class="col-6 offset-3">
                <div class="col-12 prvi ">
                    <h4>Izaberite datum:</h4>
                    <div class="row m-5">
                        @php
                         $date = date("Y-m-d");
                        @endphp
                    <input type="date" onchange="promeniDatum(this.value)" name="date" min="{{$date}}" class="form-control"  id="dateInput" required>
                </div>
                </div>
                <div class="col-12 drugi">
                <h4>Izaberite vreme:</h4>
                    <div class="row">
                      <input type="hidden" name="data-Time" id="realBroj">
                        @for($i=8;$i <= 17;$i++)
                        @for($j=0;$j <= 30;$j=$j+30)
                        @if($j==0 && ($i== 8 || $i == 9))
                        <div class="col-2">
                        <input type="button" onclick="rezervacijaKlik(this.value)"  name="time" value="0{{$i}}:{{$j}}0h" class="btn btn-light border btnTime m-1">    
                          
                        
                    </div>
                        @elseif($i == 8 || $i==9 )

                        <div class="col-2">
                        <input type="button" onclick="rezervacijaKlik(this.value)"  name="time"  value="0{{$i}}:{{$j}}h" class="btn btn-light border btnTime m-1">    
                       
                        
                    </div>
                        @elseif($j==0)

                        <div class="col-2">
                        <input type="button" onclick="rezervacijaKlik(this.value)"  name="time" value="{{$i}}:{{$j}}0h" class="btn btn-light border btnTime m-1">    
                        
                        
                    </div>
                        @else

                        <div class="col-2">
                        <input type="button" onclick="rezervacijaKlik(this.value)"  name="time" value="{{$i}}:{{$j}}h" class="btn btn-light border btnTime m-1">    
                        
                        
                    </div>
                        @endif

                        @endfor
                        @endfor
                    </div>
                    <input type="button" class="btn btn-primary" onclick="vratiNaDatum()" value="Nazad">
                    </div>

                    </div>

                    <div class="col-6 offset-3 treci">
                        <h4>Unesite Vaše podatke:</h4>
                    <div id="formaSakriti">
  <div class="row mt-5">
  <div class="form-group ml-3 col-md-6">
      <label for="inputIme">Ime</label>
      <input name="name" type="text" class="form-control" id="inputIme4" placeholder="Ime" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPrezime4">Prezime</label>
      <input name="lname" type="text" class="form-control" id="inputPrezime4" placeholder="Prezime" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputTelefon4">Telefon</label>
      <input name="phone" type="tel" class="form-control" id="inputTelefon4" placeholder="Telefon" required>
    </div>
    <input type="hidden" name="role" value='0'>
  </div>
 <div class="row mt-3">
 <div class="col-4"> <input type="button" class="btn btn-primary mr-5" value="Nazad" onclick="vratiNaPredPot()"></div><div class="col-2 offset-5">
    <input type="button" class="btn btn-primary ml-5" id="myBtn" value="Rezervisi"></div></div>
        <!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
    <span class="close">&times;</span>
    <h2>Potvrda rezervacije termina:</h2>
  </div>
  <div class="modal-body">
    <div id="ispis"></div>
  </div>
  <div class="modal-footer">
    <h3>© 2023 Sas-dental</h3>
  </div>
</div>

</div>
</form>

                  
                </div>
            </div>
         </div>       










         <script src="{{URL::asset('/js/main.js')}}"></script>
         <script>var termini = @json($termini) </script>
  
    </body>
</html>
