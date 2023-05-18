@extends('web.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Alianza del Dr Rath para la Salud</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
@endsection

<!-- Contenido en el Body -->
@section('content')

<section class="promo-section section section-on-bg" style="margin-bottom: 45px;">
    <!--//Menu de Opciones-->
    @include('web.partials.header.menu')
    <!--//Menu de Opciones-->
</section>

<!--team-section-->
<section class=" team-section clearfix">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="ttm-tabs tabs-style-01">

                    <div class="content-tab">
                        <!-- content-inner -->
                        <div class="row multi-columns-row ttm-boxes-spacing-15px isotope-project">

                            @if(count($web_publicaciones)!=0)
                            @foreach ($web_publicaciones as $values)
                            <div
                                class="ttm-box-col-wrapper col-lg-4 col-md-4 col-sm-6 {{ substr($values->descripcion,1)  }} anestheslology">
                                <div class="featured-imagebox featured-imagebox-portfolio ttm-portfolio-box-view1">
                                    <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                        <div class="featured-thumbnail">
                                            <a href="javascript:void(0)"
                                                onClick="webRedireccionA({{ $values->id_publicacion }})"> <img
                                                    class="img-fluid" src="{{ $values->url_image }}" alt="image"></a>
                                        </div>
                                        <div class="featured-iconbox ttm-media-link">
                                            <a class="ttm_prettyphoto ttm_image" title="Rehabilitation Center"
                                                data-rel="prettyPhoto" href="{{ $values->url_image }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                            <a href="javascript:void(0)"
                                                onClick="webRedireccionA({{ $values->id_publicacion }})"
                                                class="ttm_link"><i class="ti ti-link"></i></a>
                                        </div>
                                        <div class="ttm-box-view-content-inner">
                                            <div class="featured-content featured-content-portfolio">
                                                <div class="featured-title">
                                                    <h5><a href="javascript:void(0)"
                                                            onClick="webRedireccionA({{ $values->id_publicacion }})">{{ $values->titulo }}</a>
                                                    </h5>
                                                </div>
                                                <span class="category"
                                                    style="text-align: justify;">{{ $values->descripcion }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--team-section end-->



<!-- Modal Registrar Usuario  -->
<div class="modal fade" id="modalRegistrarFavorito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: unset !important;">
            <div class="alert" role="alert" style="display: flex;background: #535aa2;color: white;">
                @include('web.partials.header.ajax.icon_check')<label for=""
                    style="padding-left: 12px;font-size: 16px;color: white;">Registrar Usuario</label>
            </div>
            <div class="modal-body">

                <form id="submitRegistrar">

                    <div class="col-sm-12">

                        <div class="panel panel-default">

                            <div class="panel-body">

                                <div class="required"> <label for="txt_nombrex">Nombre y Apellido <sup>*</sup></label>
                                    <input type="text" style="border: 1px solid #535aa2;" class="text form-control"
                                        name="txt_nombrex" id="txt_nombrex" autocomplete="unInput" required>
                                </div>

                                <div style="margin-top: 5px;"> <label for="txt_emailx">Email <sup>*</sup></label>
                                    <input type="email" style="border: 1px solid #535aa2;" class="text form-control"
                                        name="txt_emailx" id="txt_emailx" autocomplete="off" required>
                                </div>

                                <div style="margin-top: 5px;"> <label for="txt_password">Contraseña <sup>*</sup></label>
                                    <input type="password" style="border: 1px solid #535aa2;" class="text form-control"
                                        name="txt_password" id="txt_password" autocomplete="new-password"
                                        placeholder="Contraseña de 9 caracteres" required>
                                </div>

                                <div style="margin-top: 5px;"> <label for="txt_telefono_movil">Teléfono móvil
                                        <sup>*</sup></label>
                                    <input type="text" style="border: 1px solid #535aa2;" class="text form-control"
                                        name="txt_telefono_movil" id="txt_telefono_movil" required>
                                </div>

                                <div style="margin-top: 15px;">
                                    <label for="invoice_address" style="display: flex;">
                                        <div style="margin-right: 10px;" id="uniform-invoice_address"><span>
                                                <input type="checkbox" name="txt_terminos" id="txt_terminos"
                                                    autocomplete="off" required></span>
                                        </div>
                                        <p><a href="javascript:void(0)" onclick="openModalTerminos()">Acepto la política
                                                de los terminos y condiciones</a></p>
                                    </label>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer" style="display: grid;">
                        <button type="submit" class="btn" id="btn_sumit"
                            style="background: #535aa2;color: white;">Registrar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<?php 
                    $Terminos =  DB::table('web_terminos')->where("id_terminos", 6)->get(); 
                ?>

<!-- Modal Terminos y Condiciones -->
<div class="modal fade" id="modalOpenTerminos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="rte">
                    {!! (count($Terminos)!=0?$Terminos[0]->terminos:'') !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
.featured-imagebox-portfolio.ttm-portfolio-box-view1 img {
    object-fit: contain;
    width: 100%;
    height: 22rem;
    transition: all 0.6s ease 0s;
}

.hs-responsive-embed-youtube {
    position: relative;
    padding-bottom: 56.25%;
    /* 16:9 Aspect Ratio */
    padding-top: 25px;
}

.hs-responsive-embed-youtube iframe {
    position: absolute;
    width: 100% !important;
    height: 100% !important;
}
</style>

@endsection

@section('footer_page')

@push('scripts')
<script>
function webRedireccionA(id_publicacion) {
    axios.get('/web_publicacion_link/' + id_publicacion).then(function(response) {
        if (response.data.state == "error") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: response.data.data,
            })
        } else if (response.data.state == "login") {
            $('#modalRegistrarFavorito').modal('show')
        } else {
            window.location = '/web_publicacion_link/' + id_publicacion
        }
    }).catch(function() {
        console.log('FAILURE!!');
    });
}



$('#submitRegistrar').on('submit', function(e) {
    e.preventDefault();

    const txt_nombre = $("input[name=txt_nombrex]").val();
    const txt_email = $("input[name=txt_emailx]").val();
    const txt_password = $("input[name=txt_password]").val();
    const txt_telefono_movil = $("input[name=txt_telefono_movil]").val();
    const txt_terminos = ($('#txt_terminos').is(":checked")) ? 1 : 0;

    const formData = new FormData(this);

    formData.append('txt_nombre', txt_nombre)
    formData.append('txt_email', txt_email)
    formData.append('txt_password', txt_password)
    formData.append('txt_telefono_movil', txt_telefono_movil)

    formData.append('txt_terminos_condiciciones', txt_terminos)

    axios.post('web_registe_user',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {

        if (response.data.state == "ok") {

            Swal.fire({
                icon: 'success',
                title: 'Good job!',
                text: response.data.data,
                confirmButtonText: 'ok',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {

                if (result.value) {
                    window.location.reload(1);
                }
            })

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: response.data.data,
            })
        }

    }).catch(function() {
        console.log('FAILURE!!');
    });

});

function openModalTerminos() {
    $('#modalOpenTerminos').modal(true)
}




$(".active_menu_2").addClass("active");
</script>
@endpush


@endsection