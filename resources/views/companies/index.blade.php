@extends('layouts.master')

@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Global Parameters') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Institutions') }}</span>
</li>
@endsection
@section('content')
    <div id="preloader">
        <img src="{{ asset('storage/images/load.gif') }}" id="loader">
    </div>
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd row" style="margin-left: 3px; margin-right: 3px;">
                                <h1>{{ __('List') }} <span class="table-project-n">{{ __('Institutions') }}</span>
                                    
                                    <a href="{{ route('company-types') }}" class="btn btn-custon-four btn-default pull-right" title="{{ __('Company Types') }}"><i class="fas fa-cog"></i></a>

                                    <a href="{{ route('companies.crear') }}" class="btn btn-custon-four btn-success pull-right" style="margin: 0 3px;">
                                        <i class="fas fa-plus"></i>
                                        {{ __('Create Institution') }}
                                    </a>
                                </h1>

                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">{{ __('Export Basic') }}</option>
                                        <option value="all">{{ __('Export All') }}</option>
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
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="IdCompany">ID</th>
                                            <th data-field="Name">{{ __('Name') }}</th>
                                            <th data-field="Email">{{ __('Email') }}</th>
                                            <th data-field="WebSite">{{ __('Web Site') }}</th>
                                            <th data-field="ContactName">{{ __('Contact') }}</th>
                                            <th data-field="Type">{{ __('Type') }}</th>
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
            $('#preloader').fadeOut('slow');
        });

        function ajaxRequest(params) {
            var url = '{{ route("companies.get-list") }}';
            console.log("url", url);
            $.get(url + '?' + $.param(params.data)).then(function (res) {

                params.success(res)
            });
        }
    </script>      
@endsection
