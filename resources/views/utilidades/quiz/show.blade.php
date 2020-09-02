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
                                <h1>{{ $question->Question }}</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="{{ route('question_replies.create') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $question->IdQuestion }}" name="question_id">
                                                @if($question->Type == 'open')

                                                <div class="form-group-inner @error('response') input-with-error @enderror">
                                                    <textarea class="form-control" name="response" required></textarea>
                                                    @error('response')
                                                        <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                    @enderror
                                                </div>

                                                @endif
                                                @if($question->Type == 'simple')
                                                    @foreach($question->options as $option)
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="i-checks pull-left">
                                                                    <label><input type="radio" value="{{ $option->IdOption }}" name="response" required> <i></i> {{ $option->Option }} </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                @if($question->Type == 'multiple')
                                                    @foreach($question->options as $option)
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="i-checks pull-left">
                                                                    <label><input type="checkbox" value="{{$option->IdOption}}" name="response[]" required> <i></i> {{ $option->Option }} </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                

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