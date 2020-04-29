{{-----------------------Modal de confirmación de Eliminar Empresa---------------------------}}
<div id="eliminarEmpresa{{$empresas->id_empresa}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Eliminar Empresa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                <b><label id="form_nombre">¿Estás seguro que deseas eliminar la empresa {{$empresas->nombre_empresa}} ?</label></b>
            </div>
            <div class="modal-footer">
                <form action="btnEliminarEmpresa" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <input type="hidden" name="txtIdEmpresa" value="{{$empresas->id_empresa}}">
                    <button id="button" class="btn btn-primary" style="background: #00ACC1; border: none; align-items: center; color: white;">Si</button>
                </form>
                <form action="ver_Auditor" method="get" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <button id="button" class="btn btn-primary" class="btn btn-sm btn-default" data-dismiss="modal" style="background: #00ACC1; border: none; align-items: center; color: white;">No</button>
                </form>
            </div>
        </div>
    </div>
</div>