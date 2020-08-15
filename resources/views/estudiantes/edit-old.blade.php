@extends('layouts.master')
@section('breadcome')
<li>
    <a href="{{ route('estudiantes') }}">{{ __('Students') }}</a>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Edit') }}</span>
</li>
@endsection

@section('content')
    <!-- Start Welcome area -->
    
    <div class="basic-form-area mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>{{ __('Edit Student') }}</h1>

                            </div>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="{{ route('estudiantes.editar',$student->IdUser) }}" method="POST" id="form-users">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('name') input-with-error @enderror">
                                                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$student->Name) }}" required placeholder="{{ __('Name') }}">
                                                            @error('name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('last_name') input-with-error @enderror">
                                                            
                                                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name',$student->LastName) }}" required placeholder="{{ __('Last Name') }}">
                                                            @error('last_name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 15px;">

                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('email') input-with-error @enderror">
                                                            
                                                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email',$student->Email) }}" required placeholder="{{ __('Email') }}">
                                                            @error('email')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('code') input-with-error @enderror">
                                                            <input type="text" class="form-control" name="code" id="code" value="{{ old('code',$student->Code) }}" required placeholder="{{ __('Code') }}">
                                                            @error('code')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row" style="margin-top: 15px;">

                                                    <div class="col-xs-12">
                                                        <div class="form-group-inner @error('email') input-with-error @enderror">
                                                            
                                                            <select name="groups[]" id="groups" data-placeholder="{{ __('Select Groups') }}" class="chosen-select form-control" multiple="" tabindex="-1">
                                                                    @foreach($groups as $group)
                                                                        @if(is_null(old('groups')))
                                                                            <option value="{{ $group->IdGroup }}" {{ $groupsStudent->contains($group->IdGroup) ? 'selected' : '' }}>{{ $group->Name }}</option>

                                                                        @else
                                                                            <option value="{{ $group->IdGroup }}" {{ in_array($group->IdGroup, old('groups')) ? 'selected' : '' }}>{{ $group->Name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            @error('groups')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12 col-md-6">
                                                        <div id="pwd-container1">
                                                            <div class="form-group-inner @error('password') input-with-error @enderror">
                                                                
                                                                <div class="input-group @error('password') input-with-error @enderror">
                                                                    <input type="password" class="form-control example1" id="password1" value="{{ old('password') }}" name="password" placeholder="{{ __('Password') }}">
                                                                    <span
                                                                        class="input-group-addon"
                                                                        title="Mostrar"
                                                                        id="msP"
                                                                        style="cursor: pointer;"
                                                                        >
                                                                        <i class="fas fa-eye"></i>
                                                                    </span>
                                                                </div>
                                                                @error('password')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                                    
                                                            </div>
                                                            <div class="form-group mg-b-pass">
                                                                <div class="pwstrength_viewport_progress"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('password_confirmation') input-with-error @enderror">
                                                            
                                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="{{ __('Password Confirmation') }}">

                                                            @error('password_confirmation')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                        
                                                </div>

                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12">
                                                        <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                        <a href="{{ route('estudiantes') }}" class="btn btn-custon-four btn-default pull-right">
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


@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {

        var lang = $('html').attr('lang');

        var options1 = {};
            options1.ui = {
                container: "#pwd-container1",
                showVerdictsInsideProgressBar: true,
                viewports: {
                    progress: ".pwstrength_viewport_progress"
                }
            };
            options1.common = {
                debug: false,

            };
        $('.example1').pwstrength(options1);

        $(document).on('click', '#msP', function(event) {
            $('#password1').attr('type', 'text');
            $('#password_confirmation').attr('type', 'text');
            $(this).attr('id', 'ocP');
            $(this).html('<i class="fas fa-eye-slash"></i>');

        }).on('click', '#ocP', function(event) {
            $('#password1').attr('type', 'password');
            $('#password_confirmation').attr('type', 'password');
            $(this).attr('id', 'msP');
            $(this).html('<i class="fas fa-eye"></i>');
        }).on('change', '#rolr', function(event) {
            if ($(this).val() == 2) {
                $('#company_id-container').show('fast');
                $('#company_id').attr('required', true);
            }else{
                $('#company_id-container').hide('fast');
                $('#company_id').attr('required', false);
            }
        });
        

    });
</script>
@endsection
