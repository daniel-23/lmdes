@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Teachers') }}</span>
</li>
@endsection

@section('content')
<!-- Static Table Start -->
<div class="contacts-area mg-b-15">
    <div class="container-fluid">
        @can('tiene-permiso','Profesores+Crear')
            <div class="row">
                <a href="{{ route('profesores.crear') }}" class="btn btn-success pull-right" style="margin-right: 30px;">{{ __('Add Teacher') }}</a>
            </div>
        @endcan
        <div class="row">
            @foreach($teachers as $teacher)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="student-inner-std res-mg-b-30">
                        <div class="student-img">
                            <img src="{{ is_null($teacher->add_info) || is_null($teacher->add_info->Photo) ? asset('storage/images/teacher/1.jpg') : asset('storage/'.$teacher->add_info->Photo) }}" alt="image" />
                        </div>
                        <div class="student-inner-img">
                            <img src="{{ asset('storage/images/icons/profesor.png') }}" alt="">
                        </div>
                        <div class="student-dtl">
                            <h2>{{ $teacher->Name }}</h2>
                            <p class="dp">Perfil</p>
                            <p class="dp-ag"><b>Categoría</p>
                            <div class="product-buttons">
                                <button type="button" class="button-default cart-btn">Ver perfil</button>
                                <br>
                                <a href="{{ route('profesores.editar',$teacher->IdUser) }}" class="btn btn-sm btn-default">{{ __('Edit') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</div>
<!-- Static Table End -->
@endsection