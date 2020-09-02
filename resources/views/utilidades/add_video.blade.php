@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Utilidades') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Videos') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Add') }}</span>
</li>
@endsection

@section('content')
    <!-- Start Welcome area -->
    
    <div class="basic-form-area mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>{{ __('Add Video') }}</h1>

                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="{{ route('utilidades.agregar-video',$module->IdModule) }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group-inner @error('title') input-with-error @enderror">
                                                            
                                                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required placeholder="{{ __('Title') }}">
                                                            @error('title')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12">
                                                        <div class="form-group-inner @error('description') input-with-error @enderror">
                                                            <textarea name="description" id="description" style="resize: none;" class="form-control" placeholder="{{ __('Description') }}">{{ old('description') }}</textarea>
                                                            @error('description')
                                                            <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12">
                                                        <div class="form-group-inner @error('url') input-with-error @enderror">
                                                            
                                                            <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}" required placeholder="{{ __('Url') }}">
                                                            @error('url')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12">
                                                        <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                        <a href="#" class="btn btn-custon-four btn-default pull-right">
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