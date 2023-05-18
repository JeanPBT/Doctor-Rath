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
                        <li class="breadcrumb-item active">Nuestro Blog</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content" style="text-align: -webkit-right;">
        <div class="col-2">
            <a href="javascript:void(0)" onclick="openModalCrud(false,'CREAR')"
                class="btn btn-block bg-gradient-success"><i class="far fa-plus-square"></i> Crear</a>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div id="msj_alert__"></div>
                <div class="col-12">
                    <div class="row" style="text-align: center;display: initial;">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Blog</h3>
                            </div>
                            <div class="card-body" id="dataProducto"></div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Modal de CRUD-->
    <div class="modal fade" id="modalOpen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">BLOG</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body">
                                <form id="uploadForm">
                                    <input type="hidden" name="id_producto" />
                                    <input type="hidden" name="isValues" />

                                    {{ csrf_field() }}
                                    <h4 class="my-3">Título del Blog</h4>
                                    <div class="row" style="justify-content: center;">
                                        <input type="text" class="form-control" name="txt_pro_name"
                                            placeholder="Título del blog" required>
                                    </div>

                                    <div class="row">
                                        <h4 class="my-3">Descripción del Blog</h4>

                                        <textarea id="txt_descripcion" name="txt_descripcion"></textarea>

                                        <!-- <p id="txt_descripcion" name="txt_descripcion" contenteditable="true"
                                                class="deletable" style="text-align: justify;border: 15px solid #bfbfbf;overflow-y: scroll;height: 33vw;"></p> -->
                                        <hr>

                                    </div>

                                    <div class="row" style="justify-content: center;">
                                        <div class="col-6">
                                            <label for="file0">
                                                <img id="blah_0" src="/img/mc_admin/btn_agregar_principal.jpg"
                                                    class="product-image" alt="Blog Image" style="border: solid 1px;">
                                            </label>
                                            <input id="file0" type="file" name="image0" />
                                        </div>
                                        <div class="col-12" style="margin-bottom: 15px;">
                                            Convierte tus imagenes en JPG para que sean mas livianos: <a target="_blank"
                                                href="https://png2jpg.com/" style="color: blue;">Link</a>
                                        </div>
                                    </div>


                                    <div class="row" style="justify-content: center;">
                                        <button class="btn btn-primary btn-lg btn-flat" id="btn_sumit"><i
                                                class="fas fa-save fa-lg mr-2"></i> GUARDAR</button>
                                        <button class="btn btn-default btn-lg btn-flat" type="button"
                                            data-dismiss="modal"><i class="fas fa-times-circle fa-lg mr-2"></i>
                                            CERRAR</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script src='https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/6/tinymce.min.js'></script>

<script>
// https://stackoverflow.com/questions/39001561/how-to-get-tinymce-content-in-jquery

//:::::::::::: CRUD PRODUCTOS :::::::::::::::::::::::::::::
function listarDataTable(id_categoria) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'admin_blog_listar',
        data: "id_categoria=" + id_categoria,
        success: function(response) {
            $('#dataProducto').html(response);
        }
    });
}


listarDataTable(0)

$('select[name=txt_id_cat]').on('change click', function() {
    const id_servicio = $('select[name=txt_id_cat]').val();
    listarDataTable(id_servicio)
});

//===========CREAR, ACTUALIZAR Y ELIMINAR
$('#uploadForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    formData.append('txt_descripcion', tinymce.get("txt_descripcion").getContent())
    axios.post('admin_blog_crear',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {

        console.log(response)

        $('#modalOpen').modal('hide')

        if (response.data.state == "error") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
        } else {
            Swal.fire(
                'Good job!',
                response.data.data,
                'success'
            )



            listarDataTable($('select[name=txt_id_cat]').val())
            $("input[name=image]").val(null);
            $("input[name=image]").val("");


        }

    }).catch(function() {
        console.log('FAILURE!!');
    });

});


