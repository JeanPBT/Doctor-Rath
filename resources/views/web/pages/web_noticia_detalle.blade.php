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
    @include('web.partials.header.menu')
</section>

<div class="site-main">

    <div class="ttm-row sidebar ttm-sidebar-right ttm-bgcolor-white clearfix">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 content-area">
                    <article class="post  clearfix">
                        @if($dataRows[0]->url_image)
                        <div class="ttm-post-featured-wrapper ttm-featured-wrapper ttm-blog-classic">
                            <div class="ttm-post-featured">
                                <img class="img-fluid" src="{{ $dataRows[0]->url_image }}" alt="">
                            </div>
                        </div>
                        @endif

                        <div class="ttm-blog-classic-content">

                            <div class="ttm-post-entry-header">
                                <div class="post-meta">
                                    <span class="ttm-meta-line byline"><i class="fa fa-user"></i>Admin</span>
                                    <span class="ttm-meta-line entry-date"><i class="fa fa-calendar"></i><time
                                            class="entry-date published">{{ date("D, d M Y", strtotime($dataRows[0]->created_at)) }}</time></span>
                                </div>
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="#">{{ $dataRows[0]->nombre }}</a></h2>
                                </header>
                            </div>

                            <div class="entry-content" style="text-align: justify;">
                                <div class="ttm-box-desc-text">
                                    <p>{!! $dataRows[0]->descripcion !!}</p>
                                </div>
                            </div>
                        </div>
                    </article>

                </div>
                <div class="col-lg-4 widget-area sidebar-right">
                    <?php  
                        $dataRows = DB::select(" SELECT  COUNT(id) as id, DATE_FORMAT(created_at, '%Y %M ') as created_at FROM web_noticia GROUP BY DATE_FORMAT(created_at, '%Y %M ') desc");
                    ?>
                    <aside class="widget widget-archive with-title">
                        <h3 class="widget-title">Noticias</h3>
                        <ul>
                            @foreach ($dataRows as $rows)
                            <li><a href="#">{{$rows->created_at}} ({{$rows->id}})</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
.myIframe {
    position: relative;
    padding-bottom: 65.25%;
    padding-top: 30px;
    height: 0;
    overflow: auto;
    -webkit-overflow-scrolling: touch;
}

.myIframe iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>

@endsection

@section('footer_page')
<script>
$(".active_menu_2").addClass("active");
</script>
@endsection