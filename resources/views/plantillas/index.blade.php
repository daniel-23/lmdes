@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Manage Courses') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Templates') }}</span>
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
                                <h1>{{ __('List') }} <span class="table-project-n">{{ __('Templates') }}</span>
                                    @can('tiene-permiso','Plantillas+Crear')
                                    &nbsp;  
                                    <a href="{{ route('plantillas.crear') }}" class="btn btn-custon-four btn-success pull-right">
                                        <i class="fas fa-plus"></i>
                                        {{ __('Add Template')}}
                                    </a>
                                    @endcan
                                </h1>

                            </div>
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
                                    data-locale="es-CL"
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
                                            <th data-field="IdCountry">ID</th>
                                            <th data-field="Name">{{ __('Name') }}</th>
                                            <th data-field="Description">{{ __('Description') }}</th>
                                            <th data-field="LimitDate">{{ __('Limit Date') }}</th>
                                            <th data-field="CreatedAt">{{ __('Created') }}</th>
                                            <th data-field="UpdateAt">{{ __('Update') }}</th>
                                            <th data-field="btns">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($templates as $template)
                                        <tr>
                                            <td>{{ $template->IdTemplate }}</td>
                                            <td>{{ $template->Name }}</td>
                                            <td>{{ $template->Description }}</td>
                                            <td>{{ $template->LimitDate }}</td>
                                            <td>{{ $template->CreatedAt }}</td>
                                            <td>{{ $template->UpdateAt }}</td>
                                            <td>
                                                @can('tiene-permiso','Plantillas+Cambiar Estado')
                                                    @if($template->Enabled == 'E')
                                                        <a href="{{ route('plantillas.cambiar-estatus',$template->IdTemplate) }}" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i></a>
                                                    @else
                                                        <a href="{{ route('plantillas.cambiar-estatus',$template->IdTemplate) }}" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i></a>
                                                    @endif
                                                @else
                                                    @if($template->Enabled == 'E')
                                                        <button title="Desacivar" class="btn btn-custon-four btn-success btn-xs" disabled><i class="far fa-check-circle" style="color: white;"></i></button>
                                                    @else
                                                        <button title="Activar" class="btn btn-custon-four btn-danger btn-xs" disabled><i class="fas fa-times-circle" style="color: white;"></i></button>
                                                    @endif
                                                @endcan
                                                    
                                                @can('tiene-permiso','Plantillas+Editar')
                                                &nbsp;   
                                                <a href="{{ url('/plantillas/editar/'.$template->IdTemplate) }}" title="Editar" class="btn btn-custon-four btn-primary btn-xs">
                                                    <i class="fas fa-pencil-alt" style="color: white;"></i>
                                                </a>
                                                @endcan

                                                &nbsp;   
                                                <a href="{{ url('/plantillas/competencias/'.$template->IdTemplate) }}" title="{{ __('Competencies') }}" class="btn btn-custon-four btn-warning btn-xs">
                                                    <i class="fab fa-confluence" style="color: white;"></i>
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
@endsection

@section('script')
    <script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table-locale-all.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#table').bootstrapTable();
        });
    </script>      
@endsection
