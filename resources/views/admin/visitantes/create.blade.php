@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.visitantes.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.visitantes.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ci', trans('quickadmin.visitantes.fields.ci').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('ci', old('ci'), ['class' => 'form-control', 'placeholder' => 'Cedula de Identidad', 'required' => '']) !!}
                    <p class="help-block">Cedula de Identidad</p>
                    @if($errors->has('ci'))
                        <p class="help-block">
                            {{ $errors->first('ci') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nombres_apellidos', trans('quickadmin.visitantes.fields.nombres-apellidos').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombres_apellidos', old('nombres_apellidos'), ['class' => 'form-control', 'placeholder' => 'Nombres y Apellidos', 'required' => '']) !!}
                    <p class="help-block">Nombres y Apellidos</p>
                    @if($errors->has('nombres_apellidos'))
                        <p class="help-block">
                            {{ $errors->first('nombres_apellidos') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('telefono', trans('quickadmin.visitantes.fields.telefono').'', ['class' => 'control-label']) !!}
                    {!! Form::text('telefono', old('telefono'), ['class' => 'form-control', 'placeholder' => 'Teléfono de contacto']) !!}
                    <p class="help-block">Teléfono de contacto</p>
                    @if($errors->has('telefono'))
                        <p class="help-block">
                            {{ $errors->first('telefono') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correo', trans('quickadmin.visitantes.fields.correo').'', ['class' => 'control-label']) !!}
                    {!! Form::text('correo', old('correo'), ['class' => 'form-control', 'placeholder' => 'Correo Electrónico']) !!}
                    <p class="help-block">Correo Electrónico</p>
                    @if($errors->has('correo'))
                        <p class="help-block">
                            {{ $errors->first('correo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('procedencia', trans('quickadmin.visitantes.fields.procedencia').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('procedencia', old('procedencia'), ['class' => 'form-control', 'placeholder' => 'Procedencia', 'required' => '']) !!}
                    <p class="help-block">Procedencia</p>
                    @if($errors->has('procedencia'))
                        <p class="help-block">
                            {{ $errors->first('procedencia') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('motivo', trans('quickadmin.visitantes.fields.motivo').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('motivo', old('motivo'), ['class' => 'form-control', 'placeholder' => 'Motivo de la visita', 'required' => '']) !!}
                    <p class="help-block">Motivo de la visita</p>
                    @if($errors->has('motivo'))
                        <p class="help-block">
                            {{ $errors->first('motivo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fecha_entrada', trans('quickadmin.visitantes.fields.fecha-entrada').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('fecha_entrada', old('fecha_entrada'), ['class' => 'form-control datetime', 'placeholder' => 'Fecha de entrada a la institución', 'required' => '']) !!}
                    <p class="help-block">Fecha de entrada a la institución</p>
                    @if($errors->has('fecha_entrada'))
                        <p class="help-block">
                            {{ $errors->first('fecha_entrada') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fecha_salida', trans('quickadmin.visitantes.fields.fecha-salida').'', ['class' => 'control-label']) !!}
                    {!! Form::text('fecha_salida', old('fecha_salida'), ['class' => 'form-control datetime', 'placeholder' => 'Fecha de salida de la institución']) !!}
                    <p class="help-block">Fecha de salida de la institución</p>
                    @if($errors->has('fecha_salida'))
                        <p class="help-block">
                            {{ $errors->first('fecha_salida') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('observaciones', trans('quickadmin.visitantes.fields.observaciones').'', ['class' => 'control-label']) !!}
                    {!! Form::text('observaciones', old('observaciones'), ['class' => 'form-control', 'placeholder' => 'Observaciones generales']) !!}
                    <p class="help-block">Observaciones generales</p>
                    @if($errors->has('observaciones'))
                        <p class="help-block">
                            {{ $errors->first('observaciones') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop