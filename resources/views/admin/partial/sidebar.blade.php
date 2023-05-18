  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index" class="brand-link">
          <img src="/template_admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Dashboard</span>
      </a>

      <?php 
                  
        function siteURL() {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || 
            $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        return $protocol.$domainName;
        }
            
    ?>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="/template_admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->tipo_user == 1 ? "Administrador" : "Usuario"  }}</a>
              </div>
          </div>
          @if(Auth::user()->tipo_user == 1)
          <!-- Sidebar Admin -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Home<i class="fas fa-angle-left right"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_home_slider'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Slider & Footer</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_home_bienvenidos'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Bienvenidos</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_nuestra_actividad'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Nuestros Cursos</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_nuestro_estudio'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Nuestras publicaciones</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_ventajas'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Ventajas</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="<?php echo siteURL().'/admin/admin_quienes_somos'; ?>" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Quienes Somos<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?php echo siteURL().'/admin/admin_blog'; ?>" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Blog<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?php echo siteURL().'/admin/admin_noticia'; ?>" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Noticia<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="<?php echo siteURL().'/admin/admin_quehacemos'; ?>" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Que Hacemos<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="<?php echo siteURL().'/admin/admin_medicinacelular'; ?>" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Medicina Celular<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              La Alianza
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_alianza'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>La Alianza</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_mathias_rath'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dr. Mathias Rath</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_sustancias_vitales'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Sustancias Vitales</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_productos_naturales'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Productos Naturales</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_formacion'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Formación</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_grupo_barcelona'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Barcelona</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="<?php echo siteURL().'/admin/admin_investigacion'; ?>" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Inst. de Investigación<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="<?php echo siteURL().'/admin/admin_fundacion'; ?>" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Fundación<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="<?php echo siteURL().'/admin/admin_publicacion'; ?>" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Publicaciones<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>

                  
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Actividades
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/admin_curso_basico'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Curso básico online</p>
                              </a>
                          </li>
                          <!-- <li class="nav-item">
                              <a href="<?php echo siteURL().'/admin/adminServicioHello'; ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Charlas,Cursos y Talleres</p>
                              </a>
                          </li> -->
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="<?php echo siteURL().'/admin/admin_profesional'; ?>" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Profesionales<i class="fas fa-podcast right"></i> </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p> Políticas<i class="fas fa-angle-left right"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ url('admin/terminos' , [ 'id' => 1]) }}" class="nav-link">
                                  <i class="nav-icon far fa-circle text-danger"></i>
                                  <p>Aviso Legal</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/terminos' , [ 'id' => 2]) }}" class="nav-link">
                                  <i class="nav-icon far fa-circle text-danger"></i>
                                  <p>Políticas de Privacidad</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/terminos' , [ 'id' => 3]) }}" class="nav-link">
                                  <i class="nav-icon far fa-circle text-danger"></i>
                                  <p>Políticas de Cookies</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('admin/terminos' , [ 'id' => 4]) }}" class="nav-link">
                                  <i class="nav-icon far fa-circle text-danger"></i>
                                  <p>Condiciones Generales</p>
                              </a>
                          </li>
                          <!-- <li class="nav-item">
                              <a href="{{ url('admin/terminos' , [ 'id' => 5]) }}" class="nav-link">
                                  <i class="nav-icon far fa-circle text-danger"></i>
                                  <p>Devoluciones</p>
                              </a>
                          </li> -->
                          <li class="nav-item" style="margin-bottom: 145px;">
                              <a href="{{ url('admin/terminos' , [ 'id' => 6]) }}" class="nav-link">
                                  <i class="nav-icon far fa-circle text-danger"></i>
                                  <p>Terminos y Condiciones</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          @else
          <!-- Sidebar Usuario -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p> Recursos<i class="fas fa-angle-left right"></i> </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Reservas</p></a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Favoritos</p></a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Libros</p></a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Cursos</p></a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          @endif
      </div>

  </aside>