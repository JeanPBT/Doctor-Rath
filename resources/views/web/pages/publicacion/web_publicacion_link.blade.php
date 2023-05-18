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

        <div class="row">
            <div class="col-lg-12">

                <div class="section-title with-sep title-style-center_text">
                    <div class="title-desc">
                        <div style="text-align: left;">
                            <h2 class="title">{{ $data_[0]->title1 }}</h2>
                        </div>
                        <div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="text-align: justify;">
                                        {!! $data_[0]->descripcion1 !!}
                                    </p>
                                </div>
                                <div class="col-md-9">
                                    <p style="text-align: justify;">
                                        {!! $data_[0]->descripcion2 !!}
                                    </p>
                                </div>

                                <div class="col-md-12">
                                    <p style="text-align: justify;">
                                        {!! $data_[0]->descripcion3 !!}
                                    </p>
                                </div>

                                <div class="col-md-12">
                                    <img
                                        src="{{$data_[0]->url_image1 !=null ?$data_[0]->url_image1 :'/img/mc_admin/perrito.jpg' }}" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="margin-bottom:45px;text-align: center;">
                    <div class="">
                        <a href="{{$data_[0]->url_pdf !=null ?$data_[0]->url_pdf :'#' }}" target="_blank" id="" class="btn btn-danger">Descargar Artículo PDF</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--team-section end-->
<style>
</style>
@endsection

@section('footer_page')
<script>
$(".active_menu_2").addClass("active");
</script>
@endsection