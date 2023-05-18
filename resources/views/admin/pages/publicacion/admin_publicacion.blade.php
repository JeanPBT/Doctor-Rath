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
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Tabla de Publicaciones</li>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group">
                            @if(count($rowData_)!=0)
                            <select class="custom-select" id="txt_id_servicio_filtrar" name="txt_id_servicio_filtrar">
                                <option value="0">------------All ---------------- </option>
                                @foreach ($rowData_ as $rows)
                                <option value="{{$rows->id_publicacion_categoria}}">{{$rows->nombre}}</option>
                                @endforeach
                            </select>
                            @endif
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" id="btnBuscar" type="button"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">.</div>
                <div class="col-md-2">
                    <a href="javascript:void(0)" onclick="openModalTraining(false,'CREAR')"
                        class="btn btn-block bg-gradient-success"><i class="far fa-edit"></i> Crear</a>
                </div>
            </div>
            <div class="row">
                <div class="card-body" id="updateDiv"></div>
            </div>

    </section>

    <!-- Modal de CRUD-->
    <div class="modal fade" id="modalTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">Actualizar Publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="uploadFormTraining">
                        <input type="hidden" name="id_publicacion" id="id_publicacion" />
                        <input type="hidden" name="isValues" />

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select class="form-control" name="txt_id_publicacion_categoria">
                                                    @foreach ($rowData_ as $rows)
                                                    <option value="{{$rows->id_publicacion_categoria}}">
                                                        {{$rows->nombre}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input type="text" class="form-control" name="txt_titulo" required>
                                            </div>
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
                                                    <img id="blah"
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

    <!-- Modal Texto-->
    <div class="modal fade" id="modalDescripcionTexto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">Enlace Texto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <!-- /.content-header -->
                    <section class=" team-section clearfix">
                        <div class="container">
                            <form id="saveService">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="modal-footer">
                                            <button class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-5">
                                        <div class="event-details">
                                            <span>
                                                <label>Título <i class="fas fa-edit"></i></label>
                                                <h1 id="txt_titulo1" contenteditable="true" dir="ltr" class="deletable">
                                                </h1>
                                            </span>
                                            <label>Descripción <i class="fas fa-edit"></i></label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p id="txt_descripcion1" contenteditable="true" class="deletable"
                                                        style="text-align: justify;"></p>
                                                </div>
                                                <div class="col-md-9">
                                                    <label><i class="fas fa-edit"></i></label>
                                                    <p id="txt_descripcion2" contenteditable="true" class="deletable"
                                                        style="text-align: justify;"></p>
                                                </div>

                                                <div class="col-md-12">
                                                    <label><i class="fas fa-edit"></i></label>
                                                    <p id="txt_descripcion3" contenteditable="true" class="deletable"
                                                        style="text-align: justify;"></p>
                                                </div>

                                                <div class="col-md-6" style="text-align: center;">
                                                    <div class="standard-messaging">
                                                        <input type="file" name="image1" id="image1" multiple
                                                            accept="image/*" style="display:none"
                                                            onchange="handleFiles(this.files)">
                                                        <a href="#" id="fileSelect" class="helper center">

                                                            <div id="fileList">
                                                                <img src='/img/mc_admin/perrito.jpg'
                                                                    style="width: 190px;" id="imgImagen" />
                                                            </div>
                                                            Cambie la Imagen (Formato
                                                            .jpg, .png,
                                                            .gif)
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-md-6" style="text-align: center;">
                                                    <div class="standard-messaging">

                                                        <a href="#" id="fileSelectPDF" class="helper center">
                                                            <div id="imagenPDF">
                                                                <img src='/img/mc_admin/pdf.jpg' style="width: 190px;"
                                                                    id="imagenPDF" />
                                                            </div>
                                                            Subir PDF
                                                        </a>

                                                        <input type="file" name="pdf" id="pdf"
                                                            onchange="handleFilesPDF(this.files)" multiple
                                                            accept="application/pdf,application/vnd.ms-excel">
                                                    </div>
                                                </div>


                                                <div class="col-md-12" style="text-align: center;">
                                                    <div class="standard-messaging">
                                                        <a href="#" target="_blank" id="file_pdf"
                                                            class="helper center">Link Descargar </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                            <button class="btn btn-primary">Actualizar</button>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                aria-label="Close">
                                                Cerrar
                                            </button>

                                        </div>
                                    </div>



                                </div>


                            </form>

                        </div>


                    </section>



                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
//:::::::::::: CRUD GALERIAS :::::::::::::::::::::::::::::
function listarDataTable(id_publicacion_categoria) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'listarPublicaciones',
        data: "txt_id_publicacion_categoria=" + id_publicacion_categoria,
        success: function(response) {
            $('#updateDiv').html(response);
        }
    });
}

