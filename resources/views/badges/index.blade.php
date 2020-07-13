@extends('layouts.master')

@section('content')
	<div class="product-status mg-b-50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="product-status-wrap">
						<h4>Listado de insignias</h4>
						<div class="asset-inner">
							<table>
								<thead>
									<tr>
	                                    <th>Insignia</th>
	                                    <th>Nombre</th>
	                                    <th>Opciones</th>
	                                </tr>
								</thead>
								<tbody>
									@foreach($badges as $badge)
									<tr>
										<td>
											<img src="{{ asset('storage/'.$badge->Image) }}" alt="{{ $badge->Name }}" />
										</td>
										<td>{{ $badge->Name }}</td>
										<td>
											<button title="Edit" class="pd-setting-ed edit-badge" badge-id="{{ $badge->IdBadge }}"
											badge-name="{{ $badge->Name }}"
											badge-des="{{ $badge->Description }}"
											badge-img="{{ $badge->Image }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        	<!--button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button-->
										</td>

									</tr>
									@endforeach
								</tbody>
                            </table>
                        </div>
                        <div class="custom-pagination">
                        	{{ $badges->links() }}
							<!--ul class="pagination">
								<li class="page-item"><a class="page-link" href="#">Previous</a></li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">Next</a></li>
							</ul-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  @if(!is_null(old('id')))style="display: none;"@endif id="div-create">
                	<div class="sparkline12-hd">
                		<div class="main-sparkline12-hd">
                			<h1>Crear nueva insignia</h1>
                		</div>
                	</div>
                	<form action="{{ route('badges.create') }}" method="POST" enctype="multipart/form-data">
                		@csrf
                		<div class="form-group-inner @error('name') input-with-error @enderror">
	                		<input name="name" type="text" class="form-control" placeholder="Nombre de la insignia">
	                		@error('name')
	                		<span class="help-block small" style="color: red;">{{ __($message) }}</span>
	                		@enderror
	                	</div>
	                	<div class="form-group-inner @error('description') input-with-error @enderror">
	                		<input name="description" type="text" class="form-control" placeholder="Descripción">
	                		@error('description')
	                		<span class="help-block small" style="color: red;">{{ __($message) }}</span>
	                		@enderror
	                	</div>
	                	
	                	<div class="form-group-inner @error('image') input-with-error @enderror">
                            <div class="file-upload-inner ts-forms">
                                <div class="input prepend-small-btn">
                                    <div class="file-button">
                                        Browse
                                        <input type="file" onchange="document.getElementById('prepend-small-btn').value = this.value;" accept="image/*" name="image">
                                    </div>
                                    <input type="text" id="prepend-small-btn" placeholder="no file selected">
                                    @error('image')
                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                	</form>

	                	
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" @if(is_null(old('id')))style="display: none;"@endif id="div-edit">
                	<div class="sparkline12-hd">
                		<div class="main-sparkline12-hd">
                			<h1>Editar insignia</h1>
                		</div>
                	</div>
                	<form action="" method="POST" enctype="multipart/form-data" id="form-edit">
                		@csrf
                		<input type="hidden" name="id" id="edit-id">
                		<div class="form-group-inner @error('name') input-with-error @enderror">
	                		<input name="name" type="text" class="form-control" placeholder="Nombre de la insignia" id="edit-name">
	                		@error('name')
	                		<span class="help-block small" style="color: red;">{{ __($message) }}</span>
	                		@enderror
	                	</div>
	                	<div class="form-group-inner @error('description') input-with-error @enderror">
	                		<input name="description" type="text" class="form-control" placeholder="Descripción" id="edit-description">
	                		@error('description')
	                		<span class="help-block small" style="color: red;">{{ __($message) }}</span>
	                		@enderror
	                	</div>
	                	
	                	<div class="form-group-inner @error('image') input-with-error @enderror">
                            <div class="file-upload-inner ts-forms">
                                <div class="input prepend-small-btn">
                                    <div class="file-button">
                                        Browse
                                        <input type="file" onchange="document.getElementById('prepend-small-btn-edit').value = this.value;" accept="image/*" name="image" id="edit-image">
                                    </div>
                                    <input type="text" id="prepend-small-btn-edit" placeholder="no file selected">
                                    @error('image')
                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                        <input type="reset" value="Cancelar" id="btn-cancel" class="btn btn-default btn-block">
                	</form>	
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
			$(document).on('click', '.edit-badge', function(event) {
				event.preventDefault();
				$('#div-create').hide('fast');
				$('#div-edit').show('slow');
				

				$('#form-edit').attr('action', '{{ url('/badges/edit') }}/'+$(this).attr('badge-id'));
				$('#edit-id').val($(this).attr('badge-id'));
				$('#edit-name').val($(this).attr('badge-name'));
				$('#edit-description').val($(this).attr('badge-des'));
				$('#prepend-small-btn-edit').val($(this).attr('badge-img'));
				
			}).on('click', '#btn-cancel', function(event) {
				$('#div-edit').hide('fast');
				$('#div-create').show('slow');
			});
		});
	</script>
@endsection