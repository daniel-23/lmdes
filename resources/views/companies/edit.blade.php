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
                                    <h1>{{ __('Edit Company') }}</h1>

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
                                                <form action="{{ route('companies.editar',$company->IdCompany) }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('type') input-with-error @enderror">
                                                                <label for="type">{{ __('Type Company') }}</label>
                                                                <select name="type" id="type" class="form-control">
                                                                    <option value="">Selec...</option>
                                                                    @foreach($types as $type)
                                                                        @if(is_null(old('type')))
                                                                            <option value="{{ $type->IdCompanyType }}" {{ $company->IdCompanyType == $type->IdCompanyType ? 'selected' : '' }}>{{ $type->Name }}</option>
                                                                        @else
                                                                            <option value="{{ $type->IdCompanyType }}" {{ old('type') == $type->IdCompanyType ? 'selected' : '' }}>{{ $type->Name }}</option>
                                                                        @endif
                                                                        
                                                                    @endforeach
                                                                </select>
                                                                @error('type')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                                                <label for="name">{{ __('Name') }}</label>
                                                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $company->Name }}">
                                                                @error('name')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        
                                                    </div>
                                                    <div class="row" style="margin-top: 15px;">

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('email') input-with-error @enderror">
                                                                <label for="email">{{ __('Email') }}</label>
                                                                <input type="text" class="form-control" name="email" id="email" value="{{ old('email') ?? $company->Email }}">
                                                                @error('email')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('web_site') input-with-error @enderror">
                                                                <label for="web_site">{{ __('Web Site') }}</label>
                                                                <input type="text" class="form-control" name="web_site" id="web_site" value="{{ old('web_site') ?? $company->WebSite }}">
                                                                @error('web_site')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('contact_name') input-with-error @enderror">
                                                                <label for="contact_name">{{ __('Contact Name') }}</label>
                                                                <input type="text" class="form-control" name="contact_name" id="contact_name" value="{{ old('contact_name') ?? $company->ContactName }}">
                                                                @error('contact_name')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('db_name') input-with-error @enderror">
                                                                <label for="db_name">{{ __('Database Name') }}</label>
                                                                <input type="text" class="form-control" name="db_name" id="db_name" value="{{ old('db_name') ?? $company->DatabaseName }}">
                                                                @error('db_name')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('db_user') input-with-error @enderror">
                                                                <label for="db_user">{{ __('Database User') }}</label>
                                                                <input type="text" class="form-control" name="db_user" id="db_user" value="{{ old('db_user') ?? $company->DatabaseUser }}">
                                                                @error('db_user')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('db_password') input-with-error @enderror">
                                                                <label for="db_password">{{ __('Database Password') }}</label>
                                                                <input type="password" class="form-control" name="db_password" id="db_password">
                                                                @error('db_password')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('max_size_file') input-with-error @enderror">
                                                                <label for="max_size_file">{{ __('Max Size File') }}</label>
                                                                <input type="text" class="form-control" name="max_size_file" id="max_size_file" value="{{ old('max_size_file') ?? $company->MaxSizeFile }}">
                                                                @error('max_size_file')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('max_users') input-with-error @enderror">
                                                                <label for="max_users">{{ __('Max Users') }}</label>
                                                                <input type="text" class="form-control" name="max_users" id="max_users" value="{{ old('max_users') ?? $company->MaxUsers }}">
                                                                @error('max_users')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('max_disc_space') input-with-error @enderror">
                                                                <label for="max_disc_space">{{ __('Max Disc Space') }}</label>
                                                                <input type="text" class="form-control" name="max_disc_space" id="max_disc_space" value="{{ old('max_disc_space') ?? $company->MaxDiscSpace }}">
                                                                @error('max_disc_space')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="form-group-inner" style="margin-top: 10px !important;">
                                                                <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                                <a href="{{ route('companies') }}" class="btn btn-custon-four btn-default pull-right">
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

