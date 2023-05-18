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
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$data_[0]->title1}}</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
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
                                    {{$data_[0]->title1 !=null ?$data_[0]->title1 :"Escriba un título" }}
                                </h1>
                            </span>
                            <label>Descripción <i class="fas fa-edit"></i></label>
                            <div class="row">
                                <div class="col-md-12">
                                    <p id="txt_descripcion" contenteditable="true" class="deletable"
                                        style="text-align: justify;">
                                        {!! $data_[0]->descripcion !=null ?$data_[0]->descripcion :"
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum
                                        has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown
                                        printer
                                        took a galley of type and scrambled it to make a type specimen book. It has
                                        survived not
                                        only
                                        five centuries, but also the leap into electronic typesetting, remaining
                                        essentially
                                        unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem
                                        Ipsum passages, and more recently with desktop publishing software like Aldus
                                        PageMaker
                                        including versions of Lorem Ipsum
                                        " !!}

                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <label><i class="fas fa-edit"></i></label>
                                    <p id="txt_descripcion2" contenteditable="true" class="deletable"
                                        style="text-align: justify;">
                                        {!! $data_[0]->descripcion2 !=null ?$data_[0]->descripcion2 :"
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum
                                        has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown
                                        printer
                                        took a galley of type and scrambled it to make a type specimen book. It has
                                        survived not
                                        only
                                        five centuries, but also the leap into electronic typesetting, remaining
                                        essentially
                                        unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem
                                        Ipsum passages, and more recently with desktop publishing software like Aldus
                                        PageMaker
                                        including versions of Lorem Ipsum
                                        " !!}

                                    </p>
                                </div>
                                <div class="col-md-3 posicion_imagenes1">
                                    <div class="standard-messaging">
                                        <input type="file" name="image1" id="image1" multiple accept="image/*"
                                            style="display:none" onchange="handleFiles(this.files)">
                                        <a href="#" id="fileSelect" class="helper center">

                                            <div id="fileList">
                                                <img src="{{$data_[0]->url_image1 !=null ?$data_[0]->url_image1 :'/img/mc_admin/perrito.jpg' }} "
                                                    style="width: 190px;" />
                                            </div>
                                            Cambie la Imagen (Formato
                                            .jpg, .png,
                                            .gif)
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label><i class="fas fa-edit"></i></label>
                                    <p id="txt_descripcion3" contenteditable="true" class="deletable"
                                        style="text-align: justify;">
                                        {!! $data_[0]->descripcion3 !=null ?$data_[0]->descripcion3 :"
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum
                                        has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown
                                        printer
                                        took a galley of type and scrambled it to make a type specimen book. It has
                                        survived not
                                        only
                                        five centuries, but also the leap into electronic typesetting, remaining
                                        essentially
                                        unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem
                                        Ipsum passages, and more recently with desktop publishing software like Aldus
                                        PageMaker
                                        including versions of Lorem Ipsum
                                        " !!}

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="modal-footer">
                            <button class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>

                </div>


            </form>

        </div>


    </section>
</div>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/plantilla.css') }}" />
<style>
.posicion_imagenes1 {
    text-align: center;
    margin-top: auto;
    /* position: absolute;
    right: 0;
    top: 37rem; */
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
</style>
@endsection
@push('scripts')
<script>
window.URL = window.URL || window.webkitURL;

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



$('#saveService').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    formData.append('txt_titulo1', $('#txt_titulo1').text());
    formData.append('txt_descripcion', $('#txt_descripcion').html());
    formData.append('txt_descripcion2', $('#txt_descripcion2').html());
    formData.append('txt_descripcion3', $('#txt_descripcion3').html());

    axios.post('admin_productos_naturales_update',
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