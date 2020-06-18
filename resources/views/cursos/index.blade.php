@extends('layouts.master')

@section('content')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @include('layouts.header')
        
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>{{ __('List') }} <span class="table-project-n">{{ __('Courses') }}</span> &nbsp;  
                                        <a href="{{ route('cursos.crear') }}" class="btn btn-custon-four btn-success">
                                            <i class="fas fa-plus"></i>
                                            {{ __('Add Course') }}
                                        </a>
                                        <a href="{{ route('formatos') }}" class="btn btn-custon-four btn-default pull-right" title="{{ __('Courses Format') }}"><i class="fas fa-align-justify"></i></a>

                                        &nbsp;

                                        <a href="{{ route('par-courses') }}" class="btn btn-custon-four btn-default pull-right" title="{{ __('Courses Parameters') }}" style="margin-right: 10px;"><i class="fas fa-cogs"></i></a>

                                        &nbsp;   

                                        <a href="{{ route('categorias') }}" class="btn btn-custon-four btn-default pull-right" title="{{ __('Categories') }}" style="margin-right: 10px;"><i class="fas fa-ad"></i></a>
                                    </h1>

                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __(session('success')) }}
                                    </div>
                                @endif
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">{{ __('Export Basic') }}</option>
                                            <option value="all">{{ __('Export All') }}</option>
                                            <!--option value="selected">Export Selected</option-->
                                        </select>
                                    </div>
                                    <table
                                        id="table"
                                        data-toggle="table"
                                        data-search="true"
                                        data-show-pagination-switch="true"
                                        data-pagination="true"
                                        data-show-columns="true"
                                        data-show-pagination-switch="true"
                                        data-show-refresh="true"
                                        data-key-events="true"
                                        data-show-toggle="true"
                                        data-resizable="true"
                                        data-show-export="true"
                                        data-toolbar="#toolbar"
                                        >
                                        
                                        <thead>
                                            <tr>
                                                <th data-field="IdCourse">ID</th>
                                                <th data-field="Name">{{ __('Name') }}</th>
                                                <th data-field="Code">{{ __('Code') }}</th>
                                                <th data-field="Description">{{ __('Description') }}</th>
                                                <th data-field="Category">{{ __('Category') }}</th>
                                                <th data-field="Language">{{ __('Language') }}</th>

                                                <th data-field="btns">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($courses as $course)
                                            <tr>
                                                <td>{{ $course->IdCourse }}</td>
                                                <td>{{ $course->Name }}</td>
                                                <td>{{ $course->Code }}</td>
                                                <td>{{ $course->Description }}</td>
                                                <td>{{ $course->category->Name }}</td>
                                                <td>{{ $course->Language->Name }}</td>
                                                <td>
                                                    @if($course->Enabled == 'E')
                                                        <a href="{{ route('cursos.cambiar-estatus',$course->IdCourse) }}" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i><a>
                                                    @else
                                                        <a href="{{ route('cursos.cambiar-estatus',$course->IdCourse) }}" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i><a>
                                                    @endif
                                                    &nbsp;   
                                                    <a href="{{ url('/cursos/editar/'.$course->IdCourse) }}" title="Editar" class="btn btn-custon-four btn-primary btn-xs">
                                                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                                                    <a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->

        @include('layouts.footer')
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('#table').bootstrapTable();
        });

        
    </script>      
@endsection
