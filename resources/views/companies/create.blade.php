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
                            <!--li><a href="#regional">Configuración regional y cursos</a></li-->
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="general">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                <form action="{{ route('companies.crear') }}" method="POST" class="dropzone dropzone-custom needsclick add-professors">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                                                <input name="name" id="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Institución">
                                                                @error('name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('email') input-with-error @enderror">
                                                                <input name="email" id="email" value="{{ old('email') }}" type="text" class="form-control" placeholder="Email">
                                                                @error('email')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                          

                                                            <div class="form-group-inner @error('web_site') input-with-error @enderror">
                                                                <input name="web_site" id="web_site" value="{{ old('web_site') }}" type="text" class="form-control" placeholder="{{ __('Web Site') }}">
                                                                @error('web_site')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('contact_name') input-with-error @enderror">
                                                                <input name="contact_name" id="contact_name" value="{{ old('contact_name') }}" type="text" class="form-control" placeholder="{{ __('Contact Name') }}">
                                                                @error('contact_name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            
                                                            <div class="form-group @error('type') input-with-error @enderror">
                                                                <select name="type" id="type" class="form-control">
                                                                    <option value="" selected disabled>Seleccionar tipo de institución</option>
                                                                    @foreach($types as $type)
                                                                    <option value="{{ $type->IdCompanyType }}" {{ old('type') == $type->IdCompanyType ? 'selected' : '' }}>{{ $type->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('type')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group-inner @error('db_name') input-with-error @enderror">
                                                                <input name="db_name" id="db_name" value="{{ old('db_name') }}" type="text" class="form-control" placeholder="Nombre base de datos">
                                                                @error('db_name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('db_user') input-with-error @enderror">
                                                                <input name="db_user" id="db_user" value="{{ old('db_user') }}" type="text" class="form-control" placeholder="{{ __('Database User') }}">
                                                                @error('db_user')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('db_password') input-with-error @enderror">
                                                                <input type="password" class="form-control" name="db_password" id="db_password" placeholder="{{ __('Database Password') }}">
                                                                @error('db_password')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('max_size_file') input-with-error @enderror">
                                                                <input type="text" class="form-control" name="max_size_file" id="max_size_file" value="{{ old('max_size_file') }}" placeholder="Tamaño máximo archivos (en MB)">
                                                                @error('max_size_file')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('max_users') input-with-error @enderror">
                                                                <input type="text" class="form-control" name="max_users" id="max_users" value="{{ old('max_users') }}" placeholder="{{ __('Max Users') }}">
                                                                @error('max_users')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('max_disc_space') input-with-error @enderror">
                                                                <input type="text" class="form-control" name="max_disc_space" id="max_disc_space" value="{{ old('max_disc_space') }}" placeholder="Capacidad máxima de almacenamiento (en MB)">
                                                                @error('max_disc_space')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>                                                            
                                                        </div>
                                                        <p>&nbsp;</p>
                                                        <div class="form-group-inner" style="margin-top: 10px !important;">
                                                            <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                            <a href="{{ route('companies') }}" class="btn btn-custon-four btn-default pull-right">
                                                                <i class="fas fa-times-circle"></i>
                                                                {{ __('Cancel') }}
                                                            </a>
                                                        </div>
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
            </div>
        </div>
    </div>
@endsection