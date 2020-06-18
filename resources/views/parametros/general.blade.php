@extends('layouts.master')

@section('content')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @include('layouts.header')
        
        <div class="basic-form-area mg-b-15">
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
                                                <form action="{{ route('par-general') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('Logo') input-with-error @enderror">
                                                                <label for="Logo">{{ __('Logo') }}</label>
                                                                <input type="text" class="form-control" name="Logo" id="Logo" value="{{ old('Logo') ?? $paramater->Logo }}">
                                                                @error('Logo')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('Appearance') input-with-error @enderror">
                                                                <label for="Appearance">{{ __('Appearance') }}</label>
                                                                <input type="text" class="form-control" name="Appearance" id="Appearance" value="{{ old('Appearance') ?? $paramater->Appearance }}">
                                                                @error('Appearance')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('Emailserver') input-with-error @enderror">
                                                                <label for="Emailserver">{{ __('Email Server') }}</label>
                                                                <input type="text" class="form-control" name="Emailserver" id="Emailserver" value="{{ old('Emailserver') ?? $paramater->Emailserver }}">
                                                                @error('Emailserver')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('EmailSender') input-with-error @enderror">
                                                                <label for="EmailSender">{{ __('Email Sender') }}</label>
                                                                <input type="text" class="form-control" name="EmailSender" id="Email Sender" value="{{ old('EmailSender') ?? $paramater->EmailSender }}">
                                                                @error('EmailSender')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('MaxSizeFile') input-with-error @enderror">
                                                                <label for="MaxSizeFile">{{ __('Max File Size') }}</label>
                                                                <input type="number" class="form-control" name="MaxSizeFile" id="MaxSizeFile" value="{{ old('MaxSizeFile') ?? $paramater->MaxSizeFile }}">
                                                                @error('MaxSizeFile')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('ActivateNotifications') input-with-error @enderror">
                                                                <label for="ActivateNotifications">{{ __('Activate Notifications') }}</label>

                                                                <select name="ActivateNotifications" id="ActivateNotifications" class="form-control">
                                                                    @if(is_null(old('ActivateNotifications')))
                                                                        <option value="Y" {{ $paramater->ActivateNotifications == 0 ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                                                        <option value="N" {{ $paramater->ActivateNotifications == 1 ? 'selected' : '' }}>{{ ('No') }}</option>
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
                                                            <a href="{{ route('usuarios') }}" class="btn btn-custon-four btn-default pull-right">
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

        @include('layouts.footer')
    </div>
@endsection