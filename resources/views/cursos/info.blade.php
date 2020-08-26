@extends('layouts.master')
@section('style')
    <!-- summernote CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/summernote/summernote.css') }}">
    <style type="text/css">
        /* HIDE RADIO */
    [type=radio] { 
      position: absolute;
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* IMAGE STYLES */
    [type=radio] + img {
      cursor: pointer;
      width: 70px;
      height: 70px;
      border-radius: 10px;
    }

    /* CHECKED STYLES */
    [type=radio]:checked + img {
      outline: 2px solid #1564d2;

    }
    </style>
@endsection
@section('breadcome')

<li>
    <a href="{{ route('cursos') }}">{{ __('Courses') }}</a>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ $course->Name }}</span>
</li>
@endsection
@section('content')
	<div class="blog-details-area mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-details-inner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="latest-blog-single blog-single-full-view">
                                    <div class="blog-image">
                                        <a href="#"><img src="{{ is_null($course->Image) ? asset('storage/images/courses/1.jpg') : asset('storage/'.$course->Image) }}" alt="{{ $course->ShortName }}" class="img-responsive" />
											</a>
                                        <div class="blog-date">
                                            <p><span class="blog-day">20</span> May</p>
                                        </div>
                                    </div>
                                    <div class="blog-details blog-sig-details">
                                        <div class="details-blog-dt blog-sig-details-dt courses-info mobile-sm-d-n">
                                            <span><a href="#"><i class="fa fa-user"></i> <b>Course Name:</b> {{ $course->Name }}</a></span>
                                            <span><a href="#"><i class="fa fa-heart"></i> <b>Course Price:</b> $3000</a></span>
                                            <span><a href="#"><i class="fa fa-comments-o"></i> <b>Professor Name:</b> Alva Adition</a></span>
                                        </div>
                                        <h1>
                                            <a class="blog-ht" href="#">{{ $course->Name }}</a>
                                            <a href="{{ route('cursos.add_modulo',$course->IdCourse) }}" class="btn btn-success btn-md pull-right" id="crear-modulo">{{ __('Create Module') }}</a>
                                        </h1>
                                        <p>{!! $course->Description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="display: none;" id="form-modulo">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="comment-head">
                                    <h3>{{ __('Agregar Módulo') }}</h3>
                                </div>
                            </div>
                            <form action="{{ route('cursos.add_modulo',$course->IdCourse) }}" method="POST" class="addcourse" id="demo1-upload" enctype="multipart/form-data">
                                @csrf
                                <div class="row" style="padding: 10px">
                                    <div class="col-md-6">
                                        <div class="form-group-inner @error('name') input-with-error @enderror">
                                            <input name="name" type="text" class="form-control" placeholder="{{ __('Module Name') }}" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group-inner @error('module_parent') input-with-error @enderror">
                                            <select name="module_parent" id="module_parent" class="form-control">
                                                <option disabled selected>{{ __('Module Parent') }}</option>
                                                @foreach($course->modules as $module)
                                                    <option value="{{ $module->IdModule }}">{{ $module->Name }}</option>
                                                @endforeach
                                            </select>
                                            @error('module_parent')
                                            <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding: 10px">
                                    <div class="col-xs-12" style="margin-top: 20px;">
                                        
                                            <textarea name="description" id="summernote2">{{ old('description') }}</textarea>
                            
                                            @error('description')
                                            <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                            @enderror
                                        
                                    </div>

                                    

                                    <!--div class="col-md-6" style="margin-top: 20px;">
                                        <div class="form-group-inner @error('resources') input-with-error @enderror">
                                            <select name="resources[]" id="resources" data-placeholder="{{ __('Select') }} {{ __('los recursos') }}" class="chosen-select form-control" multiple="" tabindex="-1">
                                                @foreach($resources as $resource)
                                                    @if(is_null(old('resources')))
                                                        <option value="{{ $resource->IdCrsResource }}">{{ $resource->cnfResource->Name }}</option>
                                                    @else
                                                        <option value="{{ $resource->IdCrsResource }}" {{ in_array($resource->IdCrsResource, old('resources')) ? 'selected' : '' }}>{{ $resource->cnfResource->Name }}</option>
                                                    @endif
                                                    
                                                @endforeach
                                            </select>
                                            @error('resources')
                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                            @enderror
                                        </div>
                                    </div-->

                                        

                                </div>
                                <div class="row" style="padding: 10px">
                                    <div class="col-lg-12" style="margin-top: 20px;">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('Save') }}</button>
                                        <input type="reset" class="btn btn-default pull-right" value="{{ __('Cancel') }}" id="cancel">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="comment-head">
                                    <h3>{{ __('Modules') }}</h3>
                                </div>
                            </div>
                        </div>
                            
                            
                        @foreach($course->modules as $module)
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="user-comment admin-comment">
                                        <div class="comment-details">
                                            <h4>{{ $module->Name }} <span class="comment-replay"><a href="#" data-toggle="modal" data-target="#PrimaryModalftblack" id-module="{{$module->IdModule}}" class="add-utl"><span class="comment-replay">{{ __('Add Utility') }}</span></a></span></h4>
                                            {!! $module->Description !!}
                                            <ul>
                                            @foreach($module->forums as $forum)
                                            <li><a href="{{ route('foros.show',$forum->IdForum) }}">{{$forum->Title}}</a></li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <div id="PrimaryModalftblack" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                        <form action="{{ route('utilidades.agregar',$course->IdCourse) }}" method="POST">
                            @csrf
                            <input type="hidden" name="module_id" id="input-module_id">
                        <div class="modal-body" style="color: white;">
                            <i class="educate-icon educate-checked modal-check-pro"></i>
                            <h2>{{__('Utilities') }}</h2>
                            <ul>   
                                @foreach($resources as $resource)
                                
                                    <label for="radio-{{ $resource->cnfResource->Name}}">
                                        <input type="radio" name="resource" id="radio-{{ $resource->cnfResource->Name }}" value="{{$resource->IdCrsResource}}" />
                                        <img src="{{ asset('storage/images/icons/'.$resource->cnfResource->Name.'.png') }}" alt="{{ $resource->cnfResource->Name}}">
                                        {{ $resource->cnfResource->Name}}
                                    </label><br />
                                @endforeach
                                
                            </ul>
                        </div>
                        <div class="modal-footer footer-modal-admin">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('js/summernote/summernote.min.js') }}"></script>
<script type="text/javascript">
    (function ($) {
            $('#summernote2').summernote({
                height: 200,
                placeholder: '{{ __('Description') }}',
            });
        })(jQuery);
    $(document).on('click', '#crear-modulo', function(event) {
        event.preventDefault();
        $('#form-modulo').show('slow');
    }).on('click', '#cancel', function(event) {
        $('#form-modulo').hide('fast');
    }).on('click', '.add-utl', function(event) {
        $('#input-module_id').val($(this).attr('id-module'));
    });
</script>
@endsection