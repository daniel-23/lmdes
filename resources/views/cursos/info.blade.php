@extends('layouts.master')
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
                                        <h1><a class="blog-ht" href="#">{{ $course->Name }}</a></h1>
                                        <p>{{ $course->Description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="comment-head">
                                    <h3><a href="{{ route('cursos.add_modulo',$course->IdCourse) }}">{{ __('Create Module') }}</a></h3>
                                </div>
                            </div>
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
                                    <div class="user-comment">
                                        <img src="img/contact/1.jpg" alt="" />
                                        <div class="comment-details">
                                            <h4>{{ $module->Name }} <a href="{{ route('modulos.editar',$module->IdModule) }}"><span class="comment-replay">Edit</span></a></h4>
                                            <p>{{ $module->Description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection