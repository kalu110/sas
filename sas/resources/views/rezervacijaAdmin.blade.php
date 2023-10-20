@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
@section('content')
<div class="container">
<style> 
  body{
    font-family:'Nunito Sans',sans-serif !important;
    color:#FFFFFF
  }
  ::placeholder {
  color: white !important;
  opacity: 1; /* Firefox */
}

</style>
    <div class="row mb-5">
      <div class="alert {{ Session::get('flash_type') }}">
        {{ Session::get('flash_message') }}
        <button type="button"  onclick="closee()" class="btn-close" data-dismiss="alert" aria-label="Close">
    </div>
<div class="col-12 col-md-8  mt-5 mb-5" style="padding-left:0%; padding-right:0%;">
@include('layouts/flash')
@if ( Session::has('flash_message') )

 
  
@endif


         
        <form name="rezervacijaForma" onsubmit="return validacijaRezAdmin()"  method="post" action="{{url('dodajRezervaciju')}}">
       @csrf
         <div class="container" style="padding-left:0%; padding-right:0%;">
         
        
            <div class="row ">
                <div class="col-12" style="padding-left:0%; padding-right:0%;">
               
                <div class="wrapper">
                  <div class="px-4 py-4"><h2  style="color:#2596be;">EVENETS CALENDAR</h2></div>
               
      <header>
       
        <div class="icons">
          <div class="row">
            <div class="col-1 mt-2"> <span id="prev" class="material-symbols-rounded">chevron_left</span></div>
            <div class="col-10 text-center"><p class="current-date" style="color:#2596be; font-size:35px;"></p></div>
            <div class="col-1 mt-2">      <span id="next" class="material-symbols-rounded">chevron_right</span></div>
         
          
    
        </div>
        </div>
      </header>
      <div class="calendar">
        <ul class="weeks">
          <li>Ned</li>
          <li>Pon</li>
          <li>Uto</li>
          <li>Sre</li>
          <li>Čet</li>
          <li>Pet</li>
          <li>Sub</li>
        </ul>
        <ul class="days"></ul>
      </div>
    </div>
                <div class="col-12 mt-5">
                <h2 style="color:black; margin:0  0 10px  0 ;">Izaberite vreme:</h2>
                    <div class="row mb-5">
                      <input type="hidden" name="data-Time" id="realBroj">
                        @for($i=8;$i <= 17;$i++)
                        @for($j=0;$j <= 30;$j=$j+30)
                        @if($j==0 && ($i== 8 || $i == 9))
                        <div class="col-md-3 col-3 col-sm-3">
                        <input type="button" onclick="rezervacijaKlik2(this.value)"  name="time" value="0{{$i}}:{{$j}}0h"  class="btn border btnTime m-1">    
                          
                        
                    </div>
                        @elseif($i == 8 || $i==9 )

                        <div class="col-md-3 col-3 col-sm-3">
                        <input type="button" onclick="rezervacijaKlik2(this.value)"  name="time"  value="0{{$i}}:{{$j}}h"  class="btn border btnTime m-1">    
                       
                        
                    </div>
                        @elseif($j==0)

                        <div class="col-md-3 col-3 col-sm-3">
                        <input type="button" onclick="rezervacijaKlik2(this.value)"  name="time" value="{{$i}}:{{$j}}0h"  class="btn border btnTime m-1">    
                        
                        
                    </div>
                        @else

                        <div class="col-md-3 col-3 col-sm-3">
                        <input type="button" onclick="rezervacijaKlik2(this.value)"  name="time" value="{{$i}}:{{$j}}h"  class="btn border btnTime m-1">    
                        
                        
                    </div>
                        @endif

                        @endfor
                        @endfor
                    </div>
                  
                    </div>
                   
    <input type="hidden" name="date" id="datumHiddenInput">
    <button class="btn mt-5  m-2 px-4" style="border-radius:18px; height:40px; background-color:burlywood; color:black; font-weight:500; position: absolute; left:80%;">Sačuvaj</button>
                    </div>
    </form>

     
                    </div>
                    </div>


                    </div>

                    </form>

                    <div class="col-md-4 col-12 mt-5" style=" color:white; padding:0 !important;">
                      <div class="col-12" style="background-color: #2596be; height:579px;border-top-right-radius:10px;border-bottom-right-radius:10px;">
                    <div class="card"  style="border:none; background-color:#2596be;color:white;  border-top-right-radius:10px;">
                    
                        <div id="dateIspis" class="mt-2"></div>
                        <div class="mt-2" id="ispisAdminRez"></div>
                    </div>
                    <form name="brisanjeForma" class="formaBrisanje"  method="post"  action="{{asset('obrisiRezervaciju')}}">
                      {{method_field('DELETE')}}
                    @csrf  
                    <div id="hiddenBTN">
                     
                    </div>
                    </form>
                  </div>
                    <div class="col-12">
                      <div id="formaSakriti">
                        <div class="row mt-5">
                        <div class="form-group ml-3 col-12">
                            <label for="inputIme">Ime</label>
                            <input name="name" type="text" style="background-color:#2596be !important; color:white; text-align:center;font-size:18px;" class="form-control" id="inputIme4" placeholder="Ime"  required>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputPrezime4">Prezime</label>
                            <input name="lname" type="text" style="background-color:#2596be !important; color:white; text-align:center;font-size:18px;" class="form-control" id="inputPrezime4" placeholder="Prezime"  required>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Email</label>
                            <input name="email" type="email" style="background-color:#2596be !important; color:white; text-align:center;font-size:18px;" class="form-control" placeholder="sasdental@gmail.com" id="inputEmail4"  required>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputTelefon4">Telefon</label>
                            <input name="phone" type="tel" style="background-color:#2596be !important; color:white; text-align:center;font-size:18px;" class="form-control" placeholder="064/346-54-27" id="inputTelefon4"  required>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputTelefon4">Napomena</label>
                            <textarea name="napomena" placeholder="Napomena" style="background-color:#2596be !important; color:white; text-align:center;font-size:18px;" class="form-control" id="" cols="30" rows="2" placeholder="Napomena" required></textarea>
                          </div>
                          <input type="hidden" name="role" value='1'>
                          </div>
                          </div>
                    </div>
                  
                    </div>
                 
                    </div>
                    <form class="formaNovaNapomen" action="{{asset('updateNapomena')}}" method="post">
      @csrf
        <input type="hidden" name="id" id="novaNapomenaId">
        <input type="hidden" name="novaNapomena" id="novaNapomena" >
        <div id="hiddenBTNNewNapomena">
      
        </div>
      
      </form>
