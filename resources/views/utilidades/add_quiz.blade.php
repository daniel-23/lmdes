@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Utilidades') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Quiz') }}</span>
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
                                <h1>{{ __('Add Quiz') }}</h1>

                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="{{ route('utilidades.agregar-quiz',$module->IdModule) }}" method="POST">
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
                                                        <div class="form-group-inner @error('total_questions') input-with-error @enderror">
                                                            
                                                            <input type="number" class="form-control" name="total_questions" id="total_questions" value="{{ old('total_questions') }}" required placeholder="{{ __('Enter total number of questions') }}" min="1">
                                                            @error('total_questions')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12">
                                                        <div class="form-group-inner @error('points_right_answer') input-with-error @enderror">
                                                            
                                                            <input type="number" class="form-control" name="points_right_answer" id="points_right_answer" value="{{ old('points_right_answer') }}" required placeholder="{{ __('Enter points on right answer') }}" min="1">
                                                            @error('points_right_answer')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12">
                                                        <div class="form-group-inner @error('points_wrong_answer') input-with-error @enderror">
                                                            
                                                            <input type="number" class="form-control" name="points_wrong_answer" id="points_wrong_answer" value="{{ old('points_wrong_answer') }}" required placeholder="{{ __('Enter minus points on wrong answer without sign') }}" min="0">
                                                            @error('points_wrong_answer')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12 col-md-4">
                                                        <div class="form-group-inner @error('start_date') input-with-error @enderror">
                                                            
                                                            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}" required placeholder="{{ __('Start Date') }}">
                                                            @error('start_date')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-4">
                                                        <div class="form-group-inner @error('end_date') input-with-error @enderror">
                                                            
                                                            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}" required placeholder="{{ __('End Date') }}" min="0">
                                                            @error('end_date')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-4">
                                                        <div class="form-group-inner @error('duration') input-with-error @enderror">
                                                            
                                                            <input type="number" class="form-control" name="duration" id="duration" value="{{ old('duration') }}" required placeholder="{{ __('Duration in minute') }}" min="0">
                                                            @error('duration')
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

