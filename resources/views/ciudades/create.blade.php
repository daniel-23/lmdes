@extends('layouts.master')

@section('content')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @include('layouts.header')
        
        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>{{ __('Create City') }}</h1>

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
                                                <form action="{{ route('ciudades.crear') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('country_id') input-with-error @enderror">
                                                                <label for="country_id">{{ __('Country') }}</label>

                                                                <select name="country_id" id="country_id" class="form-control">
                                                                    <option value="" disabled selected>{{ __('Select') }}...</option>
                                                                    @foreach($countries as $country)
                                                                        <option value="{{ $country->IdCountry }}" {{ old('country_id') == $country->IdCountry ? 'selected' : '' }}>{{ $country->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                
                                                                @error('country_id')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('state_id') input-with-error @enderror">
                                                                <label for="state_id">{{ __('State') }}</label>

                                                                <select name="state_id" id="state_id" class="form-control">
                                                                    <option value="" id="sele">{{ __('Select') }}...</option>
                                                                </select>
                                                                
                                                                @error('state_id')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        

                                                        
                                                    </div>

                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12 col-md-6">
                                                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                                                <label for="name">{{ __('Name') }}</label>
                                                                <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}">
                                                                @error('name')
                                                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row" style="margin-top: 15px;">
                                                        <div class="col-xs-12">
                                                            <button type="submit" class="btn btn-custon-four btn-primary"><i class="far fa-save"></i> {{ __('Save') }}</button>
                                                            <a href="{{ route('ciudades') }}" class="btn btn-custon-four btn-default pull-right">
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

        @include('layouts.footer')
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        @if(!is_null(old('state_id')))
        var state_id = {{ old('state_id') }};
        var country_id = {{ old('country_id') }};

        $.ajax({
            url: '/ciudades/traer-estados/'+country_id,
        })
        .done(function(resp) {
            if (resp.length > 0) {
                var opciones = '';
                $.each(resp, function(index, val) {
                    if (val.IdState == state_id) {
                        opciones = opciones + '<option value="'+val.IdState+'" selected>'+val.Name+'<option>';
                    } else {
                        opciones = opciones + '<option value="'+val.IdState+'">'+val.Name+'<option>';
                    }
                    
                });
                $('#state_id').html(opciones);


            } else {
                $('#state_id').html('<option value="">{{ __('Cities not found') }}<option>');
            }
            
        });
        

        @endif
        $('#country_id').change(function(event) {
            /* Act on the event */
            //console.log($(this).val().length);
            if ($(this).val().length) {
                var IdCountry = $(this).val();

                $.ajax({
                    url: '/ciudades/traer-estados/'+IdCountry,
                })
                .done(function(resp) {
                    console.log("resp", resp);
                    if (resp.length > 0) {
                        $('#state_id').html('');
                        var opciones = '';
                        $.each(resp, function(index, val) {
                            console.log("val", val);
                            opciones = opciones + '<option value="'+val.IdState+'">'+val.Name+'</option>';
                            $('#state_id').append('<option value="'+val.IdState+'">'+val.Name+'</option>');
                        });
                        //$('#state_id').html(opciones);


                    } else {
                        $('#state_id').html('<option value="">{{ __('Cities not found') }}</option>');
                    }
                    
                });
                
            }

        });
    });
</script>
@endsection

