@extends('layouts.admin')
@section('title', 'Panel de Control')
@section('content') 

<!-- Content -->

<div id="wrapper" class="full">
    <div id="mapView" class="min"><div class="mapPlaceholder"><span class="fa fa-spin fa-spinner"></span></div></div>
    <div id="content" class="max">
        <div class="tables">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-left">
                <h4>Propiedades</h4>
                </div>
                <div class="pull-right">
                    <a href="<?=URL::to('/')?>/admin/new" class="btn btn-red"><span class="fa fa-gear"></span> Agregar propiedades</a>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if (count($listings) < 1)
                        @if (!empty($search))
                        <p>No hay propiedades para la búsqueda <b>{{ $search }}</b>. <a href="/admin/?">Volver</a></p>
                        @else
                        <p>No hay propiedades en este momento.</p>
                        @endif
                    @else

                    <div class="table-overflow">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Código</th>
                                    <th>Titulo</th>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th width="200">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody class="table">
                                @foreach ($listings as $listing)
                                    <tr>
                                        <td><span class="userName">{{ $listing->id }}</span></td>
                                         <td><span class="userName">{{ $listing->property_code }}</span></td>
                                        <td><span class="userName">{{ $listing->title }}</span></td>
                                        <td>{{ $listing->short_desc }}</td>
                                          
                                        <td>{{ date('d/m/Y H:i', strtotime($listing->created_at)) }} </td>
                                        @if (!$listing->trashed())
                                        <td><span class="label label-green">
                                        ACTIVO   
                                        </span></td>
                                        @else
                                        <td><span class="label label-danger">
                                        INACTIVO   
                                        </span></td>
                                        @endif
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?=URL::to('/')?>/admin/edit/{{ $listing->id }}" class="btn btn-xs btn-round btn-o btn-green"><span class="fa fa-pencil"></span> Editar</a> 
                                                @if (!$listing->trashed())
                                                <a href="<?=URL::to('/')?>/admin/delete/{{ $listing->id }}" class="btn btn-xs btn-round btn-o btn-red"><span class="fa fa-trash"></span> Eliminar</a>  
                                                @else
                                                <a href="<?=URL::to('/')?>/admin/undelete/{{ $listing->id }}" class="btn btn-xs btn-round btn-o btn-green"><span class="fa fa-trash"></span> Restaurar</a>
                                                @endif

                                                 
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                 
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-right">
                    {{ $listings->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

@endsection