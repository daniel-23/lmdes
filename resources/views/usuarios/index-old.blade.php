@extends('layouts.master')

@section('content')
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>{{ __('List') }} <span class="table-project-n">{{ __('Users') }}</span>
                                    <a href="{{ route('usuarios.crear') }}" class="btn btn-custon-four btn-success">
                                        <i class="fas fa-plus"></i>
                                        {{ __('Add User') }}
                                    </a>
                                    <a href="{{ route('usuarios.parametros') }}" class="btn btn-custon-four btn-default pull-right" title="{{ __('Users Parameters') }}"><i class="fas fa-cogs"></i></a>

                                    &nbsp;   

                                    <a href="{{ route('usuarios.auditoria') }}" class="btn btn-custon-four btn-default pull-right" title="{{ __('Aud Users') }}" style="margin-right: 10px;"><i class="fas fa-ad"></i></a>
                                </h1>



                            </div>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
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
                                    id="tabla"
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
                                    data-toolbar="#toolbar"
                                    >
                                    
                                    <thead>
                                        <tr>
                                            <th data-field="IdUser">ID</th>
                                            <th data-field="Code">{{ __('Code') }}</th>
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
    <script type="text/javascript">
        $(function () {
            $('#table').bootstrapTable();
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
