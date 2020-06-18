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
                                    <h1>{{ __('Edit Course') }}</h1>

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
                                                <form action="{{ route('cursos.editar',$course->IdCourse) }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                                                <label for="name">{{ __('Name') }}</label>
                                                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $course->Name }}">
                                                                @error('name')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('short_name') input-with-error @enderror"">
                                                                <label for="short_name">{{ __('Short Name') }}</label>
                                                                <input type="text" class="form-control" name="short_name" id="short_name" value="{{ old('short_name') ?? $course->ShortName }}">
                                                                @error('short_name')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('code') input-with-error @enderror">
                                                                <label for="code">{{ __('Code') }}</label>
                                                                <input type="text" class="form-control" name="code" id="code" value="{{ old('code') ?? $course->Code }}">
                                                                @error('code')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('category') input-with-error @enderror"">
                                                                <label for="category">{{ __('Category') }}</label>
                                                                <select name="category" id="category" class="form-control">
                                                                    <option value="">{{ __('Select') }}...</option>
                                                                    @foreach($categories as $category)
                                                                    @if(is_null(old('category')))
                                                                    <option value="{{ $category->IdCourseCategory }}" {{ $course->IdCourseCategory == $category->IdCourseCategory ? 'selected' : '' }}>{{ $category->Name}}</option>
                                                                    @else
                                                                    <option value="{{ $category->IdCourseCategory }}" {{ old('category') == $category->IdCourseCategory ? 'selected' : '' }}>{{ $category->Name}}</option>
                                                                    @endif
                                                                    
                                                                    @endforeach
                                                                </select>
                                                                @error('category')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12">
                                                            <div class="form-group-inner @error('description') input-with-error @enderror">
                                                                <label for="description">{{ __('Description') }}</label>
                                                                <textarea class="form-control" name="description" id="description" rows="3" style="resize: none;">{{ old('description') ?? $course->Description }}</textarea>
                                                                @error('description')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('start_date') input-with-error @enderror">
                                                                <label for="start_date">{{ __('Start Date') }}</label>
                                                                <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') ?? explode(' ',$course->StartDate)[0] }}">
                                                                @error('start_date')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('end_date') input-with-error @enderror">
                                                                <label for="end_date">{{ __('End Date') }}</label>
                                                                <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') ?? explode(' ',$course->EndDate)[0] }}">
                                                                @error('end_date')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('format') input-with-error @enderror"">
                                                                <label for="format">{{ __('Format') }}</label>
                                                                <select name="format" id="format" class="form-control">
                                                                    <option value="">{{ __('Select') }}...</option>
                                                                    @foreach($formats as $format)
                                                                    @if(is_null(old('format')))
                                                                    <option value="{{ $format->IdCourseFormat }}" {{ $course->IdCourseFormat == $format->IdCourseFormat ? 'selected' : '' }}>{{ $format->Name}}</option>
                                                                    @else
                                                                    <option value="{{ $format->IdCourseFormat }}" {{ old('format') == $format->IdCourseFormat ? 'selected' : '' }}>{{ $format->Name}}</option>
                                                                    @endif
                                                                    
                                                                    @endforeach
                                                                </select>
                                                                @error('format')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('modules_number') input-with-error @enderror">
                                                                <label for="modules_number">{{ __('Modules Number') }}</label>
                                                                <input type="number" class="form-control" name="modules_number" id="modules_number" value="{{ old('modules_number') ?? $course->ModulesNumber }}">
                                                                @error('modules_number')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                       <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('modules_format') input-with-error @enderror">
                                                                <label for="modules_format">{{ __('Modules Format') }}</label>
                                                                <input type="text" class="form-control" name="modules_format" id="modules_format" value="{{ old('modules_format') ?? $course->ModulesFormat }}">
                                                                @error('modules_format')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('language') input-with-error @enderror"">
                                                                <label for="language">{{ __('Language') }}</label>
                                                                <select name="language" id="language" class="form-control">
                                                                    <option value="">{{ __('Select') }}...</option>
                                                                    @foreach($languages as $language)
                                                                    @if(is_null(old('language')))
                                                                    <option value="{{ $language->IdLanguage }}" {{ $course->IdLanguage == $language->IdLanguage ? 'selected' : '' }}>{{ $language->Name}}</option>
                                                                    @else
                                                                    <option value="{{ $language->IdLanguage }}" {{ old('language') == $language->IdLanguage ? 'selected' : '' }}>{{ $language->Name}}</option>
                                                                    @endif
                                                                    
                                                                    @endforeach
                                                                </select>
                                                                @error('language')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('show_califications') input-with-error @enderror"">
                                                                <label for="show_califications">{{ __('Show Califications') }}</label>
                                                                <select name="show_califications" id="show_califications" class="form-control">
                                                                    <option value="">{{ __('Select') }}...</option>

                                                                    @if(is_null(old('show_califications')))
                                                                    <option value="Y" {{ $course->ShowCalifications == 'Y' ? 'selected' : '' }}>{{ __('Yes') }}</option>

                                                                    <option value="N" {{ $course->ShowCalifications == 'N' ? 'selected' : '' }}>No</option>
                                                                    @else
                                                                    <option value="Y" {{ old('show_califications') == 'Y' ? 'selected' : '' }}>{{ __('Yes') }}</option>

                                                                    <option value="N" {{ old('show_califications') == 'N' ? 'selected' : '' }}>No</option>
                                                                    @endif
                                                                    
                                                                    
                                                                    
                                                                </select>
                                                                @error('show_califications')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('max_file_size') input-with-error @enderror">
                                                                <label for="max_file_size">{{ __('Max File Size') }}</label>
                                                                <input type="number" class="form-control" name="max_file_size" id="max_file_size" value="{{ old('max_file_size') ?? $course->MaxFileSize }}">
                                                                @error('max_file_size')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="form-group-inner" style="margin-top: 10px !important;">
                                                                <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                                <a href="{{ route('cursos') }}" class="btn btn-custon-four btn-default pull-right">
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

