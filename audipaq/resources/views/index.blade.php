@extends('layouts.head')
@include('layouts.menu_Navegacion')
<br>
<br>
@include('layouts.Carrusel')

@if(Session::has('flash_message'))
        <div class="alert alert-success" role="alert">
          {{ Session::get('flash_message') }}
        </div>
      @elseif(Session::has('mensaje'))
        <div class="alert alert-danger" role="alert">
          {{ Session::get('mensaje') }}
        </div>
      @endif

 <div class="row">
      <div class="col-md-4">
           <p align="center">
            <b style="color: #000000"> Conócenos </b>
           </p>
             <p align="center" style="color: #000000">
               <br>Lorem impsum dolor
               <br>is amet de misem an
               <br>sompon dis an al site
             </p>
        </div>

        <div class="col-md-4">
           <p align="center">
            <b style="color: #000000"> Términos </b>
           </p>
             <p align="center" style="color: #000000">
               <br>Lorem impsum dolor
               <br>is amet de misem an
               <br>sompon dis an al site
             </p>
        </div>

        <div class="col-md-4">
           <p align="center">
            <b style="color: #000000"> Condiciones </b>
           </p>
             <p align="center" style="color: #000000">
               <br>Lorem impsum dolor
               <br>is amet de misem an
               <br>sompon dis an al site
             </p>
        </div>  

  </div>      

@extends('layouts.footer')