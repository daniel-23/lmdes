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
    <span class="bread-blod">{{ __('Edit') }}</span>
</li>
@endsection
@section('content')
	<div class="single-pro-review-area mt-t-30 mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#general">{{ __('General Information') }}</a></li>
                            <li><a href="#regional">{{ __('Regional Configuration and courses') }}</a></li>
                        </ul>
                        <form action="{{ route('companies.editar',$company->IdCompany) }}" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" style="border: 0 !important;" method="POST" enctype="multipart/form-data">
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
                                                                <input name="name" type="text" class="form-control" placeholder="{{ __('Institution') }}" value="{{ old('name',$company->Name) }}">
                                                                @error('name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group @error('email') input-with-error @enderror">
                                                                <input name="email" type="text" class="form-control" placeholder="{{ __('Email') }}" value="{{ old('email',$company->Email) }}">
                                                                @error('email')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('web_site') input-with-error @enderror">
                                                                <input name="web_site" type="text" class="form-control" placeholder="{{ __('Website') }}" value="{{ old('web_site',$company->WebSite) }}">
                                                                @error('web_site')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('contact_name') input-with-error @enderror">
                                                                <input name="contact_name" type="text" class="form-control" placeholder="{{ __('Contact Name') }}" value="{{ old('contact_name',$company->ContactName) }}">
                                                                @error('contact_name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            
    														<div class="form-group-inner @error('type') input-with-error @enderror">
                                                                <select name="type" class="form-control">
                                                                    @foreach($types as $type)
																		if(is_null(old('type'))){
																			<option value="{{ $type->IdCompanyType }}" {{ $company->IdCompanyType == $type->IdCompanyType ? 'selected' : '' }}>{{ $type->Name }}</option>
																		}else{
																			<option value="{{ $type->IdCompanyType }}" {{ old('type') == $type->IdCompanyType ? 'selected' : '' }}>{{ $type->Name }}</option>
																		}
                                                                        
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
                                                                        <input type="text" id="prepend-small-btn" placeholder="{{ __('No file selected') }}">
                                                                        @error('logo')
                                                                        <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner @error('appearance') input-with-error @enderror">
                                                                <select name="appearance" class="form-control">
                                                                    <option value="none" disabled="">{{ __('Select appearance') }}</option>
																	@if(is_null(old('appearance')))
																		<option value="azul" {{ $paramater->Appearance == 'azul' ? 'selected' : '' }}>Azul</option>
																		<option value="verde" {{ $paramater->Appearance == 'verde' ? 'selected' : '' }}>Verde</option>
																		<option value="naranja" {{ $paramater->Appearance == 'naranja' ? 'selected' : '' }}>Naranja</option>
																		<option value="gris" {{ $paramater->Appearance == 'gris' ? 'selected' : '' }}>Gris</option>
																		<option value="rojo" {{ $paramater->Appearance == 'rojo' ? 'selected' : '' }}>Rojo</option>
																	@else
																		<option value="azul" {{ old('appearance') == 'azul' ? 'selected' : '' }}>Azul</option>
																		<option value="verde" {{ old('appearance') == 'verde' ? 'selected' : '' }}>Verde</option>
																		<option value="naranja" {{ old('appearance') == 'naranja' ? 'selected' : '' }}>Naranja</option>
																		<option value="gris" {{ old('appearance') == 'gris' ? 'selected' : '' }}>Gris</option>
																		<option value="rojo" {{ old('appearance') == 'rojo' ? 'selected' : '' }}>Rojo</option>

																	@endif
                                                                </select>
                                                                @error('appearance')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    														
    														
                                                            
                                                            <div class="form-group-inner @error('max_size_file') input-with-error @enderror">
                                                                <input name="max_size_file" type="number" class="form-control" placeholder="{{ __('Max File Size (in MB)') }}" value="{{ old('max_size_file',$company->MaxSizeFile) }}">
                                                                @error('max_size_file')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
    														<div class="form-group-inner @error('max_users') input-with-error @enderror">
                                                                <input name="max_users" type="number" class="form-control" placeholder="{{ __('Max Users') }}" value="{{old('max_users',$company->MaxUsers)}}">
                                                                @error('max_users')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
    														<div class="form-group-inner @error('max_disc_space') input-with-error @enderror">
                                                                <input name="max_disc_space" type="number" class="form-control" placeholder="{{ __('Max Disc space (in MB)') }}" value="{{ old('max_disc_space',$company->MaxDiscSpace) }}">
                                                                @error('max_disc_space')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>                                                            
                                                            <div class="form-group-inner @error('email_server') input-with-error @enderror">
                                                                <input name="email_server" type="text" class="form-control" placeholder="{{ __('Email Server') }}" value="{{ old('email_server',$paramater->Emailserver) }}">
                                                                @error('email_server')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('email_sender') input-with-error @enderror">
                                                                <input name="email_sender" type="text" class="form-control" placeholder="{{ __('Email Sender') }}" value="{{ old('email_sender',$paramater->EmailSender) }}">
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
																		<option @if(is_null(old('country'))) selected @endif disabled>{{ __('Select Country') }}</option>
                                                                        @foreach($countries as $country)
                                                                        @if(is_null(old('country')))
                                                                            <option value="{{ $country->IdCountry }}" {{ $countrySelect->IdCountry == $country->IdCountry ? 'selected' : '' }}>{{ $country->Name }}</option>
                                                                        @else
                                                                            <option value="{{ $country->IdCountry }}" {{ old('country') == $country->IdCountry ? 'selected' : '' }}>{{ $country->Name }}</option>
                                                                        @endif
                                                                            
                                                                        @endforeach
                                                                    </select>
                                                                    @error('country')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="state" class="form-control" id="estado">
																		<option value="" selected disabled>{{ __('Select State') }}</option>
                                                                        @foreach($states as $state)
                                                                        @if(is_null(old('states')))
                                                                            <option value="{{ $state->IdState }}" {{ $stateSelect->IdState == $state->IdState ? 'selected' : '' }}>{{ $state->Name }}</option>
                                                                        @else
                                                                            <option value="{{ $state->IdState }}" {{ old('state') == $state->IdState ? 'selected' : '' }}>{{ $state->Name }}</option>
                                                                        @endif
                                                                            
                                                                        @endforeach
																	</select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="city" class="form-control" id="ciudad">
																		<option value="" selected disabled>{{ __('Select City') }}</option>
                                                                        @foreach($cities as $city)
                                                                        @if(is_null(old('city')))
                                                                            <option value="{{ $city->IdCity }}" {{ $citySelect->IdCity == $city->IdCity ? 'selected' : '' }}>{{ $city->Name }}</option>
                                                                        @else
                                                                            <option value="{{ $city->IdCity }}" {{ old('city') == $city->IdCity ? 'selected' : '' }}>{{ $city->Name }}</option>
                                                                        @endif
                                                                            
                                                                        @endforeach
                                                                    </select>
                                                                </div>
    															<div class="form-group-inner @error('currency') input-with-error @enderror">
                                                                    <select name="currency" class="form-control">
                                                                        <option @if(is_null(old('currency'))) selected @endif disabled>{{ __('Select Currency') }}</option>

                                                                        @foreach($currencies as $currency)
                                                                            @if(is_null(old('currency')))
                                                                                <option value="{{ $currency->IdCurrency }}" {{ $regional->IdCurrency == $currency->IdCurrency ? 'selected' : '' }}>{{ $currency->Name }}</option>

                                                                            @else
                                                                                <option value="{{ $currency->IdCurrency }}" {{ old('currency') == $currency->IdCurrency ? 'selected' : '' }}>{{ $currency->Name }}</option>
                                                                            @endif
                                                                            
                                                                        @endforeach
                                                                    </select>
                                                                    @error('currency')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group-inner @error('language') input-with-error @enderror">
                                                                    <select name="language" class="form-control">
                                                                        <option @if(is_null(old('language'))) selected @endif disabled> {{ __('Select Language') }}</option>
                                                                        @foreach($languages as $language)
                                                                            @if(is_null(old('language')))
                                                                                <option value="{{ $language->IdLanguage }}" {{ $regional->IdLanguage == $language->IdLanguage ? 'selected' : '' }}>{{ $language->Name }}</option>
                                                                            @else
                                                                                <option value="{{ $language->IdLanguage }}" {{ old('language') == $language->IdLanguage ? 'selected' : '' }}>{{ $language->Name }}</option>
                                                                            @endif
                                                                            
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
                                                                    <option @if(is_null(old('timezone'))) selected @endif disabled>{{ __('Select Timezone') }}</option>
                                                                    @foreach($timeZones as $timeZone)
                                                                        @if(is_null(old('timezone')))
                                                                            <option value="{{ $timeZone->IdTimeZone }}" {{ $regional->IdTimeZone == $timeZone->IdTimeZone ? 'selected' : '' }}>{{ $timeZone->Name }}</option>
                                                                        @else
                                                                            <option value="{{ $timeZone->IdTimeZone }}" {{ old('timezone') == $timeZone->IdTimeZone ? 'selected' : '' }}>{{ $timeZone->Name }}</option>
                                                                        @endif
                                                                        
                                                                    @endforeach
                                                                </select>
                                                                @error('timezone')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('course_format') input-with-error @enderror">
                                                                <select name="course_format" class="form-control">
                                                                    <option @if(is_null(old('course_format'))) selected @endif disabled>{{ __('Select Course Format') }}</option>

                                                                    @if(is_null(old('course_format')))
                                                                        <option value="cuadriculas" {{ $paramaterCourse->CourseFormat == 'cuadriculas' ? 'selected' : '' }}>{{ __('Cuadriculas') }}</option>
                                                                        <option value="pestañas" {{ $paramaterCourse->CourseFormat == 'pestañas' ? 'selected' : '' }}>{{ __('Pestañas') }}</option>
                                                                    @else
                                                                        <option value="cuadriculas" {{ old('course_format') == 'cuadriculas' ? 'selected' : '' }}>{{ __('Cuadriculas') }}</option>
                                                                        <option value="pestañas" {{ old('course_format') == 'pestañas' ? 'selected' : '' }}>{{ __('Pestañas') }}</option>
                                                                    @endif

                                                                    
                                                                </select>
                                                                @error('course_format')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('max_courses_number') input-with-error @enderror">
                                                                <input name="max_courses_number" type="number" class="form-control" placeholder="{{ __('Max Courses Number') }}" value="{{ old('max_courses_number',$paramaterCourse->MaxCoursesNumber) }}">
                                                                @error('max_courses_number')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
															<div class="form-group-inner @error('max_modules_number') input-with-error @enderror">
                                                                <input name="max_modules_number" type="number" class="form-control" placeholder="{{ __('Max Modules Number') }}" value="{{ old('max_modules_number',$paramaterCourse->MaxModulesNumber) }}">
                                                                @error('max_modules_number')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
															<div class="form-group-inner @error('course_duration') input-with-error @enderror">
                                                                <input name="course_duration" type="number" class="form-control" placeholder="{{ __('Course duration (in days)') }}" value="{{ old('course_duration',$paramaterCourse->CourseDuration) }}">
                                                                @error('course_duration')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" style="margin-top: 20px;">{{ __('Save') }}</button>
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