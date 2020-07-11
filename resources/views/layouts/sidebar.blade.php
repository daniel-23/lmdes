<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header hola">
            <a href="{{ route('home') }}" onclick="event.preventDefault();"><img class="main-logo" src="{{ asset('storage/images/logo/logo.png') }}" alt="Logo" /></a>
            <strong><a href="index.html"><img src="{{ asset('storage/images/logo/logosn.png') }}" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    @can('tiene-permiso','Dashboard+Acceder')
                        <li>
                            <a href="{{ route('home') }}">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    @endcan

                    @can('tiene-permiso','Calendario+Acceder')
                        <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false">
                                <span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                                <span class="mini-click-non">Calendario</span>
                            </a>
                        </li>
                    @endcan


                    @can('tiene-permiso','Cursos+Acceder')
                        <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false">
                                <span class="educate-icon educate-course icon-wrap"></span>
                                <span class="mini-click-non">Cursos</span>
                            </a>
                        </li>
                    @endcan
                    
                    @can('tiene-permiso','Profesores+Acceder')
                        <li>
                            <a href="{{ route('profesores') }}">
                                <span class="educate-icon educate-professor icon-wrap"></span>
                                <span>Profesores</span>
                            </a>
                        </li>
                    @endcan
                    @can('tiene-permiso','Estudiantes+Acceder')

                        <li>
                            <a href="{{ route('home') }}">
                                <span class="educate-icon educate-student icon-wrap"></span>
                                <span>Estudiantes</span>
                            </a>
                        </li>
                    @endcan

                    
                    @can('tiene-permiso','Biblioteca+Acceder')
                        <li>
                            <a href="{{ route('home') }}">
                                <span class="educate-icon educate-library icon-wrap"></span>
                                <span>Biblioteca</span>
                            </a>
                        </li>
                        <!--li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <span class="educate-icon educate-library icon-wrap"></span>
                                <span class="mini-click-non">Biblioteca</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Library" href="library-assets.html"><span class="mini-sub-pro">Library Assets</span></a></li>
                                <li><a title="Add Library" href="add-library-assets.html"><span class="mini-sub-pro">Add Library Asset</span></a></li>
                                <li><a title="Edit Library" href="edit-library-assets.html"><span class="mini-sub-pro">Edit Library Asset</span></a></li>
                            </ul>
                        </li-->
                    @endcan

                    @can('tiene-permiso','Cartelera+Acceder')
                        <li>
                            <a href="{{ route('home') }}">
                                <span class="educate-icon educate-library icon-wrap"></span>
                                <span>Cartelera</span>
                            </a>
                        </li>
                    @endcan

                    @can('tiene-permiso','Parámetros Generales+Acceder')
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-cog" aria-hidden="true" style="font-size: 23px; margin-right: 8px;"></i>
                                <span>Parámetros Generales</span>
                            </a>
                        </li>
                    @endcan

                    @can('tiene-permiso','Administrar Usuarios+Acceder')
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-users" aria-hidden="true" style="font-size: 20px; margin-right: 8px;"></i>
                                <span>Administrar Usuarios</span>
                            </a>
                        </li>
                    @endcan

                    @can('tiene-permiso','Administrar Utilidades+Acceder')
                        
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <span class="educate-icon educate-library icon-wrap"></span>
                                <span class="mini-click-non">Administrar Utilidades</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Library" href="library-assets.html"><span class="mini-sub-pro">Cartelera</span></a></li>
                                <li><a title="Add Library" href="add-library-assets.html"><span class="mini-sub-pro">Biblioteca</span></a></li>
                            </ul>
                        </li>
                    @endcan

                    @can('tiene-permiso','Administrar Cursos+Acceder')
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <span class="educate-icon educate-course icon-wrap"></span>
                                <span class="mini-click-non">Administrar Cursos</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                @can('tiene-permiso','Grupos+Acceder')
                                <li>
                                    <a href="{{ route('grupos') }}">
                                        <span class="mini-sub-pro">Grupos</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Categorias+Acceder')
                                <li>
                                    <a href="{{ route('categorias') }}">
                                        <span class="mini-sub-pro">Categorias</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Formatos+Acceder')
                                <li>
                                    <a href="{{ route('formatos') }}">
                                        <span class="mini-sub-pro">Formatos</span>
                                    </a>
                                </li>
                                @endcan
                                
                                <li>
                                    <a href="{{ route('cursos') }}">
                                        <span class="mini-sub-pro">Cursos</span>
                                    </a>
                                </li>

                                @can('tiene-permiso','Parametros+Acceder')
                                <li>
                                    <a href="{{ route('par-courses') }}">
                                        <span class="mini-sub-pro">Parametros</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('tiene-permiso','Parámetros Globales+Acceder')
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <i class="fas fa-shield-alt"></i> &nbsp; 
                                <span class="mini-click-non">Par. Globales</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">

                                @can('tiene-permiso','Compañía+Acceder')
                                <li>
                                    <a href="{{ route('companies') }}">
                                        <span class="mini-sub-pro">Instituciones</span>
                                    </a>
                                </li>
                                @endcan

                                <!--li>
                                    <a href="{{ route('par-general') }}">
                                        <span class="mini-sub-pro">General</span>
                                    </a>
                                </li-->

                                @can('tiene-permiso','Idiomas+Acceder')
                                <li>
                                    <a href="{{ route('idiomas') }}">
                                        <span class="mini-sub-pro">Idiomas</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Zonas Horarias+Acceder')
                                <li>
                                    <a href="{{ route('zona-horaria') }}">
                                        <span class="mini-sub-pro">Zonas Horarias</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Paises+Acceder')

                                <li>
                                    <a href="{{ route('paises') }}">
                                        <span class="mini-sub-pro">Paises</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('estados') }}">
                                        <span class="mini-sub-pro">Estados</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('ciudades') }}">
                                        <span class="mini-sub-pro">Ciudades</span>
                                    </a>
                                </li>

                                @endcan

                                @can('tiene-permiso','Monedas+Acceder')
                                <li>
                                    <a href="{{ route('monedas') }}">
                                        <span class="mini-sub-pro">Monedas</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('tiene-permiso','Seguridad+Acceder')

                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <i class="fas fa-shield-alt"></i> &nbsp; 
                                <span class="mini-click-non">Seguridad</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                @can('tiene-permiso','Usuarios+Acceder')
                                <li>
                                    <a href="{{ route('usuarios') }}">
                                        <span class="mini-sub-pro">Usuarios</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Roles+Acceder')
                                <li>
                                    <a href="{{ route('roles') }}">
                                        <span class="mini-sub-pro">Roles</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Permisos+Acceder')
                                <li>
                                    <a href="{{ route('permisos') }}">
                                        <span class="mini-sub-pro">Permisos</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Componentes+Acceder')
                                <li>
                                    <a href="{{ route('componentes') }}">
                                        <span class="mini-sub-pro">Componentes</span>
                                    </a>
                                </li>
                                @endcan

                            </ul>
                        </li>
                    @endcan

                    @can('tiene-permiso','Reportes+Acceder')
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-charts icon-wrap"></span> <span class="mini-click-non">Reportes</span></a>
                        <ul class="submenu-angle chart-mini-nb-dp" aria-expanded="false">
                            @can('tiene-permiso','Aud Usuarios+Acceder')
                            <li>
                                <a title="Bar Charts" href="bar-charts.html">
                                    <span class="mini-sub-pro">Aud Usuarios</span>
                                </a>
                            </li>
                            @endcan

                            
                        </ul>
                    </li>
                    @endcan



                    
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        <a title="Landing Page" href="events.html" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="educate-icon educate-pages icon-wrap"></span>
                            <span class="mini-click-non">Cerrar sesión</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>