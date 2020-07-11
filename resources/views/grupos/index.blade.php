@extends('layouts.master')

@section('content')
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Listado de Grupos</h1>
                            </div>
                        </div>
                        <div class="tree-viewer-area mg-b-15">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="sparkline10-list sparkel-pro-mg-t-30 shadow-reset">
                                            <div class="sparkline10-graph">
                                                <div class="edu-content">
                                                    <div id="using_json"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6" id="crear-grupo" @if(null != old('id')) style="display: none" @endif>
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Crear nuevo Grupo</h1>
                            </div>
                        </div>
                        <div class="tree-viewer-area mg-b-15">
                            <div class="container-fluid">
                                <div class="row">
                                	<form action="{{ route('grupos.crear') }}" method="POST">
                                		@csrf
                                    
	                                    <div class="col-xs-12">
	                                    	<div class="form-group-inner @error('name') input-with-error @enderror">
	                                    		<input name="name" type="text" class="form-control" placeholder="Nombre del grupo" value="{{ old('name') }}">
	                                    		@error('name')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
	                                        </div>

	                                        <div class="form-group-inner @error('description') input-with-error @enderror">
	                                            <input name="description" type="textarea" class="form-control" placeholder="Descripción" value="{{ old('description') }}">
	                                            @error('description')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
	                                        </div>

	                                        <div class="form-group-inner @error('parent') input-with-error @enderror">
	                                            <select name="parent" class="form-control">
	                                                <option value="0" selected>Grupo padre</option>
	                                                @foreach($groups as $group)
	                                                <option value="{{ $group->IdGroup }}">{{ $group->Name }}</option>
                                                    @endforeach
	                                            </select>
	                                            @error('parent')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
	                                        </div>
	                                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
	                                    </div>
	                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6" id="editar-grupo" @if(null == old('id')) style="display: none" @endif>
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Editar Grupo</h1>
                            </div>
                        </div>
                        <div class="tree-viewer-area mg-b-15">
                            <div class="container-fluid">
                                <div class="row">
                                    <form action="" method="POST" id="form-editar">
                                        @csrf
                                        <input type="hidden" name="id" id="edit-id" value="{{ old('id') }}">
                                    
                                        <div class="col-xs-12">
                                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                                <input name="name" type="text" class="form-control" placeholder="Nombre del grupo" value="{{ old('name') }}" id="edit-name">
                                                @error('name')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group-inner @error('description') input-with-error @enderror">
                                                <input name="description" type="textarea" class="form-control" placeholder="Descripción" value="{{ old('description') }}" id="edit-description">
                                                @error('description')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group-inner @error('parent') input-with-error @enderror">
                                                <select name="parent" class="form-control" id="edit-parent">
                                                    <option value="0" selected>Grupo padre</option>
                                                    @foreach($groups as $group)
                                                    <option value="{{ $group->IdGroup }}">{{ $group->Name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('parent')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                                            <input type="reset" value="Cancelar" id="btn-cancel" class="btn btn-default btn-block">
                                        </div>
                                    </form>
                                </div>
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
<!-- Tree-Line
        ============================================ -->
<script src="{{ asset('js/tree-line/jstree.min.js') }}"></script>


<script type="text/javascript">
	$(document).ready(function() {



        $('#using_json').jstree({
            'core' : {
                'data' : [
                    @foreach($groups as $group)
                        @if($group->IdGroupParent == 0)
                            <?php $hijos = \App\Group::where('IdGroupParent',$group->IdGroup)->get() ?>
                            @if(count($hijos) == 0)
                                {!! "{'text': '$group->Name', 'icon': 'none'}," !!}
                            @else
                                {!! "{'text': '$group->Name','children': [" !!}
                                @foreach($hijos as $hijo)

                                    <?php $hijos1 = \App\Group::where('IdGroupParent',$hijo->IdGroup)->get() ?>
                                    @if(count($hijos1) == 0)
                                        {!! "{'text': '$hijo->Name', 'icon': 'none' }," !!}
                                    @else
                                        {!! "{'text': '$hijo->Name','children': [" !!}
                                        @foreach($hijos1 as $hijo2)
                                            {!! "{'text': '$hijo2->Name', 'icon': 'none' }," !!}
                                        @endforeach
                                        {!! "]}," !!}
                                    @endif
                                @endforeach
                                
                            {!! "]}," !!}
                            @endif
                            
                        @endif
                    @endforeach
                ]
            }
        });

        

        $(document).on('click', '.jstree-anchor', function(event) {
            event.preventDefault();
            var name = $(this).text();
            console.log("name", name);
            $('#crear-grupo').hide('fast');
            $('#editar-grupo').show('fast');

            $.ajax({
                url: '{{ url('/grupos/get-name') }}/'+name,
                type: 'GET',
            })
            .done(function(resp) {
                console.log("resp", resp);
                $('#form-editar').attr('action', '{{ url('/grupos/editar') }}/'+ resp.group['IdGroup']);
                $('#edit-id').val(resp.group['IdGroup']);
                $('#edit-name').val(resp.group['Name']);
                $('#edit-description').val(resp.group['Description']);

                if (resp.group['IdGroupParent'] == 0) {
                    $('#edit-parent').html('<option value="0" selected>Grupo Padre</option>');
                }else{
                    $('#edit-parent').html('<option value="0">Grupo Padre</option>');
                }

                $.each(resp.groups, function(index, val) {
                    if (resp.group['IdGroupParent'] == val.IdGroup) {
                        $('#edit-parent').append('<option value="'+val.IdGroup+'" selected>'+val.Name+'</option>');
                    }else{
                        $('#edit-parent').append('<option value="'+val.IdGroup+'">'+val.Name+'</option>');
                    }
                });
            });
        }).on('click', '#btn-cancel', function(event) {
            $('#crear-grupo').show('fast');
            $('#editar-grupo').hide('fast');
        });


    });

</script>
@endsection