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
                        <li class="breadcrumb-item active">Tabla de Servicios</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
    <input type="hidden" name="txt_id_descripcion" />
        <div class="container-fluid">
            <div class="row">
                <div id="msj_alert__"></div>
                <div class="col-12">
                    <div class="pull-right" style="text-align: right;margin-right:25px;margin-bottom:10px;">
                        <a href="adminServicioTitulo" class="btn bg-gradient-info"><i class="far fa-edit"></i>Tabla de
                            Titulos</a>
                        <a href="javascript:void(0)" onclick="openModalTraining(false,'CREAR')"
                            class="btn bg-gradient-success"><i class="far fa-edit"></i> Crear Servicio</a>
                    </div>

                    <div class="row" style="text-align: center;display: initial;">
                        <div class="form-group">
                            <label>Filtrar Tipo de Servicio</label>
                            <select class="form-control" name="txt_id_servicio_filtrar">
                                <option value="0">------------All ---------------- </option>
                                @foreach ($rowData_cb_ as $rows)
                                <option value="{{ $rows->id_servicio }}">
                                    {{ $rows->superior_titulo1 }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable de servicios</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="updateDiv"></div>
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

    <!-- Modal Principal-->
    <div class="modal fade" id="modalTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">Operacion Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="uploadFormTraining">

                        <input type="hidden" name="isValues" />
                        <input type="hidden" name="txt_titulo_principal__" />
                        <!-- 1 : ES EL SERVICIO TENIS -->
                        <input type="hidden" name="txt_id_servicio__" />
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card card-primary">
                                    <div class="card-body">


                                        <div class="form-group editShowHide">
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

                                        <div class="form-group editShowHide">
                                            <div class="form-group">
                                                <label>Titulo Principal</label>
                                                <select class="form-control" name="txt_titulo_principal"></select>
                                            </div>
                                        </div>

                                        <div class="form-group ShowHideHeader">
                                            <label for="txt_header_titulo">Titulo Header</label>
                                            <input type="text" class="form-control" name="txt_info_titulo_heder">
                                        </div>
                                        <div class="form-group ShowHideHeader">
                                            <label for="txt_header_descripcion">Descripción Header</label>
                                            <input type="text" class="form-control" name="txt_info_titulo_descripcion">
                                        </div>

                                        <div class="form-group">
                                            <label for="txt_sub_titulo">Sub Titulo</label>
                                            <input type="text" class="form-control" name="txt_sub_titulo">
                                        </div>

                                        <div class="form-group">
                                            <label for="txt_descripcion">Descripción</label>
                                            <textarea class="form-control" name="txt_descripcion" rows="3"
                                                placeholder="Enter ..." required></textarea>
                                        </div>

                                        <div class="form-group" style="text-align: center">
                                            <div class="contain animated bounce">
                                                <div class="alert"></div>
                                                <div id='img_contain'>
                                                    <img id="blah" align='middle'
                                                        src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png"
                                                        alt="your image" title='' name="txt_url_image" />
                                                </div>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" id="inputGroupFile01" name="image"
                                                            class="imgInp custom-file-input"
                                                            aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>

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


    <!-- Modal de Secundario-->
    <div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">Operacion Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">




                    <form id="saveService">
                        {{ csrf_field() }}
                        <div class="row">
                            <div id="updateDivInfo"></div>


                            <!-- /.col-->
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





@push('scripts')
<script>
function openModalTraining(id_descripcion, isValues) {

    console.log(id_descripcion)
    console.log(isValues)

    $('input[name=txt_id_descripcion]').val(id_descripcion)

    if (isValues == "ELIMINAR") {
        if (confirm('Esta seguro de Eliminar?')) {
            let formData = new FormData();
            formData.append('txt_id_descripcion', id_descripcion)
            formData.append('isValues', isValues)
            axios.post('createServicioTraining',
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
                    listarDataTable(0)
                }

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }

    } else if (isValues == "INFORMACION") {
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR, INFORMACION
        $('#modalInfo').modal('show')







        $.ajax({
            type: 'get',
            dataType: 'html',
            url: 'listarDataTableInfo',
            data: "txt_id_descripcion=" + id_descripcion,
            success: function(response) {
                $('#updateDivInfo').html(response);
            }
        });




        // $('.editShowHide').hide();
        // $('.ShowHideHeader').show();
        // $('.txt_url_link').hide();
        // $('label[for=txt_sub_titulo]').text("Titulo de Informacion");
        // $('img[name=txt_url_image]').attr('src', "https://sistemas.com/wp-content/uploads/2013/12/twitpic.png");
        // $("#uploadFormTraining").closest('form').find("input[type=text], textarea").val("");


        // let formData = new FormData();
        // formData.append('txt_id_descripcion', id_descripcion)
        // axios.post('editServicioTraining',
        //     formData, {
        //         headers: {
        //             'Content-Type': 'multipart/form-data'
        //         }
        //     }
        // ).then(function(response) {

        //     $('input[name=txt_id_servicio__]').val(response.data[0]
        //         .id_servicio); //SIRVE PARA MANTENER LA TABLA EN EL FILTRO

        //     $('input[name=txt_info_titulo_heder]').val(response.data[0].info_titulo_heder);
        //     $('input[name=txt_info_titulo_descripcion]').val(response.data[0].info_titulo_descripcion);
        //     $('input[name=txt_sub_titulo]').val(response.data[0].info_titulo);
        //     $('textarea[name=txt_descripcion]').val(response.data[0].info_descripcion);

        //     if (response.data[0].info_url_image)
        //         $('img[name=txt_url_image]').attr('src', response.data[0].info_url_image);

        // }).catch(function() {
        //     console.log('FAILURE!!');
        // });


    } else {




        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR, INFORMACION

        if (isValues == 'CREAR') {
            $('#modalTraining').modal('show')
            $('#modalInfo').modal('hide')
            $('.editShowHide').show();
            $('.txt_url_link').show();
            $('.ShowHideHeader').hide();
            $('label[for=txt_sub_titulo]').text("Sub Titulo");
            //LIMPIAR
            $('select[name=txt_titulo_principal]').val("");
            $('input[name=txt_sub_titulo]').val("");
            $('textarea[name=txt_descripcion]').val("");
            $('textarea[name=txt_url_link]').val("");
            $('img[name=txt_url_image]').attr('src', "https://sistemas.com/wp-content/uploads/2013/12/twitpic.png");
            $("input[name=image]").val(null);
        }

        if (isValues == "ACTUALIZAR") {
            $('#modalTraining').modal('show')
            $('#modalInfo').modal('hide')
            $('label[for=txt_sub_titulo]').text("Sub Titulo");
            $('.editShowHide').hide();
            $('.ShowHideHeader').hide();
            $('.txt_url_link').show();

            let formData = new FormData();
            formData.append('txt_id_descripcion', id_descripcion)
            axios.post('editServicioTraining',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {

                $('input[name=txt_id_servicio__]').val(response.data[0]
                    .id_servicio); //SIRVE PARA MANTENER LA TABLA EN EL FILTRO
                $('input[name=txt_titulo_principal__]').val(response.data[0].id_titulo);
                $('select[name=txt_titulo_principal]').val(response.data[0].id_titulo);
                $('input[name=txt_sub_titulo]').val(response.data[0].title);
                $('textarea[name=txt_descripcion]').val(response.data[0].descripcion);
                $('textarea[name=txt_url_link]').val(response.data[0].url_link);
                $('img[name=txt_url_image]').attr('src', response.data[0].url_image);

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }
    }
}


//:::::::::::: CRUD SERVICIOS :::::::::::::::::::::::::::::
$('#uploadFormTraining').on('submit', function(e) {
    e.preventDefault();

    $('#modalTraining').modal('hide')
    let formData = new FormData(this);
    formData.append('txt_id_descripcion', $("input[name=txt_id_descripcion]").val())
    axios.post('createServicioTraining',
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

            // if ($('input[name=isValues]').val() == "ACTUALIZAR")
            //     listarDataTable($('input[name=txt_id_servicio__]').val())
            // else
            listarDataTable(0)
            $("input[name=image]").val(null);
            $("input[name=image]").val("");
        }

    }).catch(function() {
        console.log('FAILURE!!');
    });

});

function listarDataTable(id_servicio) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'listarDataTable',
        data: "txt_id_servicio=" + id_servicio,
        success: function(response) {
            $('#updateDiv').html(response);
        }
    });
}

