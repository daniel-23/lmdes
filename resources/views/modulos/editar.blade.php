@extends('layouts.master')
@section('breadcome')
<li>
    <a href="{{ route('cursos') }}">{{ __('Courses') }}</a>
    <span class="bread-slash">/</span>
</li>
<li>
    <a href="{{ route('cursos.info',$module->course->IdCourse) }}">{{ $module->course->Name }}</a>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Agregar Módulo') }}</span>
</li>
@endsection
@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Detalles del Módulo</a></li>
                            
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad addcoursepro">
                                                <form {{ route('modulos.editar',$module->IdModule) }}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                                                <input name="name" type="text" class="form-control" placeholder="Module Name" value="{{ old('name',$module->Name) }}">
                                                                @error('name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        	<div class="form-group-inner @error('description') input-with-error @enderror">
                                                                <input name="description" type="text" class="form-control" placeholder="Description" value="{{ old('description',$module->Description) }}">
                                                                @error('description')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6" style="margin-top: 20px;">
                                                        	<div class="form-group-inner @error('module_parent') input-with-error @enderror">
                                                        		<select name="module_parent" id="module_parent" class="form-control">
                                                        			<option value="">Module Parent</option>
                                                        			@foreach($module->course->modules as $modulo)
                                                                        @if($module->IdModule != $modulo->IdModule)
                                                                            <option value="{{ $modulo->IdModule }}" @if($module->IdModuleParent == $modulo->IdModule) selected @endif>{{ $modulo->Name }}</option>
                                                                        @endif
                                                        				
                                                        			@endforeach
                                                        		</select>
                                                                @error('module_parent')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6" style="margin-top: 20px;">
                                                            <div class="form-group-inner @error('resources') input-with-error @enderror">
                                                                <select name="resources[]" id="resources" data-placeholder="{{ __('Select') }} {{ __('los recursos') }}" class="chosen-select form-control" multiple="" tabindex="-1">
                                                                    @foreach($module->course->resources as $resource)
                                                                        @if(is_null(old('resources')))
                                                                            <option value="{{ $resource->pivot->IdCrsResource }}" @if(in_array($resource->pivot->IdCrsResource, $crsResources)) selected @endif >{{ $resource->Name }}</option>
                                                                        @else
                                                                            <option value="{{ $resource->pivot->IdCrsResource }}" {{ in_array($resource->IdCrsResource, old('resources')) ? 'selected' : '' }}>{{ $resource->cnfResource->Name }}</option>
                                                                        @endif
                                                                        
                                                                    @endforeach
                                                                </select>
                                                                @error('resources')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
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
    </div>
@endsection

