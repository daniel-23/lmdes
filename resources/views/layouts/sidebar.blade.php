<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header hola">
            <a href="{{ route('home') }}" onclick="event.preventDefault();"><img class="main-logo" src="{{ asset('storage/images/logo/logo.png') }}" alt="Logo" /></a>
            <strong><a href="index.html"><img src="{{ asset('storage/images/logo/logosn.png') }}" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a href="{{ route('home') }}">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    @can('calendario')
                        <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false">
                                <span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                                <span class="mini-click-non">Calendario</span>
                            </a>
                        </li>
                    @endcan

                    @can('admin')
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <span class="educate-icon educate-course icon-wrap"></span>
                                <span class="mini-click-non">Cursos</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li>
                                    <a href="{{ route('categorias') }}">
                                        <span class="mini-sub-pro">Categorias</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('formatos') }}">
                                        <span class="mini-sub-pro">Formatos</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('cursos') }}">
                                        <span class="mini-sub-pro">Cursos</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('par-courses') }}">
                                        <span class="mini-sub-pro">Parametros</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Profesores</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="all-professors.html"><span class="mini-sub-pro">All Professors</span></a></li>
                                <li><a title="Add Professor" href="add-professor.html"><span class="mini-sub-pro">Add Professor</span></a></li>
                                <li><a title="Edit Professor" href="edit-professor.html"><span class="mini-sub-pro">Edit Professor</span></a></li>
                                <li><a title="Professor Profile" href="professor-profile.html"><span class="mini-sub-pro">Professor Profile</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Estudiantes</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Students" href="all-students.html"><span class="mini-sub-pro">All Students</span></a></li>
                                <li><a title="Add Students" href="add-student.html"><span class="mini-sub-pro">Add Student</span></a></li>
                                <li><a title="Edit Students" href="edit-student.html"><span class="mini-sub-pro">Edit Student</span></a></li>
                                <li><a title="Students Profile" href="student-profile.html"><span class="mini-sub-pro">Student Profile</span></a></li>
                            </ul>
                        </li>
                    @endcan

                    <li>
                        <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Biblioteca</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="All Library" href="library-assets.html"><span class="mini-sub-pro">Library Assets</span></a></li>
                            <li><a title="Add Library" href="add-library-assets.html"><span class="mini-sub-pro">Add Library Asset</span></a></li>
                            <li><a title="Edit Library" href="edit-library-assets.html"><span class="mini-sub-pro">Edit Library Asset</span></a></li>
                        </ul>
                    </li>

                    @can('super-admin')
                        
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <i class="fas fa-shield-alt"></i> &nbsp; 
                                <span class="mini-click-non">Par. Globales</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li>
                                    <a href="{{ route('companies') }}">
                                        <span class="mini-sub-pro">Instituciones</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('par-general') }}">
                                        <span class="mini-sub-pro">General</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('idiomas') }}">
                                        <span class="mini-sub-pro">Idiomas</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('zona-horaria') }}">
                                        <span class="mini-sub-pro">Zonas Horarias</span>
                                    </a>
                                </li>

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

                                <li>
                                    <a href="{{ route('monedas') }}">
                                        <span class="mini-sub-pro">Monedas</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <i class="fas fa-shield-alt"></i> &nbsp; 
                                <span class="mini-click-non">Seguridad</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li>
                                    <a href="{{ route('usuarios') }}">
                                        <span class="mini-sub-pro">Usuarios</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('roles') }}">
                                        <span class="mini-sub-pro">Roles</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('permisos') }}">
                                        <span class="mini-sub-pro">Permisos</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('componentes') }}">
                                        <span class="mini-sub-pro">Componentes</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @endcan
                    
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-charts icon-wrap"></span> <span class="mini-click-non">Reportes</span></a>
                        <ul class="submenu-angle chart-mini-nb-dp" aria-expanded="false">
                            <li><a title="Bar Charts" href="bar-charts.html"><span class="mini-sub-pro">Bar Charts</span></a></li>
                            <li><a title="Line Charts" href="line-charts.html"><span class="mini-sub-pro">Line Charts</span></a></li>
                            <li><a title="Area Charts" href="area-charts.html"><span class="mini-sub-pro">Area Charts</span></a></li>
                            <li><a title="Rounded Charts" href="rounded-chart.html"><span class="mini-sub-pro">Rounded Charts</span></a></li>
                            <li><a title="C3 Charts" href="c3.html"><span class="mini-sub-pro">C3 Charts</span></a></li>
                            <li><a title="Sparkline Charts" href="sparkline.html"><span class="mini-sub-pro">Sparkline Charts</span></a></li>
                            <li><a title="Peity Charts" href="peity.html"><span class="mini-sub-pro">Peity Charts</span></a></li>
                        </ul>
                    </li>
                    
                    <li id="removable">
                        <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap"></span> <span class="mini-click-non">Cerrar sesión</span></a>
                        <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                            <li><a title="Login" href="login.html"><span class="mini-sub-pro">Login</span></a></li>
                            <li><a title="Register" href="register.html"><span class="mini-sub-pro">Register</span></a></li>
                            <li><a title="Lock" href="lock.html"><span class="mini-sub-pro">Lock</span></a></li>
                            <li><a title="Password Recovery" href="password-recovery.html"><span class="mini-sub-pro">Password Recovery</span></a></li>
                            <li><a title="404 Page" href="404.html"><span class="mini-sub-pro">404 Page</span></a></li>
                            <li><a title="500 Page" href="500.html"><span class="mini-sub-pro">500 Page</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>