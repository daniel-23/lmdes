@extends('layouts.master')
@section('breadcome')
<li>
    <a href="{{ route('profesores') }}">{{ __('Teachers') }}</a>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Edit') }}</span>
</li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#reviews"> {{ __('Account Information') }}</a></li>
                            <li><a href="#description">{{ __('Additional Information') }}</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="reviews">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="devit-card-custom">
                                                        <form action="{{ route('profesores.editar.cuenta',$teacher->IdUser) }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name',$teacher->Name) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="last_name" class="form-control" placeholder="{{ __('Last Name') }}" value="{{ old('last_name',$teacher->LastName) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="email" class="form-control" placeholder="{{ __('Email') }}" value="{{ old('email',$teacher->Email) }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" name="code" class="form-control" placeholder="{{ __('Code') }}" value="{{ old('code',$teacher->Code) }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="password" class="form-control" name="password" placeholder="{{ __('Password') }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Password Confirmation') }}">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('Save') }}</button>
                                                        </form>
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                <form action="{{ route('profesores.editar.adicional',$teacher->IdUser) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group-inner @error('photo') input-with-error @enderror">
                                                                <div class="file-upload-inner ts-forms">
                                                                    <div class="input prepend-small-btn">
                                                                        <div class="file-button">
                                                                            {{ __('Browse') }}
                                                                            <input type="file" onchange="document.getElementById('prepend-small-btn').value = this.value;" accept="image/*" name="photo">
                                                                        </div>
                                                                        <input type="text" id="prepend-small-btn" placeholder="{{ __('Photo') }}">
                                                                        @error('photo')
                                                                        <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="gender" id="gender" class="form-control">
                                                                    <option value="">{{ __('Select Gender') }}</option>
                                                                    @if(is_null(old('gender')) && is_null($teacher->add_info))
                                                                        <option value="M">{{ __('Male') }}</option>
                                                                        <option value="F">{{ __('Female') }}</option>
                                                                    @elseif(is_null(old('gender')) && ! is_null($teacher->add_info))
                                                                        <option value="M" {{ $teacher->add_info->Gender == 'M' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                                                        <option value="F" {{ $teacher->add_info->Gender == 'F' ? 'selected' : '' }}>{{ __('Female') }}</option>
                                                                    @else
                                                                        <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                                                        <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>{{ __('Female') }}</option>
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="date" name="birthdate" class="form-control" placeholder="{{('Birthdate')}}" value="{{ old('birthdate',is_null($teacher->add_info) ? '' : $teacher->add_info->BirthDate) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" name="height" class="form-control" placeholder="{{__('Height') }}" value="{{ old('height',is_null($teacher->add_info) ? '' : $teacher->add_info->Height) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" name="weight" class="form-control" placeholder="{{__('Weight') }}" value="{{ old('weight',is_null($teacher->add_info) ? '' : $teacher->add_info->Weight) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="rh" id="rh" class="form-control">
                                                                    <option value="">{{ __('Select RH') }}</option>
                                                                    @if(is_null(old('gender')) && is_null($teacher->add_info))
                                                                        <option value="A+">A+</option>
                                                                        <option value="A-">A-</option>
                                                                        <option value="B+">B+</option>
                                                                        <option value="B-">B-</option>
                                                                        <option value="O+">O+</option>
                                                                        <option value="O-">O-</option>
                                                                        <option value="AB+">AB+</option>
                                                                        <option value="AB-">AB-</option>
                                                                    @elseif(is_null(old('rh')) && ! is_null($teacher->add_info))
                                                                        <option value="A+" {{ $teacher->add_info->RH == 'A+' ? 'selected' : '' }}>A+</option>
                                                                        <option value="A-" {{ $teacher->add_info->RH == 'A-' ? 'selected' : '' }}>A-</option>
                                                                        <option value="B+" {{ $teacher->add_info->RH == 'B+' ? 'selected' : '' }}>B+</option>
                                                                        <option value="B-" {{ $teacher->add_info->RH == 'B-' ? 'selected' : '' }}>B-</option>
                                                                        <option value="O+" {{ $teacher->add_info->RH == 'O+' ? 'selected' : '' }}>O+</option>
                                                                        <option value="O-" {{ $teacher->add_info->RH == 'O-' ? 'selected' : '' }}>O-</option>
                                                                        <option value="AB+" {{ $teacher->add_info->RH == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                                        <option value="AB-" {{ $teacher->add_info->RH == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                                    @else
                                                                        <option value="A+" {{ old('rh') == 'A+' ? 'selected' : '' }}>A+</option>
                                                                        <option value="A-" {{ old('rh') == 'A-' ? 'selected' : '' }}>A-</option>
                                                                        <option value="B+" {{ old('rh') == 'B+' ? 'selected' : '' }}>B+</option>
                                                                        <option value="B-" {{ old('rh') == 'B-' ? 'selected' : '' }}>B-</option>
                                                                        <option value="O+" {{ old('rh') == 'O+' ? 'selected' : '' }}>O+</option>
                                                                        <option value="O-" {{ old('rh') == 'O-' ? 'selected' : '' }}>O-</option>
                                                                        <option value="AB+" {{ old('rh') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                                        <option value="AB-" {{ old('rh') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                                        
                                                                    @endif
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input type="text" name="health_care_entity" id="health_care_entity" class="form-control" placeholder="{{ __('Health Care Entity') }}" value="{{ old('health_care_entity',is_null($teacher->add_info) ? '' : $teacher->add_info->HealthCareEntity) }}">
                                                            </div>
                                                            <div class="form-group edit-ta-resize res-mg-t-15">
                                                                <textarea name="health_care_type" placeholder="Health Care Type">{{ old('health_care_type',is_null($teacher->add_info) ? '' : $teacher->add_info->HealthCareType) }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="health_care_contact_name" id="health_care_contact_name" class="form-control" placeholder="{{ __('Health Care Contact Name') }}" value="{{ old('health_care_contact_name',is_null($teacher->add_info) ? '' : $teacher->add_info->HealthCareContactName) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="health_care_contact_phone" id="health_care_contact_phone" class="form-control" placeholder="{{ __('Health Care Contact Phone') }}" value="{{ old('health_care_contact_phone',is_null($teacher->add_info) ? '' : $teacher->add_info->HealthCareContactPhone) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
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
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        
        if ($('#info').html().trim() == '') {
            $('#btn-save').css('display', 'none');
        }
    })
    .on('click', '#add', function(event) {
        $('#info').append(`<div class="form-group col-md-4">
            <input type="text" name="name[]" class="form-control" placeholder="{{ __('Name') }}">
            </div>
            <div class="form-group col-md-4">
            <input type="text" name="type[]" class="form-control" placeholder="{{ __('Type') }}">
            </div>
            <div class="form-group col-md-4">
            <input type="text" name="description[]" class="form-control" placeholder="{{ __('Description') }}">
            </div>`);
        $('#btn-save').css('display', 'block');
    }).on('click', '.delete', function(event) {
        $(this).parent().parent().remove();
    });
</script>
@endsection