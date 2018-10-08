@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.visitantes.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.visitantes.fields.ci')</th>
                            <td field-key='ci'>{{ $visitante->ci }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.visitantes.fields.nombres-apellidos')</th>
                            <td field-key='nombres_apellidos'>{{ $visitante->nombres_apellidos }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.visitantes.fields.telefono')</th>
                            <td field-key='telefono'>{{ $visitante->telefono }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.visitantes.fields.correo')</th>
                            <td field-key='correo'>{{ $visitante->correo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.visitantes.fields.procedencia')</th>
                            <td field-key='procedencia'>{{ $visitante->procedencia }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.visitantes.fields.motivo')</th>
                            <td field-key='motivo'>{{ $visitante->motivo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.visitantes.fields.fecha-entrada')</th>
                            <td field-key='fecha_entrada'>{{ $visitante->fecha_entrada }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.visitantes.fields.fecha-salida')</th>
                            <td field-key='fecha_salida'>{{ $visitante->fecha_salida }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.visitantes.fields.observaciones')</th>
                            <td field-key='observaciones'>{{ $visitante->observaciones }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.visitantes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
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
