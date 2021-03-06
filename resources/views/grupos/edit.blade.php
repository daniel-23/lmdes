@extends('layouts.master')

@section('content')
    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>{{ __('Edit Group') }}</h1>
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
                                            <form action="{{ route('grupos.editar',$group->IdGroup) }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('name') input-with-error @enderror">
                                                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $group->Name }}" placeholder="{{ __('Name') }}">
                                                            @error('name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner">
                                                            <input type="text" class="form-control" name="description" id="description" value="{{ old('description') ?? $group->Description }}" placeholder="{{ __('Description') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 10px !important;">

                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner">
                                                            <select name="parent" id="parent" class="form-control">
                                                                <option value="0">{{ __('Select') }} {{ __('Group Parent') }}</option>
                                                                @foreach($groups as $grupo)
                                                                    @if(is_null(old('parent')))
                                                                        <option value="{{ $grupo->IdGroup }}" {{ $group->IdGroupParent == $grupo->IdGroup ? 'selected' : '' }}>{{ $grupo->Name }}</option>
                                                                    @else
                                                                        <option value="{{ $grupo->IdGroup }}" {{ old('parent') == $grupo->IdGroup ? 'selected' : '' }}>{{ $grupo->Name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group-inner" style="margin-top: 10px !important;">
                                                            <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                            <a href="{{ route('grupos') }}" class="btn btn-custon-four btn-default pull-right">
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
@endsection