function openModalCrud(id_producto, isValues) {
    // CASO CLICK MODAL, ELIMINAR
    if (isValues == "ELIMINAR") {
        if (confirm('Esta seguro de Eliminar?')) {

            let formData = new FormData();
            formData.append('id_producto', id_producto)
            formData.append('isValues', isValues)
            axios.post('admin_blog_crear',
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
                        response.data.data,
                        'success'
                    )

                    listarDataTable($('select[name=txt_id_cat]').val())
                }

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }

    } else {
        // CASO CLICK MODAL, EDITAR
        $('#modalOpen').modal('show')
        $('input[name=id_producto]').val(id_producto)
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR


        if (isValues == 'CREAR') {

            //LIMPIAR
            $('input[name=txt_pro_name]').val("");
            tinyMCE.activeEditor.setContent("");
            // $('textarea[name=txt_descripcion]').val("");
            $('img[id=blah_0]').attr('src', "/img/mc_admin/btn_agregar_principal.jpg");

        }
        // CASO , SI ES FALSO => ES EDITAR
        if (id_producto) {
            $("input[name=image0]").val(null);
            let formData = new FormData();
            formData.append('id_producto', id_producto)

            axios.post('admin_blog_editar',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {

                if (response.data[0]) {

                    if (response.data[0])
                        $('img[id=blah_0]').attr('src', response.data[0].url_image);
                    $('input[name=txt_pro_name]').val(response.data[0].name_color);
                    // $('#txt_descripcion').html((response.data[0].description != null) ? response.data[0]
                    //     .description : 'Escribe el contenido..!!!');
                    tinyMCE.activeEditor.setContent(response.data[0].description);
                }


            }).catch(function() {
                console.log('FAILURE!!');
            });
        }
    }
}
//====================DF======================================

tinymce.init({
    selector: 'textarea#txt_descripcion',
    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks| insertfile image media template link anchor codesample  | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,

    importcss_append: true,

    templates: [{
            title: 'New Table',
            description: 'creates a new table',
            content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
        },
        {
            title: 'Starting my story',
            description: 'A cure for writers block',
            content: 'Once upon a time...'
        },
        {
            title: 'New list with dates',
            description: 'New List with dates',
            content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
        }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 520,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: 'sliding',
    contextmenu: "link image imagetools table",

    //============================= add

    // images_upload_url: '/admin/admin_blog_img_upload',
    // file_picker_types: "image",
    // images_upload_credentials: true,

    image_title: true,
    relative_urls: false,
    // images_upload_base_path: '/some/basepath',
    automatic_uploads: true,
    paste_data_images: true,

    file_picker_callback: function(cb, value, meta) {
        var input = document.createElement("input");
        input.setAttribute("type", "file");
        input.setAttribute("accept", "image/*");
        input.onchange = function() {
            var file = this.files[0];

            console.log(file)

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function() {
                var id = "blobid" + new Date().getTime();
                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(",")[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), {
                    title: file.name
                });
            };
        };
        input.click();
    },

    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'

});

</script>

<script src="{{asset('template_admin/js/composicion_oferta_files.js')}}"></script>

@endpush

<style type="text/css">
/* https://stackoverflow.com/questions/50038470/tinymce-shows-error-in-the-editor */
/* one way */
.tox-notifications-container {
    visibility: hidden;
}

/* another way */
.tox-notifications-container {
    display: none;
}


.alert {
    text-align: center;
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



input[type='file'] {
    display: none;
}



/* ::::::::::::::::::: RADIO BUTTOM :::::::::::::::: */
/* First hide radios */
.questions input[type="radio"] {
    display: none;
}

/* Generate new radio buttons, which we can style via css */
.questions label:before {
    content: attr(data-question-number);
    display: inline-block;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1px solid;
    text-align: center;
    line-height: 30px;
    margin-right: 20px;
}

/* Applying styles when checking the buttons */
.questions input[type="radio"]:checked~label {
    background-color: var(--color-blue-grayed);
    border-color: var(--color-blue);
}

.questions input[type="radio"]:checked~label:before {
    background-color: var(--color-blue);
    border-color: var(--color-blue);
    color: #ff00bc;
}

.questions label {
    display: block;
    cursor: pointer;

    padding: 10px;
    margin-bottom: 10px;
    background-color: white;
    border: 2px solid white;
    border-radius: 15px;
}

.questions {
    /* background-color: gray; */
    padding: 10px;
    display: flex;
}


.select2-container {
    display: unset !important;
}
</style>
@endsection