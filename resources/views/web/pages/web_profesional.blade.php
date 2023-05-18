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
                <!-- section-title -->
                <div class="section-title with-sep title-style-center_text">
                    <div class="title-desc">{!! $data_[0]->descripcion !!}</div>
                </div><!-- section-title end -->
            </div>
        </div><!-- row end -->

        <div class="container" style="text-align: center">
            <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-grey z-index-1">
                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="layer-content" style="background: #535aa2;margin-bottom: 45px;">
                    <!-- testimonial-box -->
                    <div class="pt-45 pl-50 pb-50 pr-50 res-991-pl-15 res-991-pr-15 res-991-pt-30">

                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                            Session::forget('success');
                            @endphp
                        </div>
                        @endif
                        <!-- section-title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h5>CONTÁCTENOS</h5>
                                <h2 class="title" style="color: white;">Contacto profesional</h2>
                            </div>
                        </div><!-- section-title end -->
                        <form id="ttm-contactform-2" class="ttm-contactform-2 wrap-form clearfix"
                            action="{{url('/enviar_email_informacion')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>
                                        <span class="text-input"><input name="txt_nombre" type="text"
                                                placeholder="Nombre" required="required"></span>
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        <span class="text-input"><input name="txt_email" type="text" placeholder="Email"
                                                required="required"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>
                                        <span class="text-input"><input name="txt_telefono" type="text"
                                                placeholder="Número de teléfono" required="required"></span>
                                    </label>
                                </div>

                            </div>
                            <label>
                                <span class="text-input"><textarea name="txt_descripcion" rows="3" placeholder="Observación"
                                        required="required"></textarea></span>
                            </label>
                            <button
                                class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                type="submit" style="background: #9796c9;">Enviar Mensaje</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
</section>
<!--team-section end-->

@endsection

@section('footer_page')
<script>
$(".active_menu_2").addClass("active");
</script>
@endsection