@extends('layouts.master')
@section('breadcome')
<li>
    <span class="bread-blod">{{ __('Security') }}</span>
    <span class="bread-slash">/</span>
</li>
<li>
    <a href="{{ route('usuarios') }}">{{ __('Users') }}</a>
    <span class="bread-slash">/</span>
</li>
<li>
    <span class="bread-blod">{{ __('Edit') }}</span>
</li>
@endsection
@section('content')
    <div class="basic-form-area mg-b-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>{{ __('Edit User') }}</h1>

                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="{{ route('usuarios.editar',$user->IdUser) }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('name') input-with-error @enderror">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $user->Name }}">
                                                            @error('name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('last_name') input-with-error @enderror">
                                                            <label for="last_name">{{ __('Last Name') }}</label>
                                                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name')  ?? $user->LastName }}">
                                                            @error('last_name')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('email') input-with-error @enderror">
                                                            <label for="email">{{ __('Email') }}</label>
                                                            <input type="text" class="form-control" name="email" id="email" value="{{ old('email')  ?? $user->Email }}">
                                                            @error('email')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group-inner @error('role') input-with-error @enderror">
                                                            <label for="role">Role</label>
                                                            <select name="role" id="rolr" class="form-control">
                                                                <option value="">Select</option>
                                                                <?php $rolUser = $user->roles()->first()->IdRole ?? 0; ?>
                                                                @foreach($roles as $role)
                                                                    @if(is_null(old('role')))
                                                                        <option value="{{ $role->IdRole }}" {{ $rolUser == $role->IdRole ? 'selected' : '' }}>{{ $role->Name }}</option>
                                                                    @else
                                                                        <option value="{{ $role->IdRole }}" {{ old('role') == $role->IdRole ? 'selected' : '' }}>{{ $role->Name }}</option>
                                                                    @endif
                                                                    
                                                                @endforeach
                                                            </select>
                                                            @error('role')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row" style="margin-top: 15px; @if($user->roles()->first()->IdRole == 1 ||old('role') == 1)display: none;@endif" id="company_id-container">
                                                    <div class="col-xs-12">
                                                        <div class="form-group-inner @error('company_id') input-with-error @enderror">
                                                            
                                                            <select name="company_id" id="company_id" class="form-control">
                                                                <option value="">Seleccione la Institución</option>
                                                                @foreach($companies as $company)
                                                                    <option value="{{ $company->IdCompany }}" {{ old('company_id') == $company->IdCompany ? 'selected' : '' }}>{{ $company->Name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('company_id')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 15px;">

                                                    <div class="col-xs-12 col-md-6">
                                                        <div id="pwd-container1">
                                                            <div class="form-group-inner @error('password') input-with-error @enderror">
                                                                <label for="password1">{{ __('Password') }}</label>
                                                                <div class="input-group @error('password') input-with-error @enderror">
                                                                    <input type="password" class="form-control example1" id="password1" value="{{ old('password') }}" name="password">
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
                                                            <label for="password_confirmation">{{ __('Password Confirmation') }}</label>
                                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">

                                                            @error('password_confirmation')
                                                                <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-xs-12">
                                                        <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                        <a href="{{ route('usuarios') }}" class="btn btn-custon-four btn-default pull-right">
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
            $('#password').attr('type', 'text');
            $('#password_confirmation').attr('type', 'text');
            $(this).attr('id', 'ocP');
            $(this).html('<i class="fas fa-eye-slash"></i>');

        }).on('click', '#ocP', function(event) {
            $('#password').attr('type', 'password');
            $('#password_confirmation').attr('type', 'password');
            $(this).attr('id', 'msP');
            $(this).html('<i class="fas fa-eye"></i>');
        }).on('submit', '#form-users', function(event) {
            var PasswordStrength = {{ $PasswordStrength }};

            if ($('#password1').val().trim().length < 1) {
                return true;
            }

            if (PasswordStrength == 0) {
                return true;
            } else if(PasswordStrength == 1) {
                if ($('#password1').val().trim().length < 5) {
                    Lobibox.notify('warning', {
                        showClass: 'bounceIn',
                        hideClass: 'bounceOut',
                        msg: 'Password no cumple los requisitos.'
                    });
                    return false;
                }

            }else if(PasswordStrength == 2){
                var expR = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z]{6,}[^'\s]/;
                var pwd = $('#password1').val().trim();
                if (!expR.test(pwd)) {
                    Lobibox.notify('warning', {
                        showClass: 'bounceIn',
                        hideClass: 'bounceOut',
                        msg: 'Password no cumple los requisitos.'
                    });
                    return false;
                }

            }else{
                var expR = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.;,_{}])[A-Za-z\d$@$!%*?&.;,_{}]{8,}[^'\s]/;
                var pwd = $('#password1').val().trim();
                if (!expR.test(pwd)) {
                    Lobibox.notify('warning', {
                        showClass: 'bounceIn',
                        hideClass: 'bounceOut',
                        msg: 'Password no cumple los requisitos.'
                    });
                    return false;
                }
            }

            return true;
            

        });
        
    });
</script>
@endsection
