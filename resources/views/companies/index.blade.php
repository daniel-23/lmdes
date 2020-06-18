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
                                    <h1>{{ __('List') }} <span class="table-project-n">{{ __('Companies') }}</span>
                                        <a href="{{ route('companies.crear') }}" class="btn btn-custon-four btn-success">
                                            <i class="fas fa-plus"></i>
                                            {{ __('Create Company') }}
                                        </a>
                                        <a href="{{ route('company-types') }}" class="btn btn-custon-four btn-default pull-right" title="{{ __('Company Types') }}"><i class="fas fa-cog"></i></a>
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
                                            <option value="selected">Export Selected</option>
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


        @include('layouts.footer')
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('#table').bootstrapTable();
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
