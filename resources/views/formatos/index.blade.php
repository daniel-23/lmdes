@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Manage Courses') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Formats') }}</span>
</li>
@endsection
@section('content')
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd row" style="margin: 0 3px;">
                                <h1>{{ __('List') }}
                                    <span class="table-project-n">{{ __('Formats') }}</span>
                                    @can('tiene-permiso','Formatos+Crear')
                                        &nbsp;  
                                        <a href="{{ route('formatos.crear') }}" class="btn btn-custon-four btn-success pull-right">
                                            <i class="fas fa-plus"></i>
                                            {{ __('Add Format') }}
                                        </a>
                                    @endcan
                                </h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
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
                                            <th data-field="IdCourseFormat">ID</th>
                                            <th data-field="Name">{{ __('Name') }}</th>
                                            <th data-field="Description">{{ __('Description') }}</th>
                                            <th data-field="CreatedAt">{{ __('Created') }}</th>
                                            <th data-field="UpdateAt">{{ __('Update') }}</th>
                                            <th data-field="btns">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($formats as $format)
                                        <tr>
                                            <td>{{ $format->IdCourseFormat }}</td>
                                            <td>{{ $format->Name }}</td>
                                            <td>{{ $format->Description }}</td>
                                            <td>{{ $format->CreatedAt }}</td>
                                            <td>{{ $format->UpdateAt }}</td>
                                            <td>
                                                @can('tiene-permiso','Formatos+Cambiar Estado')
                                                    @if($format->Enabled == 'E')
                                                        <a href="{{ route('formatos.cambiar-estatus',$format->IdCourseFormat) }}" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i><a>
                                                    @else
                                                        <a href="{{ route('formatos.cambiar-estatus',$format->IdCourseFormat) }}" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i><a>
                                                    @endif
                                                @else
                                                    @if($format->Enabled == 'E')
                                                        <button title="Desacivar" class="btn btn-custon-four btn-success btn-xs" disabled><i class="far fa-check-circle" style="color: white;"></i></button>
                                                    @else
                                                        <button title="Activar" class="btn btn-custon-four btn-danger btn-xs" disabled><i class="fas fa-times-circle" style="color: white;"></i></button>
                                                    @endif
                                                @endcan
                                                    
                                                @can('tiene-permiso','Formatos+Editar')
                                                    &nbsp;   
                                                    <a href="{{ route('formatos.editar',$format->IdCourseFormat) }}" title="Editar" class="btn btn-custon-four btn-primary btn-xs">
                                                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                                                    </a>
                                                @endcan
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
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('#table').bootstrapTable();
        });

        
    </script>      
@endsection
