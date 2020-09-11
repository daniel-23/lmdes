@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Courses') }}</span>
</li>
@endsection

@section('content')

<div class="courses-area" style="margin-bottom: 50px;">
    <div class="container-fluid">
        @can('tiene-permiso','Cursos+Crear')
            <div class="row">
                <a href="{{ route('cursos.crear') }}" class="btn btn-success pull-right" style="margin-right: 30px;">{{ __('Add Course') }}</a>
            </div>
        @endcan
            
        <div class="row">
            @foreach($courses as $course)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="courses-inner res-mg-b-30">
                        <div class="courses-title">
                            <a href="#"><img src="{{ is_null($course->Image) ? asset('storage/images/courses/1.jpg') : asset('storage/'.$course->Image) }}" alt="{{ $course->ShortName }}" style="border: 3px solid {{ $course->category->Color }};"></a>
                        <div class="courses-inner-img">
                            <img src="{{ asset('storage/images/icons/curso.png') }}" alt="icono">
                        </div>
                        <h2>{{ $course->Name }}</h2>
                        </div>
                        <div class="courses-alaltic">
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                        </div>
                        <div class="course-des">
                            <p><span><i class="fa fa-clock"></i></span> <b>{{ __('Duration') }}:</b> {{ $course->duration() }}</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>{{ __('Professor') }}:</b> Jane Doe</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>{{ __('Students') }}:</b> 100+</p>
                        </div>
                        <div class="product-buttons">
                            <a href="{{ route('cursos.info',$course->IdCourse) }}" class="btn btn-primary cart-btn">{{ __('Read More') }}</a>
                            <a href="{{ route('cursos.editar',$course->IdCourse) }}" class="btn btn-default cart-btn">{{ __('Edit') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
                
        </div>
    </div>
</div>
@endsection