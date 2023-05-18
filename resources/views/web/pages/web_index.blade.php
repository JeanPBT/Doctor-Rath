@extends('web.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Alianza del Dr Rath para la Salud</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<!-- <link rel="stylesheet" href="{{ URL::asset('template_web/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css') }}"> -->

@endsection

<!-- Contenido en el Body -->
@section('content')


<!--page start-->
<div class="page" style="z-index: unset;">

    <!-- preloader start -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- preloader end -->


    <!--//Menu de Opciones-->
    @include('web.partials.header.menu')
    <!--//Menu de Opciones-->

    <div id="rev_slider_5_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container slide-overlay"
        data-alias="classic4export" data-source="gallery">
        <!-- START REVOLUTION SLIDER -->
        <div id="rev_slider_5_1" class="rev_slider fullwidthabanner" data-version="5.4.8">
            <ul>
                <!-- SLIDE  1-->
                <li data-index="rs-6" data-transition="slotzoom-horizontal" data-slotamount="1" data-easein="default"
                    data-easeout="default" data-masterspeed="15" data-rotate="0" data-saveperformance="off"
                    data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                    data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">

                    <!-- MAIN IMAGE: data-bgfit="cover"-->

                    <img src="{{ $slider[0]->url_image }}" alt="" data-bgposition="center center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme" id="slide-6-layer-2" data-x="['left','left','left','left']"
                        data-hoffset="['50','40','30','20']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['-28','-28','-38','-18']" data-fontsize="['65','65','60','44']"
                        data-lineheight="['70','70','65','44']" data-fontweight="['700','700','700','700']"
                        data-color="#031b4e" data-width="none" data-height="none" data-whitespace="nowrap"
                        data-transform_idle="o:1;" data-transform_in="y:-50px;opacity:0;s:1000;e:Power2.easeOut;"
                        data-transform_out="opacity:0;s:1000;e:Power4.easeIn;" data-start="800"
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-type="text" data-responsive_offset="on" style="z-index:13;font-family:Poppins,sans-serif;">
                        {{ $slider[0]->title1 }}
                    </div>
                </li>

                <!-- SLIDE  2-->
                <li data-index="rs-7" data-transition="slotzoom-horizontal" data-slotamount="1" data-easein="default"
                    data-easeout="default" data-masterspeed="15" data-rotate="0" data-saveperformance="off"
                    data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                    data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">

                    <!-- MAIN IMAGE -->
                    <img src="{{ $slider[1]->url_image }}" alt="" data-bgposition="center center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption tp-resizeme" id="slide-7-layer-1" data-x="['left','left','left','left']"
                        data-hoffset="['50','40','30','20']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['-120','-120','-125','-61']" data-fontsize="['65','65','60','41']"
                        data-lineheight="['70','70','65','41']" data-fontweight="['700','700','700','700']"
                        data-color="#031b4e" data-width="none" data-height="none" data-whitespace="nowrap"
                        data-transform_idle="o:1;" data-transform_in="y:-50px;opacity:0;s:1000;e:Power2.easeOut;"
                        data-transform_out="opacity:0;s:1000;e:Power4.easeIn;" data-start="800"
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-type="text" data-responsive_offset="on" style="z-index:13;font-family:Poppins,sans-serif;">
                        {{ $slider[1]->title1 }}
                    </div>

                </li>



            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>


    </div>

    <!-- END REVOLUTION SLIDER -->

    <?php  
       $noticiaData =  DB::table('web_noticia')->orderBy('id', 'desc')->first();
    ?>
    


    <!--site-main start-->
    <div class="site-main">

        <section class="introduction-section clearfix">
            <div class="container" style="margin-top: 45px;">
                <div class="hs-responsive-embed-youtube"><iframe
                        src="https://www.youtube.com/embed/jIGWVxNs-os?rel=0&amp;showinfo=0" height="515"
                        frameborder="0" allowfullscreen=""></iframe></div>
            </div>
        </section>

        <!--BIENVENIDOS -->
        <section class="introduction-section clearfix">
            <div class="container" style="margin-top: 45px;">
                <div class="row no-gutters">
                    <div class="col-xl-6 col-lg-5 col-xs-12">
                        <div class="ttm_single_image-wrapper mb-30">
                            <img class="img-fluid" src="{{$bienvenidos[0]->url_image}}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-xs-12" style="padding-left: 45px;margin-bottom: 45px;">
                        <div class="pt-5 res-991-pt-0">

                            <div class="section-title">
                                <div class="title-header">
                                    <h2 class="title">{{$bienvenidos[0]->title1}}</h2>
                                </div>
                                <div class="title-desc">{{$bienvenidos[0]->descripcion}}</div>
                            </div>

                            <div class="featuredbox-number">

                                <div class="featured-icon-box icon-align-before-content style2">
                                    <div class="featured-icon">
                                        <div
                                            class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-grey ttm-icon_element-size-sm ttm-icon_element-style-rounded">
                                            <i class="ttm-num ti-info"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h5><a href="/web_noticia/1" >Noticias </a>
                                            </h5>
                                        </div> <p> </p>
                                        <div class="featured-desc">
                                           <p>{!! mb_strimwidth($noticiaData->descripcion, 0, 200, "...") !!}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="featured-icon-box icon-align-before-content style2">
                                    <div class="featured-icon">
                                        <div
                                            class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-grey ttm-icon_element-size-sm ttm-icon_element-style-rounded">
                                            <i class="ttm-num ti-info"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h5><a href="#" data-filter="/opcion_socio">{{$bienvenidos[2]->title1}}</a>
                                            </h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p>{{$bienvenidos[2]->descripcion}}</p>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="featured-icon-box icon-align-before-content style2">
                                    <div class="featured-icon">
                                        <div
                                            class="ttm-icon ttm-icon_element-fill ttm-icon_element-color-grey ttm-icon_element-size-sm ttm-icon_element-style-rounded">
                                            <i class="ttm-num ti-info"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h5><a href="#"
                                                    data-filter="/opcion_educativa">{{$bienvenidos[3]->title1}}</a>
                                            </h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p>{{$bienvenidos[3]->descripcion}}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div><!-- row end -->

            </div>
        </section>
        <!--introduction-section end-->





        <!--features-section-->
        <section
            class="ttm-row features-section ttm-bgcolor-skincolor bg-img4 ttm-bg ttm-bgimage-yes z-index-1 clearfix">
            <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <!-- section-title -->
                        <div class="section-title with-sep title-style-center_text">
                            <div class="title-header">
                                <h5 style="margin-top: 45px;font-size: 25px;">Nuestros Cursos</h5>
                            </div><!-- section-title end -->
                        </div>
                    </div><!-- row end -->

                    <!-- row -->
                    <div class="row">

                        @if(count($nuestras_actividades)!=0)
                        @foreach ($nuestras_actividades as $values)

                        <div class="col-lg-4">
                            <!-- featured-imagebox -->
                            <div class="featured-icon-box icon-align-top-content text-center style2 "
                                style="padding: 2px 30px 60px !important;">
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5><a
                                                href="linkActividad/{{ $values->id_actividad }}">{{ $values->titulo }}</a>
                                        </h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>{{ $values->descripcion }}</p>
                                    </div>
                                </div>
                                <div class="ttm-di_links">
                                    <a href="linkActividad/{{ $values->id_actividad }}" class="di_link">
                                        <i class="ti ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div><!-- featured-imagebox end-->
                        </div>
                        @endforeach
                        @endif

                    </div><!-- row end -->
                </div>
        </section>
        <!--features-section end-->



        <!--portfolio-section-->
        <section class="ttm-row portfolio-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-10 m-auto">
                        <!-- section-title -->
                        <div class="section-title with-sep title-style-center_text">
                            <div class="title-header">
                                <h2 class="title">Nuestras publicaciones</h2>
                            </div>

                        </div><!-- section-title end -->
                    </div>
                </div><!-- row end -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ttm-tabs tabs-style-01">
                            <ul class="tabs d-md-flex portfolio-filter">
                                <li class="tab active"><a href="#" data-filter="*">Todos</a></li>
                                @if(count($nuestro_estudio_categoria)!=0)
                                @foreach ($nuestro_estudio_categoria as $values)
                                <li class="tab"><a href="#"
                                        data-filter="{{ $values->descripciones }}">{{$values->nombre  }}</a></li>
                                @endforeach
                                @endif
                            </ul>
                            <div class="content-tab">
                                <!-- content-inner -->
                                <div class="row multi-columns-row ttm-boxes-spacing-15px isotope-project">

                                    @if(count($nuestro_estudio)!=0)
                                    @foreach ($nuestro_estudio as $values)
                                    <div
                                        class="ttm-box-col-wrapper col-lg-4 col-md-4 col-sm-6 {{ substr($values->descripciones,1)  }} anestheslology">
                                        <div
                                            class="featured-imagebox featured-imagebox-portfolio ttm-portfolio-box-view1">
                                            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                                <div class="featured-thumbnail">
                                                    <a href="javascript:void(0)"
                                                        onClick="webRedireccionA({{ $values->id_estudio }})"> <img
                                                            class="img-fluid" src="{{ $values->url_image }}"
                                                            alt="image"></a>
                                                </div>
                                                <div class="featured-iconbox ttm-media-link">
                                                    <a class="ttm_prettyphoto ttm_image" title="Rehabilitation Center"
                                                        data-rel="prettyPhoto" href="{{ $values->url_image }}">
                                                        <i class="fa fa-expand"></i>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                        onClick="webRedireccionA({{ $values->id_estudio }})"
                                                        class="ttm_link"><i class="ti ti-link"></i></a>
                                                </div>
                                                <div class="ttm-box-view-content-inner">
                                                    <div class="featured-content featured-content-portfolio">
                                                        <div class="featured-title">
                                                            <h5><a href="javascript:void(0)"
                                                                    onClick="webRedireccionA({{ $values->id_estudio }})">{{ $values->titulo }}</a>
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
        <!--portfolio-section-->

        <!--testimonial-section-->
        <section
            class="ttm-row testimonial-section ttm-bgcolor-skincolor bg-img6 ttm-bg ttm-bgimage-yes clearfix mb-100">
            <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-10 m-auto">
                        <!-- section-title -->
                        <div class="section-title with-sep title-style-center_text">
                            <div class="title-header">
                                <!-- row -->
                                <div class="row">
                                    <div class="col-lg-12 m-auto">

                                        <div class="section-title with-sep title-style-center_text">
                                            {!! $ventajas[0]->descripcion !!}
                                        </div>







                                        <div class="section-title">
                                            <div class="title-header">
                                                <h5>Apuntate como Socio</h5>
                                            </div>
                                        </div>

                                        <form id="ttm-contactform-2" class="ttm-contactform-2 wrap-form clearfix"  action="#" method="post">
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
                                                                placeholder="Teléfono fijo" required="required"></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>
                                                        <span class="text-input"><input name="txt_asunto" type="text"
                                                                placeholder="Teléfono movil" required="required"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>
                                                        <span class="text-input"><input name="txt_telefono" type="text"
                                                                placeholder="Dirección" required="required"></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>
                                                        <span class="text-input"><select name="txt_id_servicio" style="height: 49px;">
                                                                <option value=""> Seleccione Provincia </option>
                                                            </select>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <label>
                                                <span class="text-input"><textarea name="txt_descripcion" rows="3"
                                                        placeholder="Observación" required="required"></textarea></span>
                                            </label>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>
                                                        <span class="text-input"><select name="txt_id_servicio" style="height: 49px;">
                                                                <option value=""> Seleccione Modo de Pago </option>
                                                            </select>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>
                                                        <span class="text-input"><input name="txt_telefono" type="text"
                                                                placeholder="Clave de Ingreso" required="required"></span>
                                                    </label>
                                                </div>
                                            </div>


                                            <button
                                                class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor"
                                                type="submit" style="background: #212529;">Enviar Mensaje</button>
                                        </form>











                                    </div>
                                </div><!-- row end -->
                            </div>
                        </div><!-- section-title end -->
                    </div>
                </div><!-- row end -->

            </div>
        </section>
        <!--testimonial-section-->

        <!-- cta-info-section -->
        <section class="ttm-row cta-info-section ttm-bgcolor-grey bg-layer bg-layer-equal-height clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-sm-8">
                        <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-skincolor z-index-2 spacing-5"
                            style="margin-top: auto !important;">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content">

                                <?php $data = DB::table('web_footer as md')->where('md.id_footer',1)->get();?>

                                <div class="pb-15">
                                    <h4>Comunícate</h4>
                                    <p> Si quieres contactar con nosotros, rellena el formulario y te atenderemos sin
                                        compromiso alguno.</p>
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
                                            <h2 class="title" style="color: #535aa2;">No dude en preguntar Envíe su
                                                mensaje.</h2>
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

    </div>
    <!--site-main end-->




    <!-- <div class="first-footer ttm-bgcolor-skincolor">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 widget-area">
                    <div class="featured-icon-box icon-align-before-content style1">
                        <div class="featured-icon">
                            <div
                                class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-lg">
                                <i class="flaticon-mail"></i>
                            </div>
                        </div>

                        <div class="featured-content">
                            <div class="featured-title">
                                <h5>Publica lo que piensas</h5>
                            </div>
                            <div class="featured-desc">
                                <p>Stay in touch with us to get latest news and discount coupons</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 widget-area">
                    <form id="subscribe-form" class="newsletter-form" method="post" action="#" data-mailchimp="true">
                        <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                            <p><input type="email" name="email" placeholder="Ingresa tu Email ..." required=""></p>
                            <p><button
                                    class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-grey"
                                    type="submit">Subscribete Ahora!</button></p>
                        </div>
                        <div id="subscribe-msg"></div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <div class="second-footer">
        <div class="container">
            <div class="row">
                <div class="widget-area col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <aside class="widget widget-text">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box icon-align-before-content">
                            <div class="featured-icon">
                                <div
                                    class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                    <i class="flaticon-placeholder"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>Dirección</h5>
                                </div>
                                <div class="featured-desc">
                                    <p>{{ $data[0]->direccion }}</p>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </aside>
                </div>
                <div class="widget-area col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <aside class="widget widget-text">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box icon-align-before-content">
                            <div class="featured-icon">
                                <div
                                    class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>Llámanos al</h5>
                                </div>
                                <div class="featured-desc">
                                    <p>{{ $data[0]->telefono }}</p>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </aside>
                </div>
                <div class="widget-area col-xs-12 col-sm-12 col-md-3 col-lg-4">
                    <aside class="widget widget-text">
                        <!--featured-icon-box-->
                        <div class="featured-icon-box icon-align-before-content">
                            <div class="featured-icon">
                                <div
                                    class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-sm">
                                    <i class="flaticon-email"></i>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h5>Envíanos un correo electrónico</h5>
                                </div>
                                <div class="featured-desc">
                                    <p><a href="mailto:{{ $data[0]->web }}">{{ $data[0]->email }}</a></p>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end-->
                    </aside>
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

    @push('scripts')
    <script>
    // :::::::::::::::::::::::::::::: REGISTRAR LOGIN  ::::::::::::::::::::::::::::::::::::::::
    function webRedireccionA(id_estudio) {
        axios.get('linkActividad/' + id_estudio).then(function(response) {
            if (response.data.state == "error") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.data.data,
                })
            } else if (response.data.state == "login") {
                $('#modalRegistrarFavorito').modal('show')
            } else {
                window.location = 'linkActividad/' + id_estudio
            }
        }).catch(function() {
            console.log('FAILURE!!');
        });
    }
    </script>
    @endpush



    @section('footer_page')
    <script>
    $(".active_menu_1").addClass("active");
    </script>
    @endsection