@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Security') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Users') }}</span>
</li>
@endsection

@section('content')
<!-- Static Table Start -->

<div class="data-table-area mg-b-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd row" style="margin-left: 3px; margin-right: 3px;">
                            <h1>{{ __('List Users') }} @can('tiene-permiso','Usuarios+Crear')<a href="{{ route('usuarios.crear') }}" class="btn btn-success pull-right">{{ __('Add User') }}</a> @endcan </h1>
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
                            id="tabla"
                            data-locale="es-CL"
                            data-toggle="tabla"
                            data-ajax="ajaxRequest"
                            data-search="true"
                            data-side-pagination="server"
                            data-pagination="true"
                            data-show-columns="true"
                            data-show-pagination-switch="true"
                            data-show-refresh="true"
                            data-key-events="true"
                            data-show-toggle="true"
                            data-resizable="true"
                            data-show-export="true"
                            data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="IdUser">ID</th>
                                        <th data-field="Name">{{ __('Name') }}</th>
                                        <th data-field="Email">{{ __('Email') }}</th>
                                        <th data-field="Role">{{ __('Role') }}</th>
                                        <th data-field="btns">{{ __('Actions') }}</th>
                                            
                                    </tr>
                                </thead>
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
        $(document).ready(function() {
            $('#tabla').bootstrapTable();
        });
        function ajaxRequest(params) {
            var url = '{{ route("usuarios.get-list") }}';
            console.log("url", url);
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                console.log("res", res);
                params.success(res)
            });
        }
    </script>      
@endsection