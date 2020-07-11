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
                                <h1>Listado de categorias</h1>
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

                <div class="col-sm-12 col-md-6" id="crear-categoria"  @if(null != old('id')) style="display: none" @endif>
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Crear nueva categoria</h1>
                            </div>
                        </div>
                        <div class="tree-viewer-area mg-b-15">
                            <div class="container-fluid">
                                <div class="row">
                                	<form action="{{ route('categorias.crear') }}" method="POST">
                                		@csrf
                                    
	                                    <div class="col-xs-12">
	                                    	<div class="form-group-inner @error('name') input-with-error @enderror">
	                                    		<input name="name" type="text" class="form-control" placeholder="Nombre de la categoría" value="{{ old('name') }}">
	                                    		@error('name')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
	                                        </div>

	                                        <!--div class="form-group-inner @error('code') input-with-error @enderror">
	                                    		<input name="code" type="text" class="form-control" placeholder="Código de la categoría" value="{{ old('code') }}">
	                                    		@error('code')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
	                                        </div-->

	                                        <div class="form-group-inner @error('description') input-with-error @enderror">
	                                            <input name="description" type="textarea" class="form-control" placeholder="Descripción" value="{{ old('description') }}">
	                                            @error('description')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
	                                        </div>
	                                        <div class="form-group-inner @error('icon') input-with-error @enderror">
	                                            <input name="icon" type="tex" class="form-control" placeholder="Icono" value="{{ old('icon') }}">
	                                            @error('icon')
	                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
	                                            @enderror
	                                        </div>

	                                        <div class="form-group-inner @error('parent') input-with-error @enderror">
	                                            <select name="parent" class="form-control">
	                                                <option value="0" selected>Categoría padre</option>
	                                                @foreach($categories as $category)
	                                                <option value="{{ $category->IdCourseCategory }}">{{ $category->Name }}</option>
                                                    @endforeach
	                                            </select>
	                                            @error('parent')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
	                                        </div>

	                                        <div class="form-group-inner @error('color') input-with-error @enderror">
	                                        	<div class="colorpicker-inner ts-forms mg-b-23">
		                                        	<div class="tsbox">
		                                        		<label class="label">&nbsp; </label>
		                                        		<label class="color-group" for="hex">
		                                        			<input type="text" name="color" placeholder="Color" id="hex" value="{{ old('color') }}" autocomplete="off">
		                                        			@error('color')
		                                        			<span class="help-block small" style="color: red;">{{ __($message) }}</span>
		                                        			@enderror
		                                        		</label>
		                                        	</div>
		                                        </div>
	                                        </div>
	                                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
	                                    </div>
	                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6" id="editar-categoria" @if(null == old('id')) style="display: none" @endif>
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Editar categoria</h1>
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
                                                <input name="name" type="text" id="edit-name" class="form-control" placeholder="Nombre de la categoría" value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
                                            </div>

                                            <!--div class="form-group-inner @error('code') input-with-error @enderror">
                                                <input name="code" type="text" class="form-control" placeholder="Código de la categoría" value="{{ old('code') }}">
                                                @error('code')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
                                            </div-->

                                            <div class="form-group-inner @error('description') input-with-error @enderror">
                                                <input name="description" id="edit-description" type="textarea" class="form-control" placeholder="Descripción" value="{{ old('description') }}">
                                                @error('description')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group-inner @error('icon') input-with-error @enderror">
                                                <input name="icon" id="edit-icon" type="tex" class="form-control" placeholder="Icono" value="{{ old('icon') }}">
                                                @error('icon')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group-inner @error('parent') input-with-error @enderror">
                                                <select name="parent" id="edit-parent" class="form-control">
                                                    <option value="0" selected>Categoría padre</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->IdCourseCategory }}">{{ $category->Name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('parent')
                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group-inner @error('color') input-with-error @enderror">
                                                <div class="colorpicker-inner ts-forms mg-b-23">
                                                    <div class="tsbox">
                                                        <label class="label">&nbsp; </label>
                                                        <label class="color-group" for="hex">
                                                            <input type="text" name="color" placeholder="Color" id="edit-color" value="{{ old('color') }}" autocomplete="off">
                                                            @error('color')
                                                            <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </label>
                                                    </div>
                                                </div>
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
<!--script src="{{ asset('js/tree-line/jstree.active.js') }}"></script-->
<!-- colorpicker JS
	============================================ -->
<script src="{{ asset('js/colorpicker/jquery.spectrum.min.js') }}"></script>
<script type="text/javascript">
    function decodeHTMLEntities(text) {
        var entities = [
            ['amp', '&'],
            ['apos', '\''],
            ['#x27', '\''],
            ['#x2F', '/'],
            ['#39', '\''],
            ['#47', '/'],
            ['lt', '<'],
            ['gt', '>'],
            ['nbsp', ' '],
            ['quot', '"']
        ];

        for (var i = 0, max = entities.length; i < max; ++i) 
            text = text.replace(new RegExp('&'+entities[i][0]+';', 'g'), entities[i][1]);

        return text;
    }
	$(document).ready(function() {
		$("#hex").spectrum({
			color: "{{ old('color','#f00') }}",
			preferredFormat: "hex",
			showInput: true
		});

        $("#edit-color").spectrum({
            color: "{{ old('color','#f00') }}",
            preferredFormat: "hex",
            showInput: true
        });
		$("#hex, #edit-color").show();

        $('#using_json').jstree({
            'core' : {
                'data' : [
                    @foreach($categories as $categoria)
                        @if($categoria->IdCourseCategoryParent == 0)
                            <?php $hijos = \App\Category::where('IdCourseCategoryParent',$categoria->IdCourseCategory)->get() ?>
                            @if(count($hijos) == 0)
                                {!! "{'text': '$categoria->Name', 'icon': 'none'}," !!}
                            @else
                                {!! "{'text': '$categoria->Name','children': [" !!}
                                @foreach($hijos as $hijo)


                                    <?php $hijos1 = \App\Category::where('IdCourseCategoryParent',$hijo->IdCourseCategory)->get() ?>
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
            $('#crear-categoria').hide('fast');
            $('#editar-categoria').show('fast');

            $.ajax({
                url: '{{ url('/cursos/categorias/get-name') }}/'+name,
                type: 'GET',
            })
            .done(function(resp) {
                console.log("resp", resp);
                $('#form-editar').attr('action', '{{ url('/cursos/categorias/editar/') }}/'+ resp.category['IdCourseCategory']);
                $('#edit-id').val(resp.category['IdCourseCategory']);
                $('#edit-name').val(resp.category['Name']);
                $('#edit-description').val(resp.category['Description']);
                $('#edit-icon').val(decodeHTMLEntities(resp.category['Icon']));
                $('#edit-color').val(resp.category['Color']);

                if (resp.category['IdCategoryParent'] == 0) {
                    $('#edit-parent').html('<option value="0" selected>Categoría Padre</option>');
                }else{
                    $('#edit-parent').html('<option value="0">Categoría Padre</option>');
                }

                $.each(resp.categories, function(index, val) {

                    if (resp.category['IdCourseCategoryParent'] == val.IdCourseCategory) {
                        $('#edit-parent').append('<option value="'+val.IdCourseCategory+'" selected>'+val.Name+'</option>');
                    }else{
                        $('#edit-parent').append('<option value="'+val.IdCourseCategory+'">'+val.Name+'</option>');
                    }
                });
            });
        }).on('click', '#btn-cancel', function(event) {
            $('#crear-categoria').show('fast');
            $('#editar-categoria').hide('fast');
        });
    });

</script>
@endsection