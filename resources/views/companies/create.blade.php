@extends('layouts.master')

@section('content')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @include('layouts.header')
        

        @if (session('success'))
            <div class="alert alert-success" role="alert" style="margin: 0 10px 10px 10px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#general">Información General</a></li>
                                <li><a href="#regional">Configuración regional y cursos</a></li>
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
                                                                <!--<div class="form-group">
                                                                    <input name="finish" id="finish" type="text" class="form-control" placeholder="Date of Birth">
                                                                </div>-->
                                                                <!--div class="form-group">
                                                                    <input name="postcode" id="postcode" type="text" class="form-control" placeholder="Código postal">
                                                                </div-->
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
                                                                <div class="form-group alert-up-pd">
                                                                    <div class="dz-message needsclick download-custom">
                                                                        <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                        <h2 class="edudropnone">Arrastre su logo o haz clic aquí para subir.</h2>
                                                                        <p class="edudropnone"><span class="note needsclick">(This is just a demo dropzone. Selected image is <strong>not</strong> actually uploaded.)</span>
                                                                        </p>
                                                                        <input name="imageico" class="hd-pro-img" type="text" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group-inner">
                                                                    <select name="Apariencia" class="form-control">
                                                                            <option value="none" selected="" disabled="">Seleccionar Apariencia</option>
                                                                            <option value="0">Azul</option>
                                                                            <option value="1">Verde</option>
                                                                            <option value="2">Naranja</option>
                                                                            <option value="3">Gris</option>
                                                                            <option value="4">Rojo</option>
                                                                        </select>
                                                                </div>


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
                                                                <div class="form-group">
                                                                    <input name="emailsender" type="text" class="form-control" placeholder="Correo para envío de notificaciones">
                                                                </div>
                                                                <div class="i-checks pull-left">
                                                                <label>
                                                                    <input type="checkbox" value="" checked=""> <i></i> Activar notificaciones</label>
                                                                </div>
                                                            </div>
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
                                <div class="product-tab-list tab-pane fade" id="regional">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="devit-card-custom">
                                                                <div class="form-group">
                                                                    <select name="Pais" class="form-control">
                                                                            <option value="none" selected="" disabled="">Seleccionar País</option>
                                                                            <option value="0">India</option>
                                                                            <option value="1">Pakistan</option>
                                                                            <option value="2">Amerika</option>
                                                                            <option value="3">China</option>
                                                                            <option value="4">Dubai</option>
                                                                            <option value="5">Nepal</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="Estado" class="form-control">
                                                                            <option value="none" selected="" disabled="">Seleccionar Estado</option>
                                                                            <option value="0">Gujarat</option>
                                                                            <option value="1">Maharastra</option>
                                                                            <option value="2">Rajastan</option>
                                                                            <option value="3">Maharastra</option>
                                                                            <option value="4">Rajastan</option>
                                                                            <option value="5">Gujarat</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="Ciudad" class="form-control">
                                                                            <option value="none" selected="" disabled="">Seleccionar Ciudad</option>
                                                                            <option value="0">Surat</option>
                                                                            <option value="1">Baroda</option>
                                                                            <option value="2">Navsari</option>
                                                                            <option value="3">Baroda</option>
                                                                            <option value="4">Surat</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="currency" class="form-control">
                                                                            <option value="none" selected="" disabled="">Seleccionar Moneda</option>
                                                                            <option value="0">COP $</option>
                                                                            <option value="1">USD $</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="language" class="form-control">
                                                                            <option value="none" selected="" disabled="">Seleccionar Idioma</option>
                                                                            <option value="0">Es-co</option>
                                                                            <option value="1">En-us</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="timezone" class="form-control">
                                                                            <option value="none" selected="" disabled="">Seleccionar Zona horaria</option>
                                                                            <option value="0">(UTC-05:00) Bogotá, Lima, Quito</option>
                                                                            <option value="1">(UTC-04:00) Georgetown, La Paz, Manao, San Juan</option>
                                                                            <option value="2">(UTC-03:00) Buenos Aires, Cayena, Fortaleza</option>
                                                                            <option value="3">(UTC-01:00) Islas de Cabo Verde</option>
                                                                            <option value="4">(UTC + 08:00) Pekín, Chongqing, Hong Kong, Urumqi</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="devit-card-custom">
                                                                <div class="form-group">
                                                                    <select name="formatcourse" class="form-control">
                                                                            <option value="none" selected="" disabled="">Seleccionar Formato de cursos</option>
                                                                            <option value="0">Pestañas</option>
                                                                            <option value="1">Cuadrícula</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="maxcoursenumber" type="text" class="form-control" placeholder="Número Máximo de cursos">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="maxmodulesnumber" type="text" class="form-control" placeholder="Número Máximo de módulos por curso">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="courseduration" type="text" class="form-control" placeholder="Duración del curso (en días)">
                                                                </div>
                                                        </div>
                                                    </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
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
                </div>
            </div>
        </div>
            
            



        @include('layouts.footer')
    </div>
@endsection

