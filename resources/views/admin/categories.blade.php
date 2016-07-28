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
                <h4>Categorías</h4>
                </div>
                <div class="pull-right">
                    <a href="<?=URL::to('/')?>/admin/new-category" class="btn btn-red"><span class="fa fa-gear"></span> Agregar Categorías</a>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    @if (count($items) < 1)
                        <p>No hay categorías publicadas.</p>
                    @else

                    <div class="table-overflow">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th> 
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody class="table">
                                @foreach ($items as $item)
                                    <tr>
                                        <td><span class="userName">{{ $item->id }}</span></td>
                                        <td><span class="userName">{{ $item->name }}</span></td>
                                        <td>
                                            <div class="btn-group">
                                               <a href="<?=URL::to('/')?>/admin/edit-category/{{ $item->id }}" class="btn btn-xs btn-round btn-o btn-green"><span class="fa fa-pencil"></span> Edit</a> 
                                                <a href="<?=URL::to('/')?>/admin/delete-category/{{ $item->id }}" class="btn btn-xs btn-round btn-o btn-red"><span class="fa fa-trash"></span> Delete</a> 
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                 
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-right">
                    {{ $items->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

@endsection