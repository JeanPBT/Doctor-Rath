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
        <!--blog-section-->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-8 m-auto">
                    <!-- section-title -->
                    <div class="section-title with-sep title-style-center_text" style="margin-bottom: unset;">
                        <div class="title-header">
                            <h5>Nuestras Actividades</h5>
                            <h2 class="title">{{$rowData_[0]->superior_titulo1}}</h2>
                        </div>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="container">
                @foreach($result as $key => $value)
                <div class="row" style="margin-top: 45px;">
                    <div class="col-sm-12 text-center">
                        <h3 class="title">{{ $key }}</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($value as $key_ => $value_)
                    <div class="ttm-box-col-wrapper col-lg-4">
                        <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post">
                            <div class="ttm-post-thumbnail featured-thumbnail">
                                <a href="/viewServicioInfo/{{ $value_['id_descripcion'] }}">
                                    <img class="img-fluid" src="{{ $value_['url_image'] }}" alt="image">
                                </a>
                            </div>
                            <div class="featured-content featured-content-post">
                                <div class="post-meta">
                                    <span class="ttm-meta-line"><i class="fa fa-user"></i>Admin</span>
                                    <span class="ttm-meta-line"><i
                                            class="fa fa-calendar"></i>{{ $value_["updated_at"] }}</span>
                                </div>
                                <div class="post-title featured-title">
                                    <h5><a href="/viewServicioInfo/{{ $value_['id_descripcion'] }}">{{ $value_["title"] }}</a></h5>
                                </div>
                                <div class="post-desc featured-desc">
                                    <p>{{ $value_["descripcion"] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-30 res-991-mt-30 text-center">
                        <strong>No lo dude, contáctenos para una mejor ayuda </strong>
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