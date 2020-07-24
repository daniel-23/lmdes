<div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
            
                <form action="{{ route('competencias.crear') }}" method="POST" id="form-crear" style="display: none;">
                    @csrf
                    <input type="hidden" name="parent" id="parent">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group-inner @error('name') input-with-error @enderror">
                                <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}" placeholder="{{ __('Name') }}">
                                @error('name')
                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group-inner @error('description') input-with-error @enderror">
                                <input type="text" class="form-control" name="description" id="description"  value="{{ old('description') }}" placeholder="{{ __('Description') }}">
                                @error('description')
                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group-inner @error('scale') input-with-error @enderror">
                                <select name="scale" id="scale" class="form-control">
                                    <option value="">{{ __('Select') }} {{ __('Scale') }}</option>
                                    @foreach($scales as $scale)
                                        <option value="{{ $scale->IdScale }}" {{ old('scale') == $scale->IdScale ? 'selected' : '' }}>{{ $scale->Name }}</option>
                                    @endforeach
                                </select>
                                @error('scale')
                                    <span class="help-block small" style="color: red;">{{ __($message) }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-custon-four btn-primary pull-left"><i class="far fa-save"></i> {{ __('Save') }}</button>
                            <input type="reset" class="btn btn-custon-four btn-default pull-right" value="{{ __('Cancel') }}" id="cancelar">
                            
                        </div>
                    </div>
                </form>

                <div id="listado" style="display: none;">
                    <h3>Competencias <button class="btn btn-success btn-sm pull-right crear-componente">Crear Competencia</button></h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="body-table">
                            
                        </tbody>
                    </table>
                </div>

                    
                
                
            </div>
            
        </div>
    </div>
</div>