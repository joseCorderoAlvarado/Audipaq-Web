{{-----------------------Modal Modificar Auditor---------------------------}}
<div id="modificarAuditor{{$auditor->id_persona}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Modificar Auditor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="btnModificar_Auditor" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                     <div class="row">
                            <div class="col-3">
                                <b><label>Id persona</label></b>
                            </div>
                            <div class="col-5">
                                <input type="text" readonly="true" class="form-control" name="txtidpersona"  style="width: auto;" value={{$auditor->id_persona}}>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                <b><label>Nombre</label></b>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" name="txtnombreAuditor" title="El nombre debe llevar solo letras y espacios" pattern="[A-Za-z\s]+" required style="width: auto;" value={{$auditor->nombre_persona}}>

                            </div>
                    </div>
                    <br>
                     <div class="row">
                            <div class="col-3">
                                <b><label>Apellido Paterno</label></b>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control"  name="txtapellidoPatAuditor" title="El apellido paterno debe llevar solo letras y espacios" pattern="[A-Za-z\s]+" required style="width: auto;" value={{$auditor->apellido_materno}}>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                <b><label>Apellido Materno</label></b>
                            </div>
                            <div class="col-5">    
                                <input type="text" class="form-control"  name="txtapellidoMatAuditor" title="El apellido materno debe llevar solo letras y espacios" pattern="[A-Za-z\s]+" required style="width: auto;" value={{$auditor->apellido_paterno}}>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                 <b><label>Correo</label></b>
                            </div>
                            <div class="col-5">
                                  <input type="email" class="form-control" name="correoAuditor" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="El correo debe contener entre caracteres el símbolo de '@' en seguida el símbolo de '.' y finalmente el dominio" required style="width: auto;" value={{$auditor->correo_electronico}}>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                <b><label>Empresa</label></b>
                            </div>
                            <div class="col-5"> 
                                <select name="fkEmpresa" class="form-control" style="width: auto;">
                                    <option value="{{$auditor->id_empresa }}" selected>{{$auditor->nombre_empresa}}
                                    </option>
                                    @foreach ($listaEmpresas as $empresa)
                                    <option value={{$empresa->id_empresa }}>
                                        {{ $empresa->nombre_empresa}} 
                                    </option>
                                    @endforeach     
                                </select> 
                            </div>
                    </div>
                    <br>
                </div>
                <div class="modal-footer" style="background:#546E7A; margin: auto;">
                    <button id="button" class="btn btn-primary" style="background: #00ACC1; border: none; align-items: center;">Guardar</button> 
                </div>

            </form>
            <button style="text-align:center; background: #00ACC1" data-toggle="modal" class="btn btn-primary" class="btn btn-sm btn-default" data-target="#modificarContraAuditor{{$auditor->id_persona}}" >Modificar la contraseña</button>
            @include('modales_Administrador.modal_ModificarContraAuditor')
        </div>
    </div>
</div>