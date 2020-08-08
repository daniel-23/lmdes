@extends('layouts.master')
@section('breadcome')
    <li>
        <span class="bread-blod">{{ __('Security') }}</span>
        <span class="bread-slash">/</span>
    </li>
    <li>
        <a href="{{ route('roles') }}">{{ __('Roles') }}</a>
        <span class="bread-slash">/</span>
    </li>
    <li>
        <span class="bread-blod">{{ __('Create') }}</span>
    </li>
@endsection
@section('content')
    <div class="basic-form-area mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>{{ __('Create Role') }}</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="{{ route('roles.crear') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('name') input-with-error @enderror">
                                                            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Name') }}">
                                                            @error('name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner">
                                                            <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" placeholder="{{ __('Description') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12" style="margin-top: 20px;">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{ __('Component') }}</th>
                                                                    @foreach($permissions as $permission)
                                                                    <th>{{ $permission->Name }}</th>
                                                                    @endforeach
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($components as $component)
                                                                <tr>
                                                                    <td>{{ $component->Name }}</td>
                                                                    @foreach($permissions as $permission)
                                                                    <th style="text-align: center;">
                                                                        <?php $nm = $component->IdComponent.'-'.$permission->IdPermission; ?>
                                                                        <input type="checkbox" name="permisos[{{ $nm }}]"
                                                                        @if(isset(old('permisos')["$nm"])) checked @endif>
                                                                    </th>
                                                                    @endforeach
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <br>&nbsp;
                                                    <div class="col-xs-12">
                                                        <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                        <a href="{{ route('roles') }}" class="btn btn-custon-four btn-default pull-right">
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