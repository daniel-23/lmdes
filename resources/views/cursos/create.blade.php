@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Manage Courses') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <a href="{{ route('cursos') }}">{{ __('Courses') }}</a>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Create') }}</span>
</li>
@endsection
@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Courses Details</a></li>
                            <li><a href="#groups"> {{ __('Groups') }}</a></li>
                            <!--li><a href="#INFORMATION">Social Information</a></li-->
                        </ul>
                        <form action="{{ route('cursos.crear') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                                                <input name="name" type="text" class="form-control" placeholder="Course Name" value="{{ old('name') }}">
                                                                @error('name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('short_name') input-with-error @enderror">
                                                                <input name="short_name" type="text" class="form-control" placeholder="Short Name" value="{{ old('short_name') }}">
                                                                @error('short_name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('code') input-with-error @enderror">
                                                                <input name="code" type="text" class="form-control" placeholder="Course Code" value="{{ old('code') }}">
                                                                @error('code')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('category') input-with-error @enderror">
                                                                <select name="category" id="category" class="form-control">
                                                                    <option value="">{{ __('Select') }} {{ __('Category') }}</option>
                                                                    @foreach($categories as $category)
                                                                    <option value="{{ $category->IdCourseCategory }}" {{ old('category') == $category->IdCourseCategory ? 'selected' : '' }}>{{ $category->Name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('category')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('start_date') input-with-error @enderror">
                                                                <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}" placeholder="{{ __('Start Date') }}">
                                                                @error('start_date')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('end_date') input-with-error @enderror">
                                                                <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}" placeholder="{{ __('End Date') }}">
                                                                @error('end_date')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('image') input-with-error @enderror">
                                                                <div class="file-upload-inner ts-forms">
                                                                    <div class="input prepend-small-btn">
                                                                        <div class="file-button">
                                                                            Browse
                                                                            <input type="file" onchange="document.getElementById('prepend-small-btn').value = this.value;" accept="image/*" name="image">
                                                                        </div>
                                                                        <input type="text" id="prepend-small-btn" placeholder="no file selected">
                                                                        @error('image')
                                                                        <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner @error('format') input-with-error @enderror">
                                                                <select name="format" id="format" class="form-control">
                                                                    <option value="">{{ __('Select') }} {{ __('Format') }}</option>
                                                                    @foreach($formats as $format)
                                                                    <option value="{{ $format->IdCourseFormat }}" {{ old('format') == $format->IdCourseFormat ? 'selected' : '' }}>{{ $format->Name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('format')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            <div class="form-group-inner @error('description') input-with-error @enderror">
                                                                <textarea name="description" placeholder="Description" class="form-control" style="resize: none;">{{ old('description') }}</textarea>
                                                                @error('description')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('modules_number') input-with-error @enderror">
                                                                <input type="number" class="form-control" name="modules_number" id="modules_number" value="{{ old('modules_number') }}" placeholder="{{ __('Modules Number') }}">
                                                                @error('modules_number')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('modules_format') input-with-error @enderror">
                                                                <input type="text" class="form-control" name="modules_format" id="modules_format" value="{{ old('modules_format') }}" placeholder="{{ __('Modules Format') }}">
                                                                @error('modules_format')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('language') input-with-error @enderror">
                                                                <select name="language" id="language" class="form-control">
                                                                    <option value="">{{ __('Select') }} {{ __('Language') }}</option>
                                                                    @foreach($languages as $language)
                                                                    <option value="{{ $language->IdLanguage }}" {{ old('language') == $language->IdLanguage ? 'selected' : '' }}>{{ $language->Name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('language')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('show_califications') input-with-error @enderror">
                                                                <select name="show_califications" id="show_califications" class="form-control">
                                                                    <option value="">{{ __('Select') }} {{ __('Show Califications') }}</option>
                                                                    <option value="Y" {{ old('show_califications') == 'Y' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                                                    <option value="N" {{ old('show_califications') == 'N' ? 'selected' : '' }}>No</option>
                                                                </select>
                                                                @error('show_califications')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('max_file_size') input-with-error @enderror">
                                                                <input type="number" class="form-control" name="max_file_size" id="max_file_size" value="{{ old('max_file_size') }}" placeholder="{{ __('Max File Size') }}">
                                                                @error('max_file_size')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group-inner @error('competencies') input-with-error @enderror">
                                                                <select name="competencies[]" id="competencies" data-placeholder="{{ __('Select') }} {{ __('las competencias') }}" class="chosen-select form-control" multiple="" tabindex="-1">
                                                                    @foreach($competencies as $competency)
                                                                        @if(is_null(old('competencies')))
                                                                            <option value="{{ $competency->IdCompetency }}">{{ $competency->Name }}</option>
                                                                        @else
                                                                            <option value="{{ $competency->IdCompetency }}" {{ in_array($competency->IdCompetency, old('competencies')) ? 'selected' : '' }}>{{ $competency->Name }}</option>
                                                                        @endif
                                                                        
                                                                    @endforeach
                                                                </select>
                                                                @error('competencies')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group-inner @error('resources') input-with-error @enderror">
                                                                <select name="resources[]" id="resources" data-placeholder="{{ __('Select') }} {{ __('los recursos') }}" class="chosen-select form-control" multiple="" tabindex="-1">
                                                                    @foreach($resources as $resource)
                                                                        @if(is_null(old('resources')))
                                                                            <option value="{{ $resource->IdResource }}">{{ $resource->Name }}</option>
                                                                        @else
                                                                            <option value="{{ $resource->IdResource }}" {{ in_array($resource->IdResource, old('resources')) ? 'selected' : '' }}>{{ $resource->Name }}</option>
                                                                        @endif
                                                                        
                                                                    @endforeach
                                                                </select>
                                                                @error('resources')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="groups">
                                    <div class="sparkline10-graph">
                                        <div class="basic-login-form-ad">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="dual-list-box-inner">
                                                        <div class="wizard-big">
                                                            <select class="form-control dual_select" multiple name="groups[]">
                                                                @foreach($grupos as $grupo)
                                                                <option value="{{$grupo->IdGroup}}">{{$grupo->Name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12" style="margin-top: 20px;">
                                                    <div class="payment-adress">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('Save') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <!--div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="url" class="form-control" placeholder="Facebook URL">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="url" class="form-control" placeholder="Twitter URL">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="url" class="form-control" placeholder="Google Plus">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="url" class="form-control" placeholder="Linkedin URL">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- duallistbox JS
        ============================================ -->
    <script src="{{ asset('js/duallistbox/jquery.bootstrap-duallistbox.js') }}"></script>
    <script src="{{ asset('js/duallistbox/duallistbox.active.js') }}"></script>
@endsection

