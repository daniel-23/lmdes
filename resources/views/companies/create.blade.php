@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Global Parameters') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <a href="{{ route('companies') }}">{{ __('Institutions') }}</a>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Create') }}</span>
</li>
@endsection
@section('content')
	<div class="single-pro-review-area mt-t-30 mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#general">Información General</a></li>
                            <li><a href="#regional">Configuración regional y cursos</a></li>
                        </ul>
                        <form action="{{ route('companies.crear') }}" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" style="border: 0 !important;" method="POST" enctype="multipart/form-data">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                
                                @csrf
                                <div class="product-tab-list tab-pane fade active in" id="general">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                                                <input name="name" type="text" class="form-control" placeholder="Institución" value="{{ old('name') }}">
                                                                @error('name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group @error('email') input-with-error @enderror">
                                                                <input name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                                                @error('email')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('web_site') input-with-error @enderror">
                                                                <input name="web_site" type="text" class="form-control" placeholder="Website" value="{{ old('web_site') }}">
                                                                @error('web_site')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('contact_name') input-with-error @enderror">
                                                                <input name="contact_name" type="text" class="form-control" placeholder="Nombre contacto" value="{{ old('contact_name') }}">
                                                                @error('contact_name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            
    														<div class="form-group-inner @error('type') input-with-error @enderror">
                                                                <select name="type" class="form-control">
    																<option @if(is_null(old('type'))) selected @endif disabled>Seleccionar tipo de institución</option>
                                                                    @foreach($types as $type)
                                                                        <option value="{{ $type->IdCompanyType }}" {{ old('type') == $type->IdCompanyType ? 'selected' : '' }}>{{ $type->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('type')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
    														<div class="form-group-inner @error('logo') input-with-error @enderror">
                                                                <div class="file-upload-inner ts-forms">
                                                                    <div class="input prepend-small-btn">
                                                                        <div class="file-button">
                                                                            Browse
                                                                            <input type="file" onchange="document.getElementById('prepend-small-btn').value = this.value;" accept="image/*" name="logo">
                                                                        </div>
                                                                        <input type="text" id="prepend-small-btn" placeholder="no file selected">
                                                                        @error('logo')
                                                                        <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner @error('appearance') input-with-error @enderror">
                                                                <select name="appearance" class="form-control">
                                                                    <option value="none" selected="" disabled="">Seleccionar Apariencia</option>
                                                                    <option value="azul">Azul</option>
                                                                    <option value="verde">Verde</option>
                                                                    <option value="naranja">Naranja</option>
                                                                    <option value="gris">Gris</option>
                                                                    <option value="rojo">Rojo</option>
                                                                </select>
                                                                @error('appearance')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('db_name') input-with-error @enderror">
                                                                <input name="db_name" type="text" class="form-control" placeholder="Nombre base de datos" value="{{ old('db_name') }}">
                                                                @error('db_name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    														
    														
                                                            <div class="form-group-inner @error('db_user') input-with-error @enderror">
                                                                <input name="db_user" type="text" class="form-control" placeholder="Usuario Base de datos" value="{{ old('db_user') }}">
                                                                @error('db_user')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('db_password') input-with-error @enderror">
                                                                <input name="db_password" type="password" class="form-control" placeholder="Contraseña Base de datos">
                                                                @error('db_password')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('max_size_file') input-with-error @enderror">
                                                                <input name="max_size_file" type="number" class="form-control" placeholder="Tamaño máximo archivos (en MB)" value="{{ old('max_size_file') }}">
                                                                @error('max_size_file')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
    														<div class="form-group-inner @error('max_users') input-with-error @enderror">
                                                                <input name="max_users" type="number" class="form-control" placeholder="Cantidad máxima de usuarios" value="{{old('max_users')}}">
                                                                @error('max_users')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
    														<div class="form-group-inner @error('max_disc_space') input-with-error @enderror">
                                                                <input name="max_disc_space" type="number" class="form-control" placeholder="Capacidad máxima de almacenamiento (en MB)" value="{{ old('max_disc_space') }}">
                                                                @error('max_disc_space')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>                                                            
                                                            <div class="form-group-inner @error('email_server') input-with-error @enderror">
                                                                <input name="email_server" type="text" class="form-control" placeholder="Servidor para envío de correos" value="{{ old('email_server') }}">
                                                                @error('email_server')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('email_sender') input-with-error @enderror">
                                                                <input name="email_sender" type="text" class="form-control" placeholder="Correo para envío de notificaciones" value="{{ old('email_sender') }}">
                                                                @error('email_sender')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="i-checks pull-left">
                                                                <label><input type="checkbox" value="on" checked name="activate_notifications"> <i></i> Activar notificaciones</label>
                                                            </div>
    													</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="regional">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="devit-card-custom">
    															<div class="form-group-inner @error('country') input-with-error @enderror">
                                                                    <select name="country" class="form-control" id="pais">
																		<option @if(is_null(old('country'))) selected @endif disabled>Seleccionar País</option>
                                                                        @foreach($countries as $country)
                                                                            <option value="{{ $country->IdCountry }}" {{ old('country') == $country->IdCountry ? 'selected' : '' }}>{{ $country->Name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('country')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="state" class="form-control" id="estado">
																		<option value="" selected disabled>Seleccionar Estado</option>
																	</select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="city" class="form-control" id="ciudad">
																		<option value="" selected disabled>Seleccionar Ciudad</option>
                                                                    </select>
                                                                </div>
    															<div class="form-group-inner @error('currency') input-with-error @enderror">
                                                                    <select name="currency" class="form-control">
                                                                        <option @if(is_null(old('currency'))) selected @endif disabled>Seleccionar Moneda</option>

                                                                        @foreach($currencies as $currency)
                                                                            <option value="{{ $currency->IdCurrency }}" {{ old('currency') == $currency->IdCurrency ? 'selected' : '' }}>{{ $currency->Name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('currency')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group-inner @error('language') input-with-error @enderror">
                                                                    <select name="language" class="form-control">
                                                                        <option @if(is_null(old('language'))) selected @endif disabled>Seleccionar Idioma</option>
                                                                        @foreach($languages as $language)
                                                                            <option value="{{ $language->IdLanguage }}" {{ old('language') == $language->IdLanguage ? 'selected' : '' }}>{{ $language->Name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('language')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                    @enderror
                                                                </div>
                                                                
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group-inner @error('timezone') input-with-error @enderror">
                                                                <select name="timezone" class="form-control">
                                                                    <option @if(is_null(old('timezone'))) selected @endif disabled>Seleccionar Zona horaria</option>
                                                                    @foreach($timeZones as $timeZone)
                                                                        <option value="{{ $timeZone->IdTimeZone }}" {{ old('timezone') == $timeZone->IdTimeZone ? 'selected' : '' }}>{{ $timeZone->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('timezone')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('course_format') input-with-error @enderror">
                                                                <select name="course_format" class="form-control">
                                                                    <option @if(is_null(old('course_format'))) selected @endif disabled>Seleccionar Formato de Cursos</option>
                                                                    <option value="cuadriculas" {{ old('course_format') == 'cuadriculas' ? 'selected' : '' }}>{{ __('Cuadriculas') }}</option>
                                                                    <option value="pestañas" {{ old('course_format') == 'pestañas' ? 'selected' : '' }}>{{ __('Pestañas') }}</option>
                                                                </select>
                                                                @error('course_format')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('max_courses_number') input-with-error @enderror">
                                                                <input name="max_courses_number" type="number" class="form-control" placeholder="Número Máximo de cursos" value="{{ old('max_courses_number') }}">
                                                                @error('max_courses_number')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
															<div class="form-group-inner @error('max_modules_number') input-with-error @enderror">
                                                                <input name="max_modules_number" type="number" class="form-control" placeholder="Número Máximo de módulos por curso" value="{{ old('max_modules_number') }}">
                                                                @error('max_modules_number')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
															<div class="form-group-inner @error('course_duration') input-with-error @enderror">
                                                                <input name="course_duration" type="number" class="form-control" placeholder="Duración del curso (en días)" value="{{ old('course_duration') }}">
                                                                @error('course_duration')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" style="margin-top: 20px;">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
    											</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#pais', function(event) {
                let id = $(this).val();
                if (id != '') {
                    $.ajax({
                        url: '{{ url('/estados/get-pais') }}/'+id,
                    })
                    .done(function(resp) {
                        console.log("resp.length", resp.length);
                        
                        if (resp.length > 0) {
                            $('#estado').html('<option value="" selected disabled>Seleccionar Estado</option>');
                            $.each(resp, function(index, val) {
                                 $('#estado').append('<option value="'+val.IdState+'">'+val.Name+'</option>');
                            });
                        }
                    });
                    
                }
            }).on('change', '#estado', function(event) {
                let id = $(this).val();
                if (id != '') {
                    $.ajax({
                        url: '{{ url('/ciudades/get-estado') }}/'+id,
                    })
                    .done(function(resp) {
                        console.log("resp.length", resp.length);
                        
                        if (resp.length > 0) {
                            $('#ciudad').html('<option value="" selected disabled>Seleccionar Ciudad</option>');
                            $.each(resp, function(index, val) {
                                 $('#ciudad').append('<option value="'+val.IdCity+'">'+val.Name+'</option>');
                            });
                        }
                    });
                    
                }
            });
        });
    </script>

@endsection