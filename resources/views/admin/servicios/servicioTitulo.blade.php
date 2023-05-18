@extends('admin.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:white;">.</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tabla de Titulos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div id="msj_alert__"></div>
                <div class="col-12">
                    <div class="pull-right" style="text-align: right;margin-right:25px;margin-bottom:10px;">
                    <a href="adminServicioHello"   class="btn bg-gradient-danger"><i class="fas fa-angle-left right"></i> Regresar</a>
                        <a href="javascript:void(0)" onclick="openModalTitulo(false,'CREAR')"
                            class="btn bg-gradient-success"><i class="far fa-edit"></i> Crear Titulo</a>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable de Titulo</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="dataTableTitulo">

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal de CRUD-->
    <div class="modal fade" id="modalTitulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">Operacion Titulo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formServicioTitulo">
                        <input type="hidden" name="txt_id_titulo" />
                        <input type="hidden" name="isValues" />
                        <!-- 1 : ES EL SERVICIO TENIS -->
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card card-primary">
                                    <div class="card-body">


                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Tipo de Servicio</label>
                                                <select class="form-control" name="txt_id_servicio">
                                                    @foreach ($rowData_cb_ as $rows)
                                                    <option value="{{ $rows->id_servicio }}">
                                                        {{ $rows->superior_titulo1 }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txt_titulo_principal">Titulo Principal</label>
                                            <input type="text" class="form-control" name="txt_titulo_principal"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-primary" id="btn_sumit">Aplicar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// :::::::::::::::::::::::: CREAR REGISTRO ::::::::::::::::
$('#formServicioTitulo').on('submit', function(e) {
    e.preventDefault();
    $('#modalTitulo').modal('hide')
    let formData = new FormData(this);
    axios.post('servicioGrabarTitulo',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {
        if (response.data.state == "error") {
            $('#msj_alert__').html(
                    '<div class="alert alert-danger" role="alert">' + response.data.data + '</div>')
                .fadeOut(9500);
        } else {
            $('#msj_alert__').html(
                    '<div class="alert alert-success" role="alert">' + response.data.data + '</div>'
                )
                .fadeOut(9500);
            if (response.data.src) {
                $('img[name=txt_url_image]').attr('src', response.data.src);
            }

            listarDataTableTitulo()
        }

    }).catch(function() {
        console.log('FAILURE!!');
    });

});


function listarDataTableTitulo() {

    $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'listarDataTableTitulo',
        data: "txt_apertura=" + 1,
        success: function(response) {
            $('#dataTableTitulo').html(response);
        }
    });

}

listarDataTableTitulo()

function openModalTitulo(id_titulo, isValues) {

    if (isValues == "ELIMINAR") {

        if (confirm('Esta seguro de Eliminar?')) {
            let formData = new FormData();
            formData.append('txt_id_titulo', id_titulo)
            formData.append('isValues', isValues)
            axios.post('servicioGrabarTitulo',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {
                if (response.data.state == "error") {
                    $('#msj_alert__').html(
                            '<div class="alert alert-danger" role="alert">' + response.data.data + '</div>')
                        .fadeOut(9500);
                } else {
                    $('#msj_alert__').html(
                            '<div class="alert alert-success" role="alert">' + response.data.data + '</div>'
                        )
                        .fadeOut(9500);
                    listarDataTableTitulo()
                }

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }

    } else {

        $('#modalTitulo').modal('show')
        $('input[name=txt_id_titulo]').val(id_titulo)
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR

        if (isValues == 'CREAR') {
            //LIMPIAR
            $('input[name=txt_titulo_principal]').val("");
        }

        if (id_titulo) {
            let formData = new FormData();
            formData.append('txt_id_titulo', id_titulo)
            axios.post('servicioEditarTitulo',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {

                $('select[name=txt_id_servicio]').val(response.data[0].id_servicio);
                $('input[name=txt_titulo_principal]').val(response.data[0].titulo_principal);

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }
    }
}
</script>
@endpush