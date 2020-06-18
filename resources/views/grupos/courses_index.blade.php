@extends('layouts.master')

@section('content')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @include('layouts.header')

        <div class="mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>{{ __('Add') }} <span class="table-project-n">{{ __('Course for group') }} {{ $group->Name}}</span></h1>

                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __(session('success')) }}
                                    </div>
                                @endif
                            </div>
                            <div class="sparkline13-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="{{ route('grupos.cursos',$group->IdGroup) }}" method="POST">
                                                    @csrf
                                                    <div class="row">

                                                        <div class="col-xs-12">
                                                            <div class="form-group-inner @error('course') input-with-error @enderror">
                                                                <label for="course">{{ __('Course') }}</label>
                                                                <select name="course" id="course" class="form-control">
                                                                    <option value="">{{ __('Select') }}...</option>
                                                                    @foreach($courses as $curso)
                                                                        <option value="{{ $curso->IdCourse }}" {{ old('course') == $curso->IdCourse ? 'selected' : '' }}>{{ $curso->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('course')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12">
                                                            <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                            <a href="{{ route('grupos') }}" class="btn btn-custon-four btn-default pull-right">
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
        
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>{{ __('List') }} <span class="table-project-n">{{ __('Courses for group') }} {{ $group->Name}}</span> &nbsp;  
                                    </h1>

                                </div>
                                
                            </div>

                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">{{ __('Export Basic') }}</option>
                                            <option value="all">{{ __('Export All') }}</option>
                                            <!--option value="selected">Export Selected</option-->
                                        </select>
                                    </div>
                                    <table
                                        id="table"
                                        data-toggle="table"
                                        data-search="true"
                                        data-show-pagination-switch="true"
                                        data-pagination="true"
                                        data-show-columns="true"
                                        data-show-pagination-switch="true"
                                        data-show-refresh="true"
                                        data-key-events="true"
                                        data-show-toggle="true"
                                        data-resizable="true"
                                        data-show-export="true"
                                        data-toolbar="#toolbar"
                                        >
                                        
                                        <thead>
                                            <tr>
                                                <th data-field="IdCountry">ID</th>
                                                <th data-field="Name">{{ __('Name') }}</th>
                                                <th data-field="Description">{{ __('Category') }}</th>
                                                <th data-field="btns">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($group->courses as $course)
                                            <tr>
                                                <td>{{ $course->IdCourse }}</td>
                                                <td>{{ $course->Name }}</td>
                                                <td>{{ $course->category->Name }}</td>
                                                <td>
                                                    
                                                    &nbsp;   
                                                    <a href="{{ url('/grupos/cursos/'.$group->IdGroup.'/eliminar/'.$course->pivot->IdCnf_Courses_has_Sec_Groups) }}" title="{{ __('Delete') }}" class="btn btn-custon-four btn-danger btn-xs">
                                                        <i class="fas fa-times-circle" style="color: white;"></i>
                                                    <a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->


        @include('layouts.footer')
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('#table').bootstrapTable();
        });

        
    </script>      
@endsection
