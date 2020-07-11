@extends('layouts.master')

@section('content')
    
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd row" style="margin: 0 3px;">
                                <h1> <span class="table-project-n">{{ __('Regional') }}</span> &nbsp;  
                                <a href="{{ route('companies.regional.crear',$company->IdCompany) }}" class="btn btn-custon-four btn-success pull-right">
                                    <i class="fas fa-plus"></i>
                                    {{ __('Add Regional') }}
                                </a></h1>

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
                                            <th data-field="IdCurrency">ID</th>
                                            <th data-field="Name">{{ __('City') }}</th>
                                            <th data-field="Symbol">{{ __('Currency') }}</th>
                                            <th data-field="TimeZone">{{ __('Time Zone') }}</th>
                                            <th data-field="Language">{{ __('Language') }}</th>
                                            <th data-field="btns">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($company->regionals as $regional)
                                        <tr>
                                            <td>{{ $regional->IdRegional }}</td>
                                            <td>{{ $regional->city->Name }}</td>
                                            <td>{{ $regional->currency->Name }}</td>
                                            <td>{{ $regional->timezone->Name }}</td>
                                            <td>{{ $regional->language->Name }}</td>
                                            

                                            <td>
                                                @if(false)
                                                &nbsp;   
                                                <a href="{{ url('/companies/regional/'.$company->IdCompany.'/editar/'.$regional->IdRegional) }}" title="Editar" class="btn btn-custon-four btn-primary btn-xs">
                                                    <i class="fas fa-pencil-alt" style="color: white;"></i>
                                                <a>
                                                @endif
                                                

                                                &nbsp;   
                                                <a href="{{ url('/companies/regional/eliminar/'.$regional->IdRegional) }}" title="{{ __('Delete') }}" class="btn btn-custon-four btn-danger btn-xs">
                                                    <i class="fas fa-trash-alt" style="color: white;"></i>
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
    <script type="text/javascript">
        $(function () {
            $('#table').bootstrapTable();
        });

        
    </script>      
@endsection
