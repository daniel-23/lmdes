@extends('layouts.master')

@section('content')
    <div class="basic-form-area mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>{{ __('Parameters Generals') }}</h1>

                            </div>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ __(session('success')) }}
                                </div>
                            @endif
                            
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="{{ url("/companies/parameters/$id") }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">

                                                        <div class="form-group-inner @error('Logo') input-with-error @enderror">
                                                            <div class="file-upload-inner ts-forms">
                                                                <div class="input prepend-big-btn">
                                                                    <label class="icon-right" for="prepend-big-btn">
                                                                        <i class="fa fa-download"></i>
                                                                    </label>
                                                                    <div class="file-button">
                                                                        Browse
                                                                        <input type="file"  name="Logo" onchange="document.getElementById('Logo').value = this.value;">
                                                                    </div>
                                                                
                                                                    <input type="text" class="form-control" id="Logo" value="{{ old('Logo') ?? $paramater->Logo }}" placeholder="{{ __('Logo') }}">
                                                                    @error('Logo')
                                                                        <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('Appearance') input-with-error @enderror">
                                                            <select name="Appearance" class="form-control">
                                                                <option value="" selected="" disabled="">Seleccionar Apariencia</option>
                                                                <option value="azul">Azul</option>
                                                                <option value="verde">Verde</option>
                                                                <option value="naranja">Naranja</option>
                                                                <option value="gris">Gris</option>
                                                                <option value="rojo">Rojo</option>
                                                            </select>
                                                            @error('Appearance')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('Emailserver') input-with-error @enderror">
                                                            <input type="text" class="form-control" name="Emailserver" id="Emailserver" value="{{ old('Emailserver') ?? $paramater->Emailserver }}" placeholder="{{ __('Email Server') }}">
                                                            @error('Emailserver')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('EmailSender') input-with-error @enderror">
                                                            <input type="text" class="form-control" name="EmailSender" id="Email Sender" value="{{ old('EmailSender') ?? $paramater->EmailSender }}" placeholder="{{ __('Email Sender') }}">
                                                            @error('EmailSender')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('MaxSizeFile') input-with-error @enderror">
                                                            <input type="number" class="form-control" name="MaxSizeFile" id="MaxSizeFile" value="{{ old('MaxSizeFile') ?? $paramater->MaxSizeFile }}" placeholder="{{ __('Max File Size') }}">
                                                            @error('MaxSizeFile')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('ActivateNotifications') input-with-error @enderror">
                                                            <select name="ActivateNotifications" id="ActivateNotifications" class="form-control">
                                                                <option value="">{{ __('Activate Notifications') }}</option>
                                                                @if(is_null(old('ActivateNotifications')))
                                                                    <option value="Y" {{ $paramater->ActivateNotifications == 'Y' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                                                    <option value="N" {{ $paramater->ActivateNotifications == 'N' ? 'selected' : '' }}>{{ ('No') }}</option>
                                                                @else
                                                                    <option value="Y" {{ old('ActivateNotifications') == 'Y' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                                                    <option value="N" {{ old('ActivateNotifications') == 'N' ? 'selected' : '' }}>{{ __('No') }}</option>
                                                                @endif
                                                            </select>
                                                            
                                                            @error('ActivateNotifications')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    
                                                </div>


                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12">
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
@endsection