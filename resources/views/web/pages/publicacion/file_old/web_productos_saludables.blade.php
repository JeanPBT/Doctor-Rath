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
    </div>
</section>
<!--team-section end-->
<style >
    table.table-bordered >tbody>tr>td img{
        width: 290rem !important;
    }
    /* li:nth-child(2) {
  background: lightgreen;
} */
</style>
@endsection

@section('footer_page')
<script>
$(".active_menu_2").addClass("active");
</script>
@endsection