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
                                <span>{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('tiene-permiso','Calendario+Acceder')
                        <li>
                            <a href="{{ url('/calendario') }}" aria-expanded="false">
                                <span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                                <span class="mini-click-non">{{ __('Calendar') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('tiene-permiso','Cursos+Acceder')
                        <li>
                            <a href="{{ route('cursos') }}" aria-expanded="false">
                                <span class="educate-icon educate-course icon-wrap"></span>
                                <span class="mini-click-non">{{ __('Courses') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('tiene-permiso','Profesores+Acceder')
                        <li>
                            <a href="{{ route('profesores') }}">
                                <span class="educate-icon educate-professor icon-wrap"></span>
                                <span>{{ __('Teachers') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('tiene-permiso','Estudiantes+Acceder')

                        <li>
                            <a href="{{ route('estudiantes') }}">
                                <span class="educate-icon educate-student icon-wrap"></span>
                                <span>{{ __('Estudents') }}</span>
                            </a>
                        </li>
                    @endcan
                    
                    @can('tiene-permiso','Biblioteca+Acceder')
                        <li>
                            <a href="{{ route('home') }}">
                                <span class="educate-icon educate-library icon-wrap"></span>
                                <span>{{ __('Library') }}</span>
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
                                <span>{{ __('Billboard') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('tiene-permiso','Parámetros Generales+Acceder')
                        <!--li>
                            <a href="{{ route('par-general') }}">
                                <i class="fa fa-cog" aria-hidden="true" style="font-size: 23px; margin-right: 8px;"></i>
                                <span>{{ __('General Parameters') }}</span>
                            </a>
                        </li-->
                    @endcan

                    @can('tiene-permiso','Administrar Usuarios+Acceder')
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-users" aria-hidden="true" style="font-size: 20px; margin-right: 8px;"></i>
                                <span>{{ __('Manage Users') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('tiene-permiso','Administrar Utilidades+Acceder')
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <span class="educate-icon educate-library icon-wrap"></span>
                                <span class="mini-click-non">{{ __('Manage Utilities') }}</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Library" href="library-assets.html"><span class="mini-sub-pro">{{ __('Billboard') }}</span></a></li>
                                <li><a title="Add Library" href="add-library-assets.html"><span class="mini-sub-pro">{{ __('Library') }}</span></a></li>
                            </ul>
                        </li>
                    @endcan

                    @can('tiene-permiso','Administrar Cursos+Acceder')
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <span class="educate-icon educate-course icon-wrap"></span>
                                <span class="mini-click-non">{{ __('Manage Courses') }}</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                @can('tiene-permiso','Grupos+Acceder')
                                <li>
                                    <a href="{{ route('grupos') }}">
                                        <span class="mini-sub-pro">{{ __('Groups') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Categorias+Acceder')
                                <li>
                                    <a href="{{ route('categorias') }}">
                                        <span class="mini-sub-pro">{{ __('Categories') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Plantillas+Acceder')
                                <li>
                                    <a href="{{ route('plantillas') }}">
                                        <span class="mini-sub-pro">{{ __('Templates') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Formatos+Acceder')
                                <li>
                                    <a href="{{ route('formatos') }}">
                                        <span class="mini-sub-pro">{{ __('Formats') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Escalas+Acceder')
                                <li>
                                    <a href="{{ route('escalas') }}">
                                        <span class="mini-sub-pro">{{ ('Scales') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Competencias+Acceder')
                                <li>
                                    <a href="{{ route('competencias') }}">
                                        <span class="mini-sub-pro">{{ __('Competencies') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Insignias+Acceder')
                                <li>
                                    <a href="{{ route('badges') }}">
                                        <span class="mini-sub-pro">{{ __('Badges') }}</span>
                                    </a>
                                </li>
                                @endcan 

                                @can('tiene-permiso','Parametros+Acceder')
                                <li>
                                    <a href="{{ route('par-courses') }}">
                                        <span class="mini-sub-pro">{{ __('Parameters') }}</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('tiene-permiso','Parámetros Globales+Acceder')
                        <li @if($act_link == 'parameters_global') class="active" @endif>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="fas fa-shield-alt"></i> &nbsp; 
                                <span class="mini-click-non">{{ __('Global Parameters') }}</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                @can('tiene-permiso','Compañía+Acceder')
                                <li>
                                    <a href="{{ route('companies') }}">
                                        <span class="mini-sub-pro">{{ __('Institutions') }}</span>
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
                                        <span class="mini-sub-pro">{{ __('Language') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Zonas Horarias+Acceder')
                                <li>
                                    <a href="{{ route('zona-horaria') }}">
                                        <span class="mini-sub-pro">{{ __('Times Zones') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Paises+Acceder')

                                <li>
                                    <a href="{{ route('paises') }}">
                                        <span class="mini-sub-pro">{{ __('Countries') }}</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('estados') }}">
                                        <span class="mini-sub-pro">{{ __('States') }}</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('ciudades') }}">
                                        <span class="mini-sub-pro">{{ __('Cities') }}</span>
                                    </a>
                                </li>

                                @endcan

                                @can('tiene-permiso','Monedas+Acceder')
                                <li>
                                    <a href="{{ route('monedas') }}">
                                        <span class="mini-sub-pro">{{ __('Currencies') }}</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('tiene-permiso','Seguridad+Acceder')
                        <li @if($act_link == 'security') class="active" @endif>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <i class="fas fa-shield-alt"></i> &nbsp; 
                                <span class="mini-click-non">{{ __('Security') }}</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                @can('tiene-permiso','Usuarios+Acceder')
                                <li>
                                    <a href="{{ route('usuarios') }}">
                                        <span class="mini-sub-pro">{{ __('Users') }}</span>
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
                                        <span class="mini-sub-pro">{{ __('Permissions') }}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('tiene-permiso','Componentes+Acceder')
                                <li>
                                    <a href="{{ route('componentes') }}">
                                        <span class="mini-sub-pro">{{ __('Components') }}</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('tiene-permiso','Reportes+Acceder')
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-charts icon-wrap"></span> <span class="mini-click-non">{{ __('Reports') }}</span></a>
                        <ul class="submenu-angle chart-mini-nb-dp" aria-expanded="false">
                            @can('tiene-permiso','Aud Usuarios+Acceder')
                            <li>
                                <a title="Bar Charts" href="bar-charts.html">
                                    <span class="mini-sub-pro">{{ __('Aud Users') }}</span>
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
                        <a href="events.html" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="educate-icon educate-pages icon-wrap"></span>
                            <span class="mini-click-non">{{ __('Sign off') }}</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>