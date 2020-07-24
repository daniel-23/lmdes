@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Security') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Roles') }}</span>
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
                                <h1>{{ __('List') }} <span class="table-project-n">Roles</span>
                                    @can('tiene-permiso','Roles+Crear')
                                    <a href="{{ route('roles.crear') }}" class="btn btn-custon-four btn-success pull-right">
                                        <i class="fas fa-plus"></i>
                                        {{ __('Add Role') }}
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
                                    data-toggle="table"
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
                                    data-toolbar="#toolbar"
                                    >
                                    <thead>
                                        <tr>
                                            <th data-field="IdRole">ID</th>
                                            <th data-field="Name">{{ __('Name') }}</th>
                                            <th data-field="Description">{{ __('Description') }}</th>
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
    <script type="text/javascript">
        $(function () {
            $('#table').bootstrapTable();
        });

        function ajaxRequest(params) {
            var url = '{{ route("roles.get-list") }}';
            console.log("url", url);
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                console.log("res", res);
                params.success(res)
            });
        }
    </script>      
@endsection
