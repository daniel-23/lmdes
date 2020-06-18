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
                                    <h1>{{ __('Create Courses Category') }}</h1>

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
                                                <form action="{{ route('categorias.crear') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                                                <label for="name">{{ __('Name') }}</label>
                                                                <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}">
                                                                @error('name')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('code') input-with-error @enderror">
                                                                <label for="code">{{ __('Code') }}</label>
                                                                <input type="text" class="form-control" name="code" id="code"  value="{{ old('code') }}">
                                                                @error('code')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('description') input-with-error @enderror">
                                                                <label for="description">{{ __('Description') }}</label>
                                                                <input type="text" class="form-control" name="description" id="description"  value="{{ old('description') }}">
                                                                @error('description')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="colorpicker-inner ts-forms mg-b-23">
                                                                <div class="tsbox">
                                                                    <label class="label">{{ __('Color') }}</label>
                                                                    <label class="color-group" for="palette1">
                                                                        <input type="text" placeholder="#9257b4" id="color" name="color">
                                                                    </label>
                                                                    @error('color')
                                                                        <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('icon') input-with-error @enderror">
                                                                <label for="icon">{{ __('Icon') }}</label>
                                                                <input type="text" class="form-control" name="icon" id="icon"  value="{{ old('icon') }}">
                                                                @error('icon')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('parent') input-with-error @enderror">
                                                                <label for="parent">{{ __('Category Parent') }}</label>
                                                                <select name="parent" id="parent" class="form-control">
                                                                    <option value="0">{{ __('Select') }}...</option>
                                                                    @foreach($categories as $category)
                                                                    <option value="{{ $category->IdCourseCategory }}">{{ $category->Name }}</option>
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
                                                            <a href="{{ route('categorias') }}" class="btn btn-custon-four btn-default pull-right">
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

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#color").spectrum({
            color: "#9257b4",
            preferredFormat: "hex",
            showInput: true,
            showPalette: true,
            palette: [
                ['#000', '#fff', '#ffebcd'],
                ['#ff8000', '#448026', '#ffffe0']
            ]
        });
        $("#color").show();
    });
</script>
@endsection