</div>

<div class="col-12" style="background-color:#2596be; width:76%; margin:auto; border-radius:10px;">

  <div class="row mt-5">
    <div class="col-12 px-5 pb-5 pt-2">
      @if(count($sve) > 0)
      @foreach ($sve as $s)
      @php
      
     $datemin =  date('j.M.Y', strtotime($s['dateMin']));
     $datemax =  date('j.M.Y', strtotime($s['dateMax']));
      @endphp
          <form name="brisanjeForma" class="formaBrisanje"  method="post"  action="{{asset('deleteSlobodniDani/'.$s['id'])}}">
          
      <div class="m-2">
        <span style="font-size:20px;">{{$datemin}} - {{$datemax}}</span>  <button class="btn btn-danger" style="padding:2px 15px 2px 15px; border-radius:10px;" >Obriši</button>
      </div>
      @endforeach
      @else
    </form>
      <span style="font-size:20px;">Nema slobodnih dana!</span> 
     @endif
    <div class="col-12 text-center">
      
      <button class="btn btn-primary" style="position:absolute; left:75%;border-radius:15px;"  onclick="godinjsiprviDeio(this)">Unesite godišnji</button>
    
      
    </div>
    <form method="post" onsubmit="return validacijaGodisnji()" action="{{url('/dodajSlobodanDan')}}">
      @csrf
    <div class="row godisnjidrugiDeo" style="display:none;">
      <div class="row">
    <div class="col-3 offset-5  text-center">
          <input class="form-control" id="dateMinValidacija" name="dateMin" onchange="promeniMinKodDrugog(this.value)" min="{{$date = now()->format('Y-m-d')}}" type="date">
          
    </div>
    <div class="col-3 text-center">
          <input class="form-control dateChange" id="dateMaxValidacija" name="dateMax" min="{{$date = now()->format('Y-m-d')}}" type="date">
    </div>
    <div class="col-1">
    <button type="submit" onclick="" class="btn btn-primary">Potvrdi</button>
      
  </div>
    </div>
  </div>
    </form>
    <div class="col-12 text-center"></div>
      </div>
    
  </div>
</div>

















































   
    















<script src="{{URL::asset('/js/script.js')}}" defer></script>
<script src="{{URL::asset('/js/main.js')}}"></script>
         <script>var termini = @json($termini); 
                  let sldani = @json($sve);
         </script>
  
@endsection
