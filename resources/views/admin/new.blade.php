@extends('layouts.admin')
@section('title', 'Panel de Control')
@section('content') 

<div id="wrapper">
    <div id="mapView" class="mob-min"><div class="mapPlaceholder"><span class="fa fa-spin fa-spinner"></span> Cargando mapa...</div></div>
    <div id="content" class="mob-max">
        <div class="rightContainer">
        <div class="col-xs-12">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <h1>Agrega una nueva propiedad</h1>
                <form action="{{ url('admin/new')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Precio</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input class="form-control" name="price" type="text" value="{{ old('price') }}" placeholder="A consultar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descripción corta</label>
                    <textarea class="form-control" name="short_desc" rows="2">{{ old('short_desc') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Descripción Larga</label>
                    <textarea class="form-control" name="long_desc" rows="4">{{ old('long_desc') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Ubicación <span id="latitude" class="label label-default"></span> <span id="longitude" class="label label-default"></span></label>
                    <input class="hidden form-control" type="text" name="location" id="location" with-coords placeholder="Ingresa coordenadas" autocomplete="on" >
                    <p class="help-block">Arrastra el mapa</p>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="btn-group">
                            <label>Tipo de Operación</label>
                            <div class="clearfix"></div>
                            <a href="#" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                <span class="dropdown-label">Venta</span>&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-select">
                                <li class="active">
                                <input type="radio" value="sale" name="operation" <?php if ($operation == 'sale') { echo 'checked="checked"'; } ?>><a href="#">Venta</a></li>
                                <li><input type="radio" value="rent" name="operation"  <?php if ($operation == 'rent') { echo 'checked="checked"'; } ?>><a href="#">Alquiler</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="btn-group">
                            <label>Tipo de Propiedad</label>
                            <div class="clearfix"></div>
                            @if (count($listing_types))
                            <a href="#" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                <span class="dropdown-label">{{ $listing_types[0]->name }}</span>&nbsp;&nbsp;&nbsp;<span class="caret"></span>

                            </a>
                            <ul class="dropdown-menu dropdown-select">
                                @foreach ($listing_types as $i=>$listing_type)
                                
                                    <li <?php if ($i==0) echo 'class="active"'; ?>>
                                    <input type="radio" value="{{ $listing_type->id }}" name="type" <?php if ($listing_type_selected == $listing_type->id) { echo 'checked="checked"'; } ?>><a href="#">{{ $listing_type->name }}</a>
                                    </li>
                                @endforeach
                                 
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Galería de imágenes</label>
                            <input type="file" class="file" multiple data-show-upload="false" data-show-caption="false" data-show-remove="false" accept="image/jpeg,image/png" data-browse-class="btn btn-o btn-default" data-browse-label="Browse Images">
                            <p class="help-block">Elige las imágenes de la propiedad</p>
                        </div>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <div class="checkbox custom-checkbox"><label><input type="checkbox"><span class="fa fa-check"></span> Garden</label></div>
                            <div class="checkbox custom-checkbox"><label><input type="checkbox"><span class="fa fa-check"></span> Telephone</label></div>
                            <div class="checkbox custom-checkbox"><label><input type="checkbox"><span class="fa fa-check"></span> Fireplace</label></div>
                        </div>
                    </div>
                </div>
                -->
                <div class="form-group">
                    <button type="submit"  class="btn btn-green btn-lg" value="Guardar">Guardar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection