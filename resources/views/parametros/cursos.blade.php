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
                                    <h1>{{ __('Parameters Courses') }}</h1>

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
                                                <form action="{{ route('par-courses') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('CourseFormat') input-with-error @enderror">
                                                                <label for="CourseFormat">{{ __('Course Format') }}</label>
                                                                <input type="text" class="form-control" name="CourseFormat" id="CourseFormat" value="{{ old('CourseFormat') ?? $paramater->CourseFormat }}">
                                                                @error('CourseFormat')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('MaxCoursesNumber') input-with-error @enderror">
                                                                <label for="MaxCoursesNumber">{{ __('Max Courses Number') }}</label>
                                                                <input type="text" class="form-control" name="MaxCoursesNumber" id="MaxCoursesNumber" value="{{ old('MaxCoursesNumber') ?? $paramater->MaxCoursesNumber }}">
                                                                @error('MaxCoursesNumber')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('CourseDuration') input-with-error @enderror">
                                                                <label for="CourseDuration">{{ __('Course Duration') }}</label>
                                                                <input type="text" class="form-control" name="CourseDuration" id="CourseDuration" value="{{ old('CourseDuration') ?? $paramater->CourseDuration }}">
                                                                @error('CourseDuration')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('MaxModulesNumber') input-with-error @enderror">
                                                                <label for="MaxModulesNumber">{{ __('Max Modules Number') }}</label>
                                                                <input type="text" class="form-control" name="MaxModulesNumber" id="Email Sender" value="{{ old('MaxModulesNumber') ?? $paramater->MaxModulesNumber }}">
                                                                @error('MaxModulesNumber')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12">
                                                            <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>

                                                            <a href="{{ route('cursos') }}" class="btn btn-custon-four btn-default pull-right">
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