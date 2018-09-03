
@extends('layout')
@section('content')
   
      <!-- menu-->
     
      <!-- menu-->
   <body>
</br>
</br>
</br>
</br>
    <div class="container" >
      <div class="col-lg-4 col-md-4 col-xs-4">
          <div class="rotacion">
         <a href="http://enterate.plataformate.com" >
              <img class="img-responsive" src={{ asset ('assets/img/Circulo1.png') }} alt="">
        </a>
        </div>
              <div class="indexText"> Entérate </div>
        
      </div>
      <div class="col-lg-4 col-md-4 col-xs-4">
         <div class="rotacion"> 
      <a href="http://formate.plataformate.com" >
            <img class="img-responsive" src={{ asset ('assets/img/Circulo2.png') }} alt="">
       </a>
       </div>
            <div class="indexText"> Fórmate </div>
            
      </div>
      <div class="col-lg-4 col-md-4 col-xs-4">
          <div class="rotacion"> 
         <a href="{{ URL::to('mapa') }}" >
            <img class="img-responsive" src={{ asset ('assets/img/Circulo3.png') }} alt="">
          </a>  
          
          </div>
            <div class="indexText"> Caracterízate </div>
       
      </div>
    </div>

<!--<div class="row">-->
</br>
      <div class="row"  id="footer">                
        <!-- LOGOS -->
        <div class="col-xs-3 .col-sm-3" >&nbsp;
        </div>
        <div class="col-xs-3 .col-sm-3" >
                  <img src="{{ asset('assets/img/logos1.png')}}"  class="img-responsive" alt="Gobernación del Meta">
                </div>
        <div class="col-xs-3 .col-sm-3" >
          <img src="{{ asset('assets/img/logos2.png')}}"  class="img-responsive" alt="Gobernación del Meta">
        </div>
         
         
      </div>  
    <div id="barra-colores">
    <img src={{ asset ('assets/img/BarraDeColores.png') }}  width="100%" style="max-height: 30px;"> 
     </div> 
@endsection

@push('styles')

 <!-- Estilos CSS -->
  <link rel="stylesheet" href="assets/css/map.css">
  <link rel="stylesheet" href="assets/css/style.css">
 @endpush

</body>