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
                                    <h1>{{ __('Edit Template') }}</h1>

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
                                                <form action="{{ route('plantillas.editar',$plantilla->IdTemplate) }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                                                <label for="name">{{ __('Name') }}</label>
                                                                <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') ?? $plantilla->Name }}">
                                                                @error('name')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('description') input-with-error @enderror">
                                                                <label for="description">{{ __('Description') }}</label>
                                                                <input type="text" class="form-control" name="description" id="description"  value="{{ old('description') ?? $plantilla->Description }}">
                                                                @error('description')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('limit_date') input-with-error @enderror">
                                                                <label for="limit_date">{{ __('Limit Date') }}</label>
                                                                <input type="datetime-local" name="limit_date" class="form-control" value="{{ old('limit_date') ?? $plantilla->limit_date() }}">
                                                                @error('limit_date')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('parent') input-with-error @enderror">
                                                                <label for="parent">{{ __('Template Parent') }}</label>
                                                                <select name="parent" id="parent" class="form-control">
                                                                    <option value="0">{{ __('Select') }}...</option>
                                                                    @foreach($templates as $template)

                                                                        @if(is_null(old('parent')))
                                                                            <option value="{{ $template->IdTemplate }}" {{ $plantilla->IdTemplateParent == $template->IdTemplate ? 'selected' : '' }}>{{ $template->Name }}</option>
                                                                        @else
                                                                            <option value="{{ $template->IdTemplate }}" {{ old('parent') == $template->IdTemplate ? 'selected' : '' }}>{{ $template->Name }}</option>
                                                                        @endif
                                                                        
                                                                    @endforeach
                                                                </select>
                                                                @error('parent')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12">
                                                            <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                            <a href="{{ route('plantillas') }}" class="btn btn-custon-four btn-default pull-right">
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