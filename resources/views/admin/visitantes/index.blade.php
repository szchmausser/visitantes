@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.visitantes.title')</h3>
    @can('visitante_create')
    <p>
        <a href="{{ route('admin.visitantes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('visitante_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.visitantes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.visitantes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($visitantes) > 0 ? 'datatable' : '' }} @can('visitante_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('visitante_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.visitantes.fields.ci')</th>
                        <th>@lang('quickadmin.visitantes.fields.nombres-apellidos')</th>
                        <th>@lang('quickadmin.visitantes.fields.telefono')</th>
                        <th>@lang('quickadmin.visitantes.fields.correo')</th>
                        <th>@lang('quickadmin.visitantes.fields.procedencia')</th>
                        <th>@lang('quickadmin.visitantes.fields.motivo')</th>
                        <th>@lang('quickadmin.visitantes.fields.fecha-entrada')</th>
                        <th>@lang('quickadmin.visitantes.fields.fecha-salida')</th>
                        <th>@lang('quickadmin.visitantes.fields.observaciones')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($visitantes) > 0)
                        @foreach ($visitantes as $visitante)
                            <tr data-entry-id="{{ $visitante->id }}">
                                @can('visitante_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='ci'>{{ $visitante->ci }}</td>
                                <td field-key='nombres_apellidos'>{{ $visitante->nombres_apellidos }}</td>
                                <td field-key='telefono'>{{ $visitante->telefono }}</td>
                                <td field-key='correo'>{{ $visitante->correo }}</td>
                                <td field-key='procedencia'>{{ $visitante->procedencia }}</td>
                                <td field-key='motivo'>{{ $visitante->motivo }}</td>
                                <td field-key='fecha_entrada'>{{ $visitante->fecha_entrada }}</td>
                                <td field-key='fecha_salida'>{{ $visitante->fecha_salida }}</td>
                                <td field-key='observaciones'>{{ $visitante->observaciones }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('visitante_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.visitantes.restore', $visitante->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('visitante_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.visitantes.perma_del', $visitante->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('visitante_view')
                                    <a href="{{ route('admin.visitantes.show',[$visitante->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('visitante_edit')
                                    <a href="{{ route('admin.visitantes.edit',[$visitante->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('visitante_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.visitantes.destroy', $visitante->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="14">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('visitante_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.visitantes.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection