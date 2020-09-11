@extends('layouts.master')
@section('style')
    <!-- summernote CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/summernote/summernote.css') }}">
    <style type="text/css">

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
        .thumbnail img{
            border-radius: 0 !important;
            width: 50%;
            margin-left: 15px;
        }
        .thumbnail{
            border: 0 !important;
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
                                    <h3>{{ __('Add Module') }}</h3>
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
                                            <h3>{{ $module->Name }} <span class="comment-replay"><a href="#" data-toggle="modal" data-target="#PrimaryModalftblack" id-module="{{$module->IdModule}}" class="add-utl btn btn-info"><span class="comment-replay" style="color: #fff;">{{ __('Add Utility') }}</span></a></span></h3>
                                            {!! $module->Description !!}
                                            <div class="row" style="margin-top: 15px;">
                                                @foreach($module->forums as $forum)
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="thumbnail">
                                                            <div class="col-xs-12">
                                                                <img src="{{ asset('storage/images/icons/Foros.png') }}" alt="{{__('Forum')}}" class="img-responsive">
                                                            </div>
                                                            
                                                            <div class="caption">
                                                                <h3>
                                                                    <a href="{{ route('foros.show',$forum->IdForum) }}">
                                                                        {{$forum->Title}}
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            
                                                

                                                @foreach($module->quizzes as $quiz)
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="thumbnail">
                                                            <div class="col-xs-12 text-center">
                                                                <img src="{{ asset('storage/images/icons/Quiz.png') }}" alt="" class="img-responsive">
                                                            </div>
                                                            <div class="caption">
                                                                <h3>
                                                                    <a href="{{ route('quizzes.show',$quiz->IdQuiz) }}">{{ $quiz->Title }}</a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                                
                                                    </div>
                                                    
                                                @endforeach

                                                @foreach($module->videos as $video)
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="thumbnail">
                                                            <div class="col-xs-12 text-center">
                                                                <img src="{{ asset('storage/images/icons/Videos.png') }}" alt="" class="img-responsive">
                                                            </div>
                                                            <div class="caption">
                                                                <h3><a href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl" video-id="{{ $video->youtube_id() }}" class="open-video" title="{{ $video->Title }}">{{ $video->Title }}</a></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!--p>{{ $video->Description }}</p-->
                                                    
                                                    
                                                    <!--iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->youtube_id() }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe-->

                                                @endforeach
                                            </div>
                                            
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
                                <div class="row">
                                    @foreach($resources as $resource)
                                        <div class="col-sm-6 col-md-3">
                                            <label for="radio-{{ $resource->cnfResource->Name}}">
                                                <div class="thumbnail">
                                                    <div class="col-xs-12 text-center">
                                                        <img src="{{ asset('storage/images/icons/'.$resource->cnfResource->Name.'.png') }}" alt="" class="img-responsive">
                                                    </div>
                                                    <div class="caption">
                                                        <input type="radio" name="resource" class="reso" id="radio-{{ $resource->cnfResource->Name }}" value="{{$resource->cnfResource->IdResource}}" />
                                                        {{ $resource->cnfResource->Name}}
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer footer-modal-admin">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">{{ __('Cancel') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header header-color-modal bg-color-1">
                            <h4 class="modal-title" id="modal-video-title"></h4>
                            <div class="modal-close-area modal-close-df">
                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                            </div>
                        </div>
                        <div class="modal-body">
                            <iframe id="frame-youtube" width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ModalFile" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header header-color-modal bg-color-1">
                            <h4 class="modal-title" id="modal-video-title"></h4>
                            <div class="modal-close-area modal-close-df">
                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group-inner @error('archivo') input-with-error @enderror">
                                <label for="" id="label-archivo">{{ __('Select a file')}}</label>
                                <div class="file-upload-inner ts-forms">
                                    <div class="input prepend-small-btn">
                                        <div class="file-button">
                                            {{ __('Browse') }}
                                            <input type="file" onchange="document.getElementById('prepend-small-btn').value = this.value;" name="archivo" id="archivo">
                                        </div>
                                        <input type="text" id="prepend-small-btn" placeholder="{{ __('No file selected') }}">
                                        @error('archivo')
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    })(jQuery);
    $(document).on('click', '#crear-modulo', function(event) {
        event.preventDefault();
        $('#form-modulo').show('slow');
    }).on('click', '#cancel', function(event) {
        $('#form-modulo').hide('fast');
    }).on('click', '.add-utl', function(event) {
        $('#input-module_id').val($(this).attr('id-module'));
    }).on('click', '.open-video', function(event) {
        var title = $(this).attr('title');
        $('#modal-video-title').text(title);
        var video_id = $(this).attr('video-id');
        var url = 'https://www.youtube.com/embed/'+video_id;
        $('#frame-youtube').attr('src', url);
    }).on('change', ".reso", function(event) {
        var valor = $(this).val();
        if (valor == 7) {
            $('#PrimaryModalftblack').modal('hide');
            $('#ModalFile').modal('show');
        }
        console.log("valor", valor);

    }).on('change', '#archivo', function(event) {
        var archivo = this.files[0];
        console.log("archivo", archivo.name);
        var block = /(.html|.php|.py|.exe|.pl|.js|.jsp|.asp|.sql)$/i;
        if (block.exec(archivo.name)) {
            $('#label-archivo').append('<br> Archivo '+archivo.name+' no permitido.');
            $("#prepend-small-btn").val("{{ __('No file selected') }}");
        }else{
            var datos = new FormData();
            var modulo = $('#input-module_id').val();
            datos.append("archivo", archivo);
            datos.append("modulo_id", modulo);
            $.ajax({
                url: '{{ route('modulos.subir_archivo') }}',
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                data: datos,
            }).done(function(resp) {
                
                location.reload(true);
            });
        }
    });
</script>
@endsection