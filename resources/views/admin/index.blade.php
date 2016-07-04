@extends('layouts.admin')
@section('title', 'Panel de Control')
@section('content') 

<!-- Content -->

<div id="wrapper" class="full">
    <div id="mapView" class="min"><div class="mapPlaceholder"><span class="fa fa-spin fa-spinner"></span> Loading map...</div></div>
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
                        <p>No hay propiedades publicadas.</p>
                    @else

                    <div class="table-overflow">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Descripción</th>
                                    <th>Rating</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody class="table">
                                @foreach ($listings as $listing)
                                    <tr>
                                        <td><span class="userName">{{ $listing->title }}</span></td>
                                        <td>{{ $listing->short_desc }}</td>
                                         <td>
                                            <span class="fa fa-star text-yellow"></span>
                                            <span class="fa fa-star text-yellow"></span>
                                            <span class="fa fa-star text-yellow"></span>
                                            <span class="fa fa-star text-yellow"></span>
                                            <span class="fa fa-star text-yellow"></span>
                                            (123)
                                        </td>
                                        <td>{{ date('d/m/Y H:i', strtotime($listing->created_at)) }} </td>
                                        <td><span class="label label-success">ACTIVE</span></td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-xs btn-round btn-o btn-green dropdown-toggle" data-toggle="dropdown"><span class="fa fa-pencil"></span> Edit</a>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                 
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

@endsection