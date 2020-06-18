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
                                    <h1>{{ __('Add Permission to role') }} {{ $role->Name}}</h1>

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
                                                <form action="{{ route('roles.permisos.crear',$role->IdRole) }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('permission') input-with-error @enderror">
                                                                <label for="name">{{ __('Permission') }}</label>
                                                                <select name="permission" id="permission" class="form-control">
                                                                    <option value="">{{ __('Select') }}...</option>
                                                                    @foreach($permissions as $permission)
                                                                        <option value="{{ $permission->IdPermission }}" {{ old('permission') == $permission->IdPermission ? 'selected' : '' }}>{{ $permission->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('permission')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('component') input-with-error @enderror">
                                                                <label for="name">{{ __('Component') }}</label>
                                                                <select name="component" id="component" class="form-control">
                                                                    <option value="">{{ __('Select') }}...</option>
                                                                    @foreach($components as $component)
                                                                        <option value="{{ $component->IdComponent }}" {{ old('component') == $component->IdComponent ? 'selected' : '' }}>{{ $component->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('component')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <br>&nbsp;
                                                        <div class="col-xs-12">
                                                            <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                            <a href="{{ route('roles.permisos.index',$role->IdRole) }}" class="btn btn-custon-four btn-default pull-right">
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

