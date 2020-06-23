<?php if (!isset($act_link)) { $act_link = ''; } ?>
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{ asset('img/logo/logo.png') }}" alt="" /></a>
            <strong><a href="index.html"><img src="{{ asset('img/logo/logosn.png') }}" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    @can('dashboard')
                        <li>
                            <a href="{{ route('home') }}">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    @endcan

                    @can('calendario')
                        <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false">
                                <span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                                <span class="mini-click-non">{{ __('Calendar') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('cursos')
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false">
                                <span class="educate-icon educate-course icon-wrap"></span>
                                <span class="mini-click-non">{{ __('Courses') }}</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li>
                                    <a title="All Courses" href="all-courses.html">
                                        <span class="mini-sub-pro">All Courses</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Add Courses" href="add-course.html">
                                        <span class="mini-sub-pro">Add Course</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Edit Courses" href="edit-course.html">
                                        <span class="mini-sub-pro">Edit Course</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Courses Profile" href="course-info.html">
                                        <span class="mini-sub-pro">Courses Info</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Product Payment" href="course-payment.html">
                                        <span class="mini-sub-pro">Courses Payment</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('profesores')
                        <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">{{ __('Teachers') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="all-professors.html"><span class="mini-sub-pro">All Professors</span></a></li>
                                <li><a title="Add Professor" href="add-professor.html"><span class="mini-sub-pro">Add Professor</span></a></li>
                                <li><a title="Edit Professor" href="edit-professor.html"><span class="mini-sub-pro">Edit Professor</span></a></li>
                                <li><a title="Professor Profile" href="professor-profile.html"><span class="mini-sub-pro">Professor Profile</span></a></li>
                            </ul>
                        </li>
                    @endcan

                    @can('estudiantes')
                        <li>
                            <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">{{ __('Students') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Students" href="all-students.html"><span class="mini-sub-pro">All Students</span></a></li>
                                <li><a title="Add Students" href="add-student.html"><span class="mini-sub-pro">Add Student</span></a></li>
                                <li><a title="Edit Students" href="edit-student.html"><span class="mini-sub-pro">Edit Student</span></a></li>
                                <li><a title="Students Profile" href="student-profile.html"><span class="mini-sub-pro">Student Profile</span></a></li>
                            </ul>
                        </li>
                    @endcan

                    @can('biblioteca')
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">{{ __('Library') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Library" href="library-assets.html"><span class="mini-sub-pro">Library Assets</span></a></li>
                                <li><a title="Add Library" href="add-library-assets.html"><span class="mini-sub-pro">Add Library Asset</span></a></li>
                                <li><a title="Edit Library" href="edit-library-assets.html"><span class="mini-sub-pro">Edit Library Asset</span></a></li>
                            </ul>
                        </li>
                    @endcan

                    <li>
                        <a href="{{ route('home') }}">
                            <!--span class="educate-icon educate-home icon-wrap"></span-->
                            <span>{{ __('General Parameters') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('home') }}">
                            <!--span class="educate-icon educate-home icon-wrap"></span-->
                            <span>{{ __('Manage Users') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('home') }}">
                            <!--span class="educate-icon educate-home icon-wrap"></span-->
                            <span>{{ __('Manage Profits') }}</span>
                        </a>
                    </li>

                    <li class="{{ $act_link == 'manage-courses' ? 'active' : '' }}">
                            <a class="has-arrow" href="index.html">
                                <!--i class="fas fa-shield-alt"></i-->
                                <span class="mini-click-non">{{ __('Manage Courses') }}</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a href="{{ route('cursos') }}"><span class="mini-sub-pro">{{ __('Courses') }}</span></a></li>
                                <li><a href="{{ route('grupos') }}"><span class="mini-sub-pro">{{ __('Groups') }}</span></a></li>
                                <li><a href="{{ route('plantillas') }}"><span class="mini-sub-pro">{{ __('Templates') }}</span></a></li>
                                <li><a href="{{ route('competencias') }}"><span class="mini-sub-pro">{{ __('Competencies') }}</span></a></li>
                                <li><a href="{{ route('escalas') }}"><span class="mini-sub-pro">{{ __('Scales') }}</span></a></li>
                            </ul>
                        </li>
                    @can('super-admin')
                        <li class="{{ $act_link == 'parameters' ? 'active' : '' }}">
                            <a class="has-arrow" href="index.html">
                                <!--i class="fas fa-cog"></i--> 
                                <span class="mini-click-non">{{ __('Global Parameters') }}</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a href="{{ route('companies') }}"><span class="mini-sub-pro">{{ __('Companies') }}</span></a></li>

                                <li><a href="{{ route('par-general') }}"><span class="mini-sub-pro">{{ __('General') }}</span></a></li>


                                <li><a href="{{ route('idiomas') }}"><span class="mini-sub-pro">{{ __('Languages') }}</span></a></li>

                                <li><a href="{{ route('zona-horaria') }}"><span class="mini-sub-pro">{{ __('Times Zones') }}</span></a></li>

                                <li><a href="{{ route('paises') }}"><span class="mini-sub-pro">{{ __('Countries') }}</span></a></li>

                                <li><a href="{{ route('estados') }}"><span class="mini-sub-pro">{{ __('States') }}</span></a></li>

                                <li><a href="{{ route('ciudades') }}"><span class="mini-sub-pro">{{ __('Cities') }}</span></a></li>


                                <!--li><a href="{{ route('cursos') }}"><span class="mini-sub-pro">{{ __('Courses') }}</span></a></li-->
                                <li><a href="{{ route('monedas') }}"><span class="mini-sub-pro">{{ __('Currencies') }}</span></a></li>
                                
                            </ul>
                        </li>

                        <li class="{{ $act_link == 'security' ? 'active' : '' }}">
                            <a class="has-arrow" href="index.html">
                                <i class="fas fa-shield-alt"></i> &nbsp; 
                                <span class="mini-click-non">{{ __('Security') }}</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a href="{{ route('usuarios') }}"><span class="mini-sub-pro">{{ __('Users') }}</span></a></li>

                                <li><a href="{{ route('roles') }}"><span class="mini-sub-pro">{{ __('Roles') }}</span></a></li>

                                <li><a href="{{ route('permisos') }}"><span class="mini-sub-pro">{{ __('Permissions') }}</span></a></li>

                                <li><a href="{{ route('componentes') }}"><span class="mini-sub-pro">{{ __('Components') }}</span></a></li>
                            </ul>
                        </li>
                    @endcan


                    <li class="{{ $act_link == 'reports' ? 'active' : '' }}">
                        <a class="has-arrow" href="index.html">
                            <span class="educate-icon educate-charts icon-wrap"></span>
                            <span class="mini-click-non">{{ __('Reports') }}</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            
                            <li><a href="{{ route('audEventos') }}"><span class="mini-sub-pro">Aud {{ __('Events') }}</span></a></li>
                            
                        </ul>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </nav>
</div>