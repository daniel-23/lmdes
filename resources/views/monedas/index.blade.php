@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Global Parameters') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Currencies') }}</span>
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
                                <h1>{{ __('List') }} <span class="table-project-n">{{ __('Currencies') }}</span> &nbsp;  
                                <a href="{{ route('monedas.crear') }}" class="btn btn-custon-four btn-success pull-right">
                                    <i class="fas fa-plus"></i>
                                    {{ __('Add Currencie') }}
                                </a></h1>

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
                                            <th data-field="Name">{{ __('Name') }}</th>
                                            <th data-field="Symbol">{{ __('Route File') }}</th>
                                            <th data-field="Prefix">{{ __('Prefix') }}</th>
                                            <th data-field="btns">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($currencies as $currency)
                                        <tr>
                                            <td>{{ $currency->IdCurrency }}</td>
                                            <td>{{ $currency->Name }}</td>
                                            <td>{{ $currency->Symbol }}</td>
                                            <td>{{ $currency->Prefix }}</td>
                                            

                                            <td>
                                                &nbsp;   
                                                <a href="{{ url('/monedas/editar/'.$currency->IdCurrency) }}" title="Editar" class="btn btn-custon-four btn-primary btn-xs">
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
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('#table').bootstrapTable();
        });

        
    </script>      
@endsection
