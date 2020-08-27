@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Utilidades') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Quiz') }}</span>
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
                                <h1>{{ __('Add Questions') }} {{ $quiz->Title }}</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="{{ route('utilidades.agregar-questions',$quiz->IdQuiz) }}" method="POST">
                                                @csrf
                                                @for($i=1; $i <= $quiz->TotalQuestions; $i++)
                                                    <div class="form-group-inner @error('title') input-with-error @enderror col-md-9">
                                                        <input type="text" class="form-control" name="question[]" value="{{ old('title') }}" required placeholder="{{ __('Question') }} {{ $i }}">
                                                        @error('title')
                                                            <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group-inner col-md-3">
                                                        <select name="type[]" id="type-{{$i}}" class="form-control type" i="{{$i}}">
                                                            <option value="open">{{ __('Open') }}</option>
                                                            <option value="simple">{{ __('Simple selection') }}</option>
                                                            <option value="multiple">{{ __('Multiple choice') }}</option>
                                                        </select>
                                                    </div>

                                                    <div style="display: none;" id="options-question-{{$i}}">
                                                        <div class="form-group-inner col-md-6">
                                                            <input type="text" class="form-control" name="option[{{$i}}][]" value="{{ old('title') }}" placeholder="{{ __('Option a') }}">
                                                        </div>
                                                        <div class="form-group-inner col-md-6">
                                                            <input type="text" class="form-control" name="option[{{$i}}][]" value="{{ old('title') }}" placeholder="{{ __('Option b') }}">
                                                        </div>
                                                        <div class="form-group-inner col-md-6">
                                                            <input type="text" class="form-control" name="option[{{$i}}][]" value="{{ old('title') }}" placeholder="{{ __('Option c') }}">
                                                        </div>
                                                        <div class="form-group-inner col-md-6">
                                                            <input type="text" class="form-control" name="option[{{$i}}][]" value="{{ old('title') }}" placeholder="{{ __('Option d') }}">
                                                        </div>
                                                        <div class="form-group-inner col-xs-12">
                                                            <select name="resp_correct[]" class="form-control">
                                                                <option value="">{{ __('Select answer for question') }} {{$i}}</option>
                                                                <option value="1">{{ __('Option') }} a</option>
                                                                <option value="2">{{ __('Option') }} b</option>
                                                                <option value="3">{{ __('Option') }} c</option>
                                                                <option value="4">{{ __('Option') }} d</option>
                                                            </select>
                                                        </div>
                                                        <p>&nbsp;</p>
                                                    </div>
                                                    
                                                @endfor

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