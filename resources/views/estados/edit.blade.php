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
                                    <h1>{{ __('Edit State') }}</h1>

                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="{{ route('estados.editar',$state->IdState) }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                                                <label for="name">{{ __('Name') }}</label>
                                                                <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') ?? $state->Name }}">
                                                                @error('name')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('country_id') input-with-error @enderror">
                                                                <label for="country_id">{{ __('Country') }}</label>

                                                                <select name="country_id" id="country_id" class="form-control">
                                                                    <option value="">{{ __('Select') }}...</option>
                                                                    @foreach($countries as $country)
                                                                        @if(is_null(old('country_id')))
                                                                            <option value="{{ $country->IdCountry }}" {{ $state->IdCountry == $country->IdCountry ? 'selected' : '' }}>{{ $country->Name }}</option>
                                                                        @else
                                                                            <option value="{{ $country->IdCountry }}" {{ old('country_id') == $country->IdCountry ? 'selected' : '' }}>{{ $country->Name }}</option>
                                                                        @endif
                                                                        
                                                                    @endforeach
                                                                </select>
                                                                
                                                                @error('country_id')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12">
                                                            <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                            <a href="{{ route('estados') }}" class="btn btn-custon-four btn-default pull-right">
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
