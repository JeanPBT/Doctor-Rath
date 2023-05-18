@extends('web.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Mundo Mini</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<style type="text/css">
p {
    font-size: 18px;
}
</style>
@endsection

<!-- Contenido en el Body -->
@section('content')

<section class="promo-section section section-on-bg" style="margin-bottom: 45px;">
    <!--//Menu de Opciones-->
    @include('web.partials.header.menu')
    <!--//Menu de Opciones-->
</section>

        <!-- cta-info-section -->
        <section class="ttm-row cta-info-section ttm-bgcolor-grey bg-layer bg-layer-equal-height clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-sm-8">
                        <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-skincolor z-index-2 spacing-5" style="margin-top: auto !important;">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content"  >

                                <?php $data = DB::table('web_footer as md')->where('md.id_footer',1)->get();?>

                                <div class="pb-15">
                                    <h4>Comunícate</h4>
                                    <p> Si desea contactar con nosotros, rellene el formulario que ponemos a su
                                        disposición, le atenderemos gustosamente sin ningún tipo de compromiso.</p>
                                </div>
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                    <div class="featured-icon">
                                        <div
                                            class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-sm">
                                            <i class="flaticon-placeholder"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-desc">
                                            <p>{{ $data[0]->direccion }}</p>
                                        </div>
                                    </div>
                                </div><!-- featured-icon-box end-->
                                <div class="sep_holder_box width-100 mt-20 mb-20">
                                    <span class="sep_holder"><span class="sep_line"></span></span>
                                </div>
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                    <div class="featured-icon">
                                        <div
                                            class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-sm">
                                            <i class="flaticon-call"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-desc">
                                            <p>{{ $data[0]->telefono }}</p>
                                        </div>
                                    </div>
                                </div><!-- featured-icon-box end-->
                                <div class="sep_holder_box width-100 mt-20 mb-20">
                                    <span class="sep_holder"><span class="sep_line"></span></span>
                                </div>
                                <!--featured-icon-box-->
                                <div class="featured-icon-box icon-align-before-content icon-ver_align-top">
                                    <div class="featured-icon">
                                        <div
                                            class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-white ttm-icon_element-size-sm">
                                            <i class="flaticon-email"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-desc">
                                            <a href="#!">{{ $data[0]->email }}</a>
                                        </div>
                                    </div>
                                </div><!-- featured-icon-box end-->
                                <ul class="social-icons circle social-hover mt-30">
                                    <li class="social-facebook"><a class="tooltip-top" target="_blank"
                                            href="{{ $data[0]->red_social_facebook }}" data-tooltip="Facebook"><i
                                                class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li class="social-twitter"><a class="tooltip-top" target="_blank"
                                            href="{{ $data[0]->red_social_instagram }}" data-tooltip="Twitter"><i
                                                class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="social-gplus"><a class=" tooltip-top" target="_blank"
                                            href="{{ $data[0]->red_social_tweter }}" data-tooltip="Google+"><i
                                                class="fa fa-google-plus" aria-hidden="true"></i></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-grey z-index-1">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content" style="background: #535aa25c;">
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
                                            <h2 class="title" style="color: #535aa2;">No dude en preguntar Envíe su mensaje.</h2>
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
                                                    <span class="text-input"><input name="txt_email" type="text"
                                                            placeholder="Email" required="required"></span>
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
                                            <div class="col-lg-6">
                                                <label>
                                                    <span class="text-input"><input name="txt_asunto" type="text"
                                                            placeholder="Asunto" required="required"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <label>
                                            <span class="text-input"><textarea name="txt_descripcion" rows="3"
                                                    placeholder="Mensaje" required="required"></textarea></span>
                                        </label>
                                        <button
                                            class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                            type="submit">Enviar Mensaje</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta-info-section end -->

<!--google_map-->
<div id="google_map" class="google_map">
    <div class="map_container">
    <iframe src="{{ $data[0]->map_url }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

@endsection

@section('footer_page')
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
<!-- Javascript end-->
<script>
$(".active_menu_5").addClass("active");
</script>
@endsection