@extends('layouts.master')

@section('content')
        
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#general">Crear Usuaio</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="general">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                <form action="{{ route('companies.users.create',$company->IdCompany) }}" method="POST" class="dropzone dropzone-custom needsclick add-professors">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="col-md-6 form-group-inner @error('name') input-with-error @enderror">
                                                                <input name="name" id="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="{{ __('name') }}">
                                                                @error('name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 form-group-inner @error('last_name') input-with-error @enderror">
                                                                <input name="last_name" id="last_name" value="{{ old('last_name') }}" type="text" class="form-control" placeholder="{{ __('Last Name') }}">
                                                                @error('last_name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 form-group-inner @error('code') input-with-error @enderror">
                                                                <input name="code" id="code" value="{{ old('code') }}" type="text" class="form-control" placeholder="{{ __('Code') }}">
                                                                @error('code')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 form-group-inner @error('email') input-with-error @enderror">
                                                                <input name="email" id="email" value="{{ old('email') }}" type="text" class="form-control" placeholder="{{ __('Email') }}">
                                                                @error('email')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>


                                                            <div class="col-md-6 form-group-inner @error('role') input-with-error @enderror">
                                                                <select name="role" id="role" class="form-control">
                                                                    <option value="">{{ __('Select a role') }}...</option>
                                                                    @foreach($roles as $role)
                                                                    <option value="{{ $role->IdRole }}">{{ $role->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('role')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 form-group-inner @error('group') input-with-error @enderror">

                                                                <select name="group[]" id="groupr" class="chosen-select" multiple tabindex="-1" data-placeholder="{{ __('Choose a Groups') }}...">
                                                                    <option value="">{{ __('Select Groups') }}...</option>
                                                                    @foreach($groups as $group)
                                                                        <option value="{{ $group->IdGroup }}">{{ $group->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                
                                                                @error('group')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="col-md-6 form-group-inner @error('password') input-with-error @enderror">
                                                                <input name="password" id="password" value="{{ old('password') }}" type="password" class="form-control" placeholder="{{ __('Password') }}">
                                                                @error('password')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 form-group-inner @error('password_confirmation') input-with-error @enderror">
                                                                <input name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="form-control" placeholder="{{ __('Password Confirmation') }}">
                                                                @error('password_confirmation')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                        </div>


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
    </div>
@endsection
