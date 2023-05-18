@extends('admin.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$rowData_[0]->titulo}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$rowData_[0]->titulo}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->


    <section class="content">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Redacción de Texto
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <form id="saveServiceTerminos">
                {{ csrf_field() }}
                    <input type="hidden" name="id_terminos" value="{{$rowData_[0]->id_terminos}}"/>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="btn_sumit">GUARDAR</button>
                    </div>
                   
                    <div class="row">
                        <textarea id="summernoteTerminos" name="txt_terminos">{{$rowData_[0]->terminos}}</textarea>
                    </div>
                </form>


            </div>
        </div>
    </section>

</div>

@push('scripts')

<script>
//:::::::::::: CRUD SERVICIOS :::::::::::::::::::::::::::::
$(document).ready(function() {
    $('#summernoteTerminos').summernote({
        // height: 400, 
        // placeholder: 'techsolutionstuff.com',
        callbacks: {
            onImageUpload: function(image) {
                uploadImageTerminos(image[0]);
            }
        }
    });

    function uploadImageTerminos(image) {
        var formData = new FormData();
        formData.append("image", image);
        axios.post('/admin/general_imagen_terminos',
            formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
        ).then(function(response) {
            var image = $('<img>').attr('src', '/img/terminos/' + response.data);
            $('#summernoteTerminos').summernote("insertNode", image[0]);
        }).catch(function() {
            console.log('FAILURE!!');
        });
    }
});




$('#saveServiceTerminos').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    formData.append('txt_terminos', $("textarea[name=txt_terminos]").val())
    axios.post('/admin/terminos_guardar',
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
                    response.data.data,
                    'success'
                )
                $('#modalInfo').modal('hide')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.data.data,
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

</style>

@endsection