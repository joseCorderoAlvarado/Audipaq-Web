{{-----------------------Modal Crear Acta---------------------------}}
<div id="crearActa" class="modal fade">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Crear Acta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
		
            <form action="btnCrear_Acta" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                    <div class="row">
                            <div class="col-3">
                                <b><label>Fecha Inicio</label></b>
                            </div>
                            <div class="col-5">
                                <input type="date" class="form-control" style="width: auto;" min="2020-01-01" max="2023-12-31" name="txtFechaInicio" title="Tienes que definir una fecha de inicio" required>
                            </div>
                    </div>
                    <br>
                     <div class="row">
                            <div class="col-3">
                                <b><label>Fecha Final</label></b>
                            </div>
                            <div class="col-5">
                                  <input type="date" class="form-control" style="width: auto;" min="2020-01-01" max="2023-12-31" name="txtFechaFinal" title="Tienes que definir una fecha final" required>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                 <b><label>Estatus</label></b>
                            </div>
                            <div class="col-5">
                                   <select name="txtEstatus" class="form-control" style="width: auto;"  >
                                    <option selected >Selecciona el estatus
                                    @foreach ($listastatus as $status)
                                    <option selected value={{$status->id_status }}>
                                        {{ $status->tipo_status}} 
                                    </option>
                                    @endforeach     
                                </select> 
                            </div>
                    </div>
                    <br>
                    <div class="row">
                             <div class="col-3">
                                <b><label>Área</label></b>
                             </div>
                             <div class="col-5">
                                <select name="txtArea" class="form-control" style="width: auto;" title="Tienes que seleccionar un area" required>
                                    <option selected>Selecciona el área
                                    @foreach ($listaArea as $area)
                                    <option selected value={{$area->id_area }} >
                                        {{ $area->nombre_area}} 
                                    </option>
                                    @endforeach     
                                </select> 
                             </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                <b><label>Departamento</label></b>
                            </div>
                           <div class="col-5">
                               <select name="txtDepartamento" class="form-control" style="width: auto;" title="Tienes que seleccionar un departamento" required>
                                    <option selected>Selecciona el departamento
                                    </option>
                                    @foreach ($listaDepartamento as $departamento)
                                    <option selected value={{$departamento->id_departamento }}>
                                        {{ $departamento->nombre_departamento}} 
                                    </option>
                                    @endforeach     
                                </select> 
                             </div>
                    </div>
                    <br /> 
                    <div style="background-color: white; width: 100%; margin-right: auto; margin-left: auto; padding-top: 5px; padding-right: 20px; padding-left: 20px;">
                        <center><p style="text-align: left;">Si el área y el departamento no aparecen escribirlos a continuación</p></center>
                        <center><section>Área</section></center>
                        <br />
                        <div class="row">
                            <div class="col-6">
                                <input type="text" name="nombreArea" placeholder=" Nombre">
                            </div>
                            <div class="col-6">
                                <input type="text" name="encargadoArea" placeholder=" Encargado">
                            </div>
                        </div>
                        <br / >
                        <center><section>Departamento</section></center>
                        <br />
                        <div class="row">
                            <div class="col-6">
                                <input type="text" name="nombreDepartamento" placeholder=" Nombre">
                            </div>
                            <div class="col-6">
                                <input type="text" name="encargadoDepartamento" placeholder=" Encargado">
                            </div>
                        </div>
                        <br />

                    </div>
                     <br />
                     <div style="background-color: white; width: 100%; margin-right: auto; margin-left: auto; padding-top: 5px; padding-right: 20px; padding-left: 20px;">
                        <center><p style="text-align: left;">Escribe los datos del auditado a continuación</p></center>
                        <br />
                        <center><section>Datos del auditado</section></center>
                        <br />
                        <div class="row">
                            <div class="col-6">
                                <input type="text" name="nombreAuditado" placeholder=" Nombre" required="true">
                            </div>
                            <div class="col-6">
                                <input type="text" name="apellidoPaternoAuditado" placeholder=" Apelido paterno" required="true">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-6">
                                <input type="text" name="apellidoMaternoAuditado" placeholder=" Apelido materno" required="true">
                            </div>
                            <div class="col-6">
                                <input type="email" name="correoAuditado" placeholder=" Correo electrónico" required="true">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-6" style="padding-left: 35%">
                                <label>Empresa</label>
                            </div>
                            <div class="col-6">
                                <select>
                              <option>
                                  ...
                              </option>  
                            </select>
                            </div>
                        </div>
                        <br />
                    </div>       
                </div>
                <div class="modal-footer" style="background:#546E7A; margin: auto;">
                    <button id="button" class="btn btn-primary" style="background: #00ACC1; border: none; align-items: center;">Guardar</button> 

                </div>
            </form>
        </div>
    </div>
</div>