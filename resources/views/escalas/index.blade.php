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
                                    <h1>{{ __('List') }} <span class="table-project-n">{{ __('Scales') }}</span> &nbsp;  
                                    <a href="{{ route('escalas.crear') }}" class="btn btn-custon-four btn-success">
                                        <i class="fas fa-plus"></i>
                                        {{ __('Add Scale') }}
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
                                                <th data-field="IdState">ID</th>
                                                <th data-field="Name">{{ __('Name') }}</th>
                                                <th data-field="Description">{{ __('Description') }}</th>
                                                <th data-field="Scales">{{ __('Scales') }}</th>
                                                <th data-field="btns">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($scales as $scale)
                                            <tr>
                                                <td>{{ $scale->IdScale }}</td>
                                                <td>{{ $scale->Name }}</td>
                                                <td>{{ $scale->Description }}</td>
                                                <td>{{ $scale->Scales }}</td>
                                                <td>
                                                    @if($scale->Enabled == 'E')
                                                        <a href="{{ route('escalas.cambiar-estatus',$scale->IdScale) }}" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i><a>
                                                    @else
                                                        <a href="{{ route('escalas.cambiar-estatus',$scale->IdScale) }}" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i><a>
                                                    @endif
                                                    &nbsp;   
                                                    <a href="{{ url('/escalas/editar/'.$scale->IdScale) }}" title="Editar" class="btn btn-custon-four btn-primary btn-xs">
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