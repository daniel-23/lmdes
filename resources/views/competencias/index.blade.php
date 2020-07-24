@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Manage Courses') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Competencies') }}</span>
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
                                <h1>{{ __('Marcos') }} <span class="table-project-n">de {{ __('Competencies') }}</span>
                                @can('tiene-permiso','Competencias+Crear')
                                &nbsp;  
                                <a href="{{ route('competencias.crear') }}" class="btn btn-custon-four btn-success pull-right">
                                    <i class="fas fa-plus"></i>
                                    {{ __('Agregar Marco de Competencia') }}
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
                                    data-search="true"
                                    data-pagination="true"
                                    data-show-refresh="true"
                                    data-key-events="true"
                                    data-show-toggle="true"
                                    data-resizable="true"
                                    data-show-export="true"
                                    data-toolbar="#toolbar"
                                    >
                                    
                                    <thead>
                                        <tr>
                                            <th data-field="IdCompetency">ID</th>
                                            <th data-field="Name">{{ __('Name') }}</th>
                                            <th data-field="Description">{{ __('Description') }}</th>
                                            <th data-field="btns">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($competencies as $competency)
                                        <tr>
                                            <td>{{ $competency->IdCompetency }}</td>
                                            <td>{{ $competency->Name }}</td>
                                            <td>{{ $competency->Description }}</td>
                                            <td>
                                                @can('tiene-permiso','Competencias+Cambiar Estado')
                                                    &nbsp;
                                                    @if($competency->Enabled == 'E')
                                                        <a href="{{ url('/competencias/cambiar-estatus/'.$competency->IdCompetency) }}" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i></a>
                                                    @else
                                                        <a href="{{ url('/competencias/cambiar-estatus/'.$competency->IdCompetency) }}" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i></a>
                                                    @endif
                                                @else
                                                    &nbsp;
                                                    @if($competency->Enabled == 'E')
                                                        <button title="Desacivar" class="btn btn-custon-four btn-success btn-xs" disabled><i class="far fa-check-circle" style="color: white;"></i></button>
                                                    @else
                                                        <button title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;" disabled></i></a>
                                                    @endif    
                                                @endcan
                                                @can('tiene-permiso','Competencias+Editar')
                                                    &nbsp;
                                                    <a href="{{ url('/competencias/editar/'.$competency->IdCompetency) }}" title="Editar" class="btn btn-custon-four btn-primary btn-xs">
                                                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                                                    </a>
                                                    &nbsp;
                                                    <button title="Competencias" class="btn btn-custon-four btn-warning btn-xs componentes" type="button" idCompetency="{{ $competency->IdCompetency }}" data-toggle="modal" data-target="#PrimaryModalalert">
                                                        <i class="fa fa-window-restore" aria-hidden="true"  style="color: white;"></i>
                                                    </button>
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

    @include('competencias.modals')
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('#table').bootstrapTable();
        });
        var cant = 0;

        $(document).on('click', '.componentes', function(event) {
            var id = $(this).attr('idCompetency');
            $('#parent').val(id);
            $.ajax({
                url: '{{ url('competencias/get-childs') }}/'+id,
            })
            .done(function(resp) {
                 cant = resp.length;
                if (resp.length > 0) {
                    $('#listado').show('slow');
                    $('#form-crear').hide('fast');
                    $('#body-table').html('');
                    $.each(resp, function(index, val) {
                        $('#body-table').append(`<tr>
                            <td>`+val.Name+`</td>
                            <td>`+val.Description+`</td>
                            <td><button class="btn btn-xs btn-primary edit-cp" idC="`+val.IdCompetency+`" nameC="`+val.Name+`" desC="`+val.Description+`" idScale="`+val.IdScale+`">Editar</button></td>
                            </tr>`);
                    });
                }else{
                    $('#form-crear').show('slow');
                }
            });

        }).on('click', '.crear-componente', function(event) {
            $('#listado').hide('slow');
            $('#form-crear').show('slow');
        }).on('click', '.edit-cp', function(event) {
            var urlEdit = "{{ url('/competencias/editar') }}/"+$(this).attr('idC');
            console.log("urlEdit", urlEdit);
            $('#form-crear').show('slow');
            $('#listado').hide('fast');
            $('#form-crear').attr('action', urlEdit);
            $('#name').val($(this).attr('nameC'));
            $('#description').val($(this).attr('desC'));
            var idScale = $(this).attr('idScale');
            console.log("idScale", idScale);
            $("#scale option").each(function(index, el) {
                console.log("el", $(el).val());
                if ($(el).val()== idScale ) {
                    $(el).attr('selected', true);
                }
            });
            
        }).on('click', '#cancelar', function(event) {
            console.log("cant", cant);
            if (cant > 0) {
                $('#listado').show('slow');
                $('#form-crear').hide('fast');

            }
            
        });

        
    </script>      
@endsection
