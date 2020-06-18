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
                                    <h1>{{ __('Parameters Users') }}</h1>

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
                                                <form action="{{ route('usuarios.parametros') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('SessionTime') input-with-error @enderror">
                                                                <label for="SessionTime">{{ __('Session Time') }}</label>
                                                                <input type="text" class="form-control" name="SessionTime" id="SessionTime" value="{{ old('SessionTime') ?? $parameter->SessionTime }}">
                                                                @error('SessionTime')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('PasswordStrength') input-with-error @enderror">
                                                                <label for="PasswordStrength">{{ __('Password Strength') }}</label>

                                                                <select name="PasswordStrength" id="PasswordStrength" class="form-control">
                                                                    @if(is_null(old('PasswordStrength')))
                                                                        <option value="0" {{ $parameter->PasswordStrength == 0 ? 'selected' : '' }}>Ninguna</option>
                                                                        <option value="1" {{ $parameter->PasswordStrength == 1 ? 'selected' : '' }}>Debil</option>
                                                                        <option value="2" {{ $parameter->PasswordStrength == 2 ? 'selected' : '' }}>Media</option>
                                                                        <option value="3"  {{ $parameter->PasswordStrength == 3 ? 'selected' : '' }}>Fuerte</option>
                                                                    @else
                                                                        <option value="0" {{ old('PasswordStrength') == 0 ? 'selected' : '' }}>Ninguna</option>
                                                                        <option value="1" {{ old('PasswordStrength') == 1 ? 'selected' : '' }}>Debil</option>
                                                                        <option value="2" {{ old('PasswordStrength') == 2 ? 'selected' : '' }}>Media</option>
                                                                        <option value="3"  {{ old('PasswordStrength') == 3 ? 'selected' : '' }}>Fuerte</option>
                                                                    @endif
                                                                        
                                                                </select>
                                                                
                                                                @error('PasswordStrength')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('ChangePassword') input-with-error @enderror">
                                                                <label for="ChangePassword">{{ __('Change Password') }}</label>
                                                                <input type="text" class="form-control" name="ChangePassword" id="ChangePassword" value="{{ old('ChangePassword') ?? $parameter->ChangePassword }}">
                                                                @error('ChangePassword')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('Avatar') input-with-error @enderror">
                                                                <label for="Avatar">{{ __('Avatar') }}</label>
                                                                <input type="text" class="form-control" name="Avatar" id="Avatar" value="{{ old('Avatar') ?? $parameter->Avatar }}">
                                                                @error('Avatar')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('SessionFailedAttempts') input-with-error @enderror">
                                                                <label for="SessionFailedAttempts">{{ __('Session Failed Attempts') }}</label>
                                                                <input type="text" class="form-control" name="SessionFailedAttempts" id="SessionFailedAttempts" value="{{ old('SessionFailedAttempts') ?? $parameter->SessionFailedAttempts }}">
                                                                @error('SessionFailedAttempts')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('DisabledTime') input-with-error @enderror">
                                                                <label for="DisabledTime">{{ __('Disabled Time') }}</label>
                                                                <input type="text" class="form-control" name="DisabledTime" id="DisabledTime" value="{{ old('DisabledTime') ?? $parameter->DisabledTime }}">
                                                                @error('DisabledTime')
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