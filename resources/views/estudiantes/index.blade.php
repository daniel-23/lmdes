@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Students') }}</span>
</li>

@endsection

@section('content')
<!-- Static Table Start -->
<div class="contacts-area mg-b-15">
    <div class="container-fluid">
        @can('tiene-permiso','Estudiantes+Crear')
            <div class="row">
                <a href="{{ route('estudiantes.crear') }}" class="btn btn-success pull-right" style="margin-right: 30px;">{{ __('Add Student') }}</a>
            </div>
        @endcan
        <div class="row">
            @foreach($students as $student)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="student-inner-std res-mg-b-30">
                        <div class="student-img">
                            <img src="{{ is_null($student->add_info) || is_null($student->add_info->Photo) ? asset('storage/images/student/1.jpg') : asset('storage/'.$student->add_info->Photo) }}" alt="image" />
                        </div>
                        <div class="student-inner-img">
                            <img src="{{ asset('storage/images/icons/estudiante.png') }}" alt="icon">
                        </div>
                        <div class="student-dtl">
                            <h2>{{ $student->Name.' '.$student->LastName }}</h2>
                            <p class="dp">Grado Quinto</p>
                            <p class="dp-ag"><b>Edad:</b> 10 Años</p>
                        <div class="product-buttons">
                            <a href="{{ route('estudiantes.perfil',$student->IdUser) }}" class="btn btn-primary btn-sm">Ver perfil</a>
                            <br>
                            <a href="{{ route('estudiantes.editar',$student->IdUser) }}" class="btn btn-sm btn-default">{{ __('Edit') }}</a>
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