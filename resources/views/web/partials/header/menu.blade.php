        <!--header start-->
        <header id="masthead" class="header ttm-header-style-01">
            <?php $data = DB::table('web_footer as md')->where('md.id_footer',1)->get();?>
            <?php 
                  function siteURL() {
                  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || 
                      $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                  $domainName = $_SERVER['HTTP_HOST'];
                  return $protocol.$domainName;
                  }
              ?>

            <!-- top_bar -->
            <div class="top_bar ttm-bgcolor-skincolor clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 d-flex flex-row align-items-center">

                            <!-- menu -->
                            <nav class="main-menu menu-mobile" id="menu">
                                <ul class="menu">
                                    <li class="mega-menu-item ">
                                        <a href="/" class="mega-menu-link">Inicio</a>
                                    </li>
                                    <li class="mega-menu-item ">
                                        <a href="/web_quienes_somos" class="mega-menu-link">Quiénes Somos</a>
                                    </li>
                                    <li class="mega-menu-item ">
                                        <a href="/web_quehacemos" class="mega-menu-link">Qué hacemos</a>
                                    </li>
                                    <li class="mega-menu-item ">
                                        <a href="/web_medicinacelular" class="mega-menu-link">Medicina Celular</a>
                                    </li>
                                    <li class="mega-menu-item ">
                                        <a href="/web_contacto" class="mega-menu-link">Contacto</a>
                                    </li>
                                </ul>
                            </nav>

                            <div class="top_bar_contact_item" style="margin-left: 20%;">
                                <div class="top_bar_social">
                                    <ul class="social-icons">
                                        <li><a class="tooltip-bottom" target="_blank"  href="{{ $data[0]->red_social_instagram }}"
                                                data-tooltip="instagram" tabindex="-1"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li><a class="tooltip-bottom" target="_blank" href="{{ $data[0]->red_social_youtobe }}"
                                                data-tooltip="youtube" tabindex="-1"><i class="fa fa-youtube"></i></a>
                                        </li>

                                        <?php if (Auth::check()) { ?>
                                        <li class="mega-menu-item " style="margin-left: 15px;margin-right: 5px;">
                                            <a href="/logout" class="tooltip-bottom" data-tooltip="Cerrar Session" style="color: white !important;"><i class="fa fa-close" style="margin-right: 5px;"></i>Cerrar Session</a>
   
                                        </li>
                                        <li>
                                            <a class="tooltip-bottom"  href="/admin/index"  data-tooltip="Administrador" style="color: white !important;" tabindex="-1"><i class="fa fa-user" style="margin-right: 5px;"></i>Panel</a>
                                        </li>
                                        <?php } else { ?>
                                        <li class="mega-menu-item " style="margin-left: 15px;">
                                            <a href="/admin/index" class="tooltip-bottom" data-tooltip="Login"
                                                style="color: white !important;"><i class="fa fa-user"
                                                    style="margin-right: 5px;"></i>Login</a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- top_bar end-->
            <!-- site-header-menu -->
            <div id="site-header-menu" class="site-header-menu ttm-bgcolor-white">
                <div class="site-header-menu-inner ttm-stickable-header">
                    <div class="">
                        <div class="">
                            <div class="col">
                                <!--site-navigation -->
                                <div class="site-navigation d-flex flex-row">
                                   
                                    <div class="site-branding mr-auto">
                                        <a class="home-link" href="/" title="Alianza del Dr Rath para la Salud" rel="home">
                                            <img id="logo-img" class="img-center" src="{{$data[0]->url_image}}" alt="logo-img" style="margin-bottom: 15px;">
                                        </a>
                                    </div>
                                    <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                        <span class="menubar-box">
                                            <span class="menubar-inner"></span>
                                        </span>
                                    </div>
                                    <!-- menu -->
                                    <nav class="main-menu menu-mobile" id="menu">
                                        <ul class="menu">

                                            <li class="mega-menu-item active_menu_3">
                                                <a href="javascript:void(0)" class="mega-menu-link">La Alianza</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="/web_alianza">La Alianza</a></li>
                                                    <li><a href="/web_mathias_rath">Dr. Mathias Rath</a></li>
                                                    <li><a href="/web_sustancias_vitales">Sustancias Vitales</a></li>
                                                    <li><a href="/web_productos_naturales">Productos Naturales</a></li>
                                                    <li><a href="/web_formacion">Formación</a></li>
                                                    <li><a href="/web_grupo_barcelona">Actívate - Grupo activo
                                                            Barcelona</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-item active_menu_4">
                                                <a href="/web_investigacion" class="mega-menu-link">Inst. de
                                                    Investigación</a>
                                            </li>
                                            <li class="mega-menu-item active_menu_4">
                                                <a href="/web_fundacion" class="mega-menu-link">Fundación</a>
                                            </li>
                                            <li class="mega-menu-item active_menu_4">
                                                <a href="javascript:void(0)" class="mega-menu-link">Publicaciones</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="<?php echo siteURL().'/web_publicacion/1'; ?>">Dr. Rath Internacional</a></li>
                                                    <li><a href="<?php echo siteURL().'/web_publicacion/2'; ?>">Folletos para la Salud Natural</a></li>
                                                    <li><a href="<?php echo siteURL().'/web_publicacion/3'; ?>">Boletines Informativos</a></li>
                                                    <li><a href="<?php echo siteURL().'/web_publicacion/4'; ?>">Revistas</a></li>
                                                    <li><a href="<?php echo siteURL().'/web_publicacion/5'; ?>">Productos Saludables</a></li>
                                                    <li><a href="<?php echo siteURL().'/web_publicacion/6'; ?>" >Investigación</a></li>
                                                    <li><a href="<?php echo siteURL().'/web_publicacion/7'; ?>">Libros</a></li>
                                                    <li><a href="<?php echo siteURL().'/web_publicacion/8'; ?>">Declaración Barletta</a></li>
                                                </ul>

                                            </li>
                                            <li class="mega-menu-item active_menu_4">
                                                <!-- <a href="/web_actividad" class="mega-menu-link">Actividades</a> -->
                                                <a href="javascript:void(0)" class="mega-menu-link">Actividades</a>
                                                <ul class="mega-submenu">
                                                    <li><a href="/web_curso_basico">Curso básico online</a>
                                                    </li>
                                                    <li><a href="/web_servicios_all/1">Cursos</a></li>
                                                    <!-- <li><a href="/web_servicios_all/2">Cursos y talleres</a></li> -->
                                                    <!-- <li><a href="/web_servicios_all/3">Talleres Escolares</a></li> -->
                                                </ul>

                                            </li>
                                            <li class="mega-menu-item active_menu_4">
                                                <a href="/web_blog/1" class="mega-menu-link">Blog</a>
                                            </li>
                                            <li class="mega-menu-item active_menu_5">
                                                <a href="/web_profesional" class="mega-menu-link">Profesionales</a>
                                            </li>
                                        </ul>
                                    </nav>

                                    <!-- <div class="header_extra d-flex flex-row align-items-center justify-content-end">
                                        <div class="header_search">
                                            <a href="#" class="btn-default search_btn"><i class="ti ti-search"></i></a>
                                            <div class="header_search_content" style="background: #535aa2;">
                                                <form id="searchbox" method="get" action="#">
                                                    <input class="search_query" type="text" id="search_query_top" name="s" placeholder="Buscar" value="">
                                                    <button type="submit" class="btn close-search"><i class="fa fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div> -->
                                </div><!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- site-header-menu end-->

 
        </header>
        <!--header end-->

        
@push('scripts')

<script type="text/javascript">
 

</script>
@endpush
