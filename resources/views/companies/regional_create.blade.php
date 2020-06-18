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
                                    <h1>{{ __('Config Regional') }}</h1>

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
                                                <form action="{{ route('companies.regional.crear',$company->IdCompany) }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('city') input-with-error @enderror">
                                                                <label for="city">{{ __('City') }}</label>
                                                                <select name="city" id="city" class="form-control">
                                                                    <option value="">Selec...</option>
                                                                    @foreach($cities as $city)
                                                                        <option value="{{ $city->IdCity }}" {{ old('city') == $city->IdCity ? 'selected' : '' }}>{{ $city->Name }}</option>  
                                                                    @endforeach
                                                                    
                                                                </select>
                                                                @error('city')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('currency') input-with-error @enderror">
                                                                <label for="currency">{{ __('Currency') }}</label>
                                                                <select name="currency" id="currency" class="form-control">
                                                                    <option value="">Selec...</option>
                                                                    @foreach($currencies as $currency)
                                                                        <option value="{{ $currency->IdCurrency }}" {{ old('currency') == $currency->IdCurrency ? 'selected' : '' }}>{{ $currency->Name }} {{ $currency->Symbol ? ' - '. $currency->Symbol : ''}}</option>  
                                                                    @endforeach
                                                                    
                                                                </select>
                                                                @error('currency')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('timezone') input-with-error @enderror">
                                                                <label for="timezone">{{ __('Time Zone') }}</label>
                                                                <select name="timezone" id="timezone" class="form-control">
                                                                    <option value="">Selec...</option>
                                                                    @foreach($timezones as $timezone)
                                                                        <option value="{{ $timezone->IdTimeZone }}" {{ old('timezone') == $timezone->IdTimeZone ? 'selected' : '' }}>{{ $timezone->Name }}</option>  
                                                                    @endforeach
                                                                    
                                                                </select>
                                                                @error('timezone')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('language') input-with-error @enderror">
                                                                <label for="language">{{ __('Language') }}</label>
                                                                <select name="language" id="language" class="form-control">
                                                                    <option value="">Selec...</option>
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



                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="form-group-inner" style="margin-top: 10px !important;">
                                                                <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                                <a href="{{ route('companies.regional',$company->IdCompany) }}" class="btn btn-custon-four btn-default pull-right">
                                                                    <i class="fas fa-times-circle"></i>
                                                                    {{ __('Cancel') }}
                                                                </a>
                                                            </div>
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

