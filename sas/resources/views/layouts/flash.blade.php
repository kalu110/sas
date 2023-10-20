@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  
  
   
  </button>
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Greška</strong> 
  <button type="button" onclick="closee()" class="btn-close" data-dismiss="alert" aria-label="Close">
   
  </button>
</div>
@endif
   
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible fade show">
<strong>Greška</strong> 
    <button type="button" onclick="closee()" class="btn-close" aria-label="Close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
<strong>Greška</strong> 
  <button type="button" onclick="closee()" class="btn-close" data-dismiss="alert" aria-label="Close">
   
  </button>
</div>
@endif
  
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Greška</strong> 
  <button type="button" onclick="closee()" class="btn-close" data-dismiss="alert" aria-label="Close">
   
  </button>
</div>
@endif