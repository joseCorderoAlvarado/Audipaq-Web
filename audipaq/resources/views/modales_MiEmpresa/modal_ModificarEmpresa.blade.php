{{-----------------------Modal de Modificar una Empresa---------------------------}}
<div id="modificarEmpresa{{$empresas->id_empresa}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Modificar empresa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
		
            <form class="formulario" action="btnModificarEmpresa" method="post" enctype="multipart/form-data" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;">
                {{csrf_field()}}
                <div class="row">
					<input type="hidden" class="form-control" name="txtIdEmpresa" readonly="true" style="border-radius: 5px" value="{{$empresas->id_empresa}}">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="idnombreEmpresa" name="nombreEmpresa" class="form-control" value="{{$empresas->nombre_empresa}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Giro</label>
                            <input type="text" id="idgiroEmpresa" name="giroEmpresa" class="form-control" value="{{$empresas->giro}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Misión</label>
                            <textarea id="idmisionEmpresa" name="misionEmpresa" class="form-control">{{$empresas->mision}}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Visión</label>
                            <textarea id="idvisionEmpresa" name="visionEmpresa" class="form-control">{{$empresas->vision}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Valores</label>
                            <textarea type="text" id="idvaloresEmpresa" name="valoresEmpresa" class="form-control">{{$empresas->valores}}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" id="iddireccionEmpresa" name="direccionEmpresa" class="form-control" value="{{$empresas->direccion}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" id="idtelefonoEmpresa" name="telefonoEmpresa" class="form-control" value="{{$empresas->telefono}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" id="idcorreoEmpresa" name="correoEmpresa" class="form-control" value="{{$empresas->correo_electronico}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Logotipo</label>
                            <div class="photo">
                                <div class="input-group">
                                <input multiple="multiple"  name="logotipo[]" type="file" style="padding: 5px 10px; background: #546E7A; color:#fff; border:0px solid #fff;" value="{{$empresas->logotipo}}">
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            <br>
            <div class="modal-footer" style="background:#546E7A;">
                <button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none;">Guardar</button>
            </div>
		</form>
        </div>
    </div>
</div>