listarDataTable(0)


// ::::::::::::::::: SELECCIONAR IMAGEN :::::::::::::::::::::::::::
$("#inputGroupFile01").change(function(event) {
    RecurFadeIn();
    readURL(this);
});
$("#inputGroupFile01").on('click', function(event) {
    RecurFadeIn();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#inputGroupFile01").val();
        filename = filename.substring(filename.lastIndexOf('\\') + 1);
        reader.onload = function(e) {
            //   debugger;      
            $('#blah').attr('src', e.target.result);
            $('#blah').hide();
            $('#blah').fadeIn(500);
            $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $(".alert").removeClass("loading").hide();
}

function RecurFadeIn() {
    console.log('ran');
    FadeInAlert("Wait for it...");
}

function FadeInAlert(text) {
    $(".alert").show();
    $(".alert").text(text).addClass("loading");
}

// ::::::::::::::::::::::SELECCIONAR SERVICIO::::::::::::::::::::::::::::::::::::
$('select[name=txt_id_servicio]').on('change click', function() {
    const id_servicio = this.value;
    handleSecundario(id_servicio)
});
const handleSecundario = (id_servicio) => {
    axios.post('changeServicioTraining', {
            'txt_id_servicio': id_servicio,
        })
        .then(function(response) {
            $('select[name=txt_titulo_principal]').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                alert('No existe la medida.! Gracias')
            }
        })
}

$('select[name=txt_id_servicio_filtrar]').on('change click', function() {
    const id_servicio = this.value;
    listarDataTable(id_servicio)
});













$('#saveService').on('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('txt_id_descripcion', $("input[name=txt_id_descripcion]").val())
    axios.post('admin_servicio_update',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {
        console.log(response);
        setTimeout(() => {
            if (response.status == 200) {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )

                $('#modalInfo').modal('hide')

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        }, 500);

    }).catch(function() {
        console.log('FAILURE!!');
    });

});
</script>
@endpush


<style type="text/css">
.alert {
    text-align: center;
}

#blah {
    max-height: 256px;
    height: auto;
    width: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
    padding: 5px;
}

.input-group {
    /* margin-left:calc(calc(100vw - 320px)/2); */
    /* margin-top: 40px;
    width: 320px; */
    margin-bottom: 25px;
}

.imgInp {
    width: 150px;
    /* margin-top: 10px; */
    padding: 10px;
    background-color: #d3d3d3;
}

.loading {
    animation: blinkingText ease 2.5s infinite;
}

@keyframes blinkingText {
    0% {
        color: #000;
    }

    50% {
        color: #transparent;
    }

    99% {
        color: transparent;
    }

    100% {
        color: #000;
    }
}

.custom-file-label {
    cursor: pointer;
}

/************CREDITS**************/
.credit {
    font: 14px "Century Gothic", Futura, sans-serif;
    font-size: 12px;
    color: #3d3d3d;
    text-align: left;
    /* margin-top: 10px; */
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}

.credit a {
    color: gray;
}

.credit a:hover {
    color: black;
}

.credit a:visited {
    color: MediumPurple;
}
</style>
@endsection