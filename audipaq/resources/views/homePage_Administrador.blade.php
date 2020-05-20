@extends('layouts.head')
@include('layouts.menu_Navegacion_Administrador')
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
               <br>Somos una empresa dedicada a 
               <br>dar soluciones en el proceso de
               <br>auditorias y agilizar los procesos
               <br> de las mismas
             </p>
        </div>

        <div class="col-md-4">
           <p align="center">
            <b style="color: #000000"> Términos </b>
           </p>
             <p align="center" style="color: #000000">
               <br>Generar una zona segura en la
               <br>cual los auditores pueden generar
               <br>un acta de auditoria para las
               <br>empresas
             </p>
        </div>

        <div class="col-md-4">
           <p align="center">
            <b style="color: #000000"> Condiciones </b>
           </p>
             <p align="center" style="color: #000000">
               <br>Ser una empresa responsable en
               <br>el manejo manejo de información,
               <br>siempre manejando don deber cada
               <br>una de ellas
             </p>
        </div>  

  </div>      

@extends('layouts.footer')