listarDataTable(0)

$('#btnBuscar').on('change click', function() {
    const id_publicacion_categoria = $('select[name=txt_id_servicio_filtrar]').val();
    console.log(id_publicacion_categoria)
    listarDataTable(id_publicacion_categoria)
});

//OPERACIONES:CREAR, ACTUALIZAR Y ELIMINAR
$('#uploadFormTraining').on('submit', function(e) {
    e.preventDefault();

    $('#modalTraining').modal('hide')
    let formData = new FormData(this);
    axios.post('crearPublicacion',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {
        if (response.data.state == "error") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
        } else {
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            )
            if (response.data.src) {
                $('img[name=txt_url_image]').attr('src', response.data.src);
            }
            listarDataTable($('select[name=txt_id_servicio_filtrar]').val())
            $("input[name=image]").val(null);
            $("input[name=image]").val("");
        }
    }).catch(function() {
        console.log('FAILURE!!');
    });

});


function openModalTraining(id_publicacion, isValues) {

    $('input[name=id_publicacion]').val(id_publicacion)

    // CASO CLICK MODAL, ELIMINAR
    if (isValues == "ELIMINAR") {
        if (confirm('Esta seguro de Eliminar?')) {
            let formData = new FormData();
            formData.append('id_publicacion', id_publicacion)
            formData.append('isValues', isValues)
            axios.post('crearPublicacion',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {
                if (response.data.state == "error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                } else {
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    )
                    listarDataTable($('select[name=txt_id_servicio_filtrar]').val())
                }

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }

    } else if (isValues == 'TEXTO') {
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR
        $('#modalDescripcionTexto').modal({
            backdrop: 'static',
            keyboard: false // to prevent closing with Esc button (if you want this too)
        })


        let formData = new FormData();
        formData.append('id_publicacion', id_publicacion)
        axios.post('editarPublicacion',
            formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
        ).then(function(response) {

            $('#txt_titulo1').text((response.data[0].title1 != null) ? response.data[0].title1 :
                "Escriba un título");
            $('#txt_descripcion1').html((response.data[0].descripcion1 != null) ? response.data[0]
                .descripcion1 : 'Lorem Ipsum is simply dummy text of the printing and typesetting');
            $('#txt_descripcion2').html((response.data[0].descripcion2 != null) ? response.data[0]
                .descripcion2 : 'Lorem Ipsum is simply dummy text of the printing and typesetting');
            $('#txt_descripcion3').html((response.data[0].descripcion3 != null) ? response.data[0]
                .descripcion3 : 'Lorem Ipsum is simply dummy text of the printing and typesetting');
            $('#imgImagen').prop('src', (response.data[0].url_image1 != null) ? response.data[0].url_image1 :
                "/img/mc_admin/perrito.jpg");
            $('#file_pdf').prop('href', ((response.data[0].url_pdf != null) ? response.data[0].url_pdf : '#'));
        }).catch(function() {
            console.log('FAILURE!!');
        });

    } else {
        // CASO CLICK MODAL, EDITAR
        $('#modalTraining').modal('show')

        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR

        if (isValues == 'CREAR') {

            //LIMPIAR
            $('input[name=txt_id_publicacion_categoria]').val("");
            $('textarea[name=txt_descripcion]').val("");
            $('img[name=txt_url_image]').attr('src', "/template_admin/img/modelo/fotos.png");
            $("input[name=image]").val(null);
        }
        // CASO , SI ES FALSO => ES EDITAR
        if (id_publicacion) {

            let formData = new FormData();
            formData.append('id_publicacion', id_publicacion)
            axios.post('editarPublicacion',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {

                $('input[name=id_publicacion]').val(response.data[0].id_publicacion);
                $('input[name=txt_titulo]').val(response.data[0].titulo);
                $('textarea[name=txt_descripcion]').val(response.data[0].descripcion);
                $('select[name=txt_id_publicacion_categoria]').val(response.data[0].id_publicacion_categoria);
                $('img[name=txt_url_image]').attr('src', (response.data[0].url_image != null ? response.data[0]
                    .url_image : "/template_admin/img/modelo/fotos.png"));

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }
    }
}
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

// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::



//OPERACIONES:CREAR, ACTUALIZAR
$('#uploadFormTexto').on('submit', function(e) {
    e.preventDefault();

    $('#modalDescripcionTexto').modal('hide')
    let formData = new FormData(this);
    axios.post('crearPublicacion',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {

        setTimeout(() => {
            if (response.status == 200) {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )
                listData_NuestraActividad($('select[name=txt_id_servicio_filtrar]').val())
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

$('textarea[name=txt_descripcion_texto]').summernote({
    tabsize: 4,
    height: 420
});




//OPERACIONES:CREAR, ACTUALIZAR
$('#uploadFormTextoCategoria').on('submit', function(e) {
    e.preventDefault();
    $('#modalDescripcionTexto').modal('hide')
    let formData = new FormData(this);
    axios.post('crearPublicacion',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {

        setTimeout(() => {
            if (response.status == 200) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.reload();
                })

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

//========================= ACTUALIZAR HOJA DE TEXTO
window.URL = window.URL || window.webkitURL;

//================== IMAGEN ==========================
var fileSelect = document.getElementById("fileSelect"),
    fileElem = document.getElementById("image1"),
    fileList = document.getElementById("fileList");

fileSelect.addEventListener("click", function(e) {
    if (fileElem) {
        fileElem.click();
    }
    e.preventDefault(); // prevent navigation to "#"
}, false);

function handleFiles(files) {
    if (!files.length) {
        fileList.innerHTML = "<p>No files selected!</p>";
    } else {
        fileList.innerHTML = "";
        var list = document.createElement("ul");
        fileList.appendChild(list);
        for (var i = 0; i < files.length; i++) {
            var li = document.createElement("li");
            list.appendChild(li);

            var img = document.createElement("img");
            img.src = window.URL.createObjectURL(files[i]);
            img.style.width = "150px";
            img.style.height = "150px";

            img.onload = function() {
                window.URL.revokeObjectURL(this.src);
            }
            li.appendChild(img);
            var info = document.createElement("span");

        }
    }
}
//================== PDF ==========================

var fileSelectPDF = document.getElementById("fileSelectPDF"),
    fileElemPdf = document.getElementById("pdf");

fileSelectPDF.addEventListener("click", function(e) {
    if (fileElemPdf) {
        fileElemPdf.click();
    }
    e.preventDefault(); // prevent navigation to "#"
}, false);

function handleFilesPDF(files) {
    if (!files.length) {
        fileList.innerHTML = "<p>No files selected!</p>";
    }
}

$('#saveService').on('submit', function(e) {
    e.preventDefault();

    console.log($('#id_publicacion').val())

    let formData = new FormData(this);
    formData.append('id_publicacion', $('#id_publicacion').val());
    formData.append('txt_titulo1', $('#txt_titulo1').text());
    formData.append('txt_descripcion1', $('#txt_descripcion1').html());
    formData.append('txt_descripcion2', $('#txt_descripcion2').html());
    formData.append('txt_descripcion3', $('#txt_descripcion3').html());

    axios.post('updatePublicacion',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {

        setTimeout(() => {
            if (response.status == 200) {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )
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
<style>
::-webkit-file-upload-button {
    display: none;
}


.posicion_imagenes1 {
    text-align: center;
    margin-top: auto;
    position: absolute;
    right: 0;
    top: 37rem;
}

@media (max-width:767px) {
    .posicion_imagenes1 {
        text-align: center;
        margin-top: auto;
        position: inherit !important;
        right: 0;
        top: 37rem;
    }
}

.standard-messaging {
    /* letter-spacing: 1px; */
    /* padding: 10px 120px; */
    border: 6px dashed #e0e0e0;
    width: 211px;
    display: inline-grid;
    /* max-width: 80%;
  left: 10%;
  margin-bottom: 10px; */
}
</style>
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