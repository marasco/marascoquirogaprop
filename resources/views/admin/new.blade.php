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
                 <div class="form-group">
                    <label>* Titulo</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>
                <div class="row">                    
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                        <div class="form-group">
                           
                           <div class="btn-group">
                            <label>Moneda</label>
                            <div class="clearfix"></div>
                            <a href="#" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                <span class="dropdown-label">U$S</span>&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-select">
                                <li class="active">
                                <input type="radio" value="U$S" name="currency" <?php if ($currency == 'U$S') { echo 'checked="checked"'; } ?>><a href="#">U$S</a></li>
                                <li><input type="radio" value="$" name="currency"  <?php if ($currency == '$') { echo 'checked="checked"'; } ?>><a href="#">$</a></li>
                            </ul>
                        </div>


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
                    <label>* Descripción corta</label>
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
                <div class="form-group">
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
                <div class="form-group">
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
                <div class="form-group">
                    <div class="btn-group">
                        <label>Ciudad / Localidad</label>
                        <div class="clearfix"></div>
                        @if (count($cities))
                        <a href="#" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                            <span class="dropdown-label">{{ $cities[0]->name }}</span>&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-select">
                            @foreach ($cities as $i=>$city) 
                                <li <?php if ($i==0) echo 'class="active"'; ?>>
                                <input type="radio" value="{{ $city->id }}" name="city_id" ><a href="#">{{ $city->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Cantidad de Ambientes</label>
                    <input type="number" class="form-control" name="ambience_qty" min="1" value="{{ old('ambience_qty') || 1 }}" />
                </div>
                <div class="form-group">
                    <label>Cantidad de Dormitorios</label>
                    <input type="number" class="form-control" name="room_qty" min="1" value="{{ old('room_qty') || 1 }}" />
                </div>
                <div class="form-group">
                    <label>Cantidad de Baños</label>
                    <input type="number" class="form-control" name="bath_qty" min="1" value="{{ old('bath_qty') || 1 }}" />
                </div>
                <div class="form-group adv">
                    <div class="checkbox custom-checkbox"><label><input type="checkbox" name="has_poster">
                    <span class="fa fa-check"></span> Tiene Cartel</label></div>
                </div>
                <div class="form-group adv">
                    <div class="checkbox custom-checkbox"><label><input type="checkbox" name="is_favorite">
                    <span class="fa fa-check"></span> Favorito</label></div>
                </div>
                <div class="form-group adv">
                    <div class="checkbox custom-checkbox"><label><input type="checkbox" name="published_in_mercadolibre">
                    <span class="fa fa-check"></span> MercadoLibre</label></div>
                </div>
                <div class="form-group adv">
                    <div class="checkbox custom-checkbox"><label><input type="checkbox" name="published_in_zonaprop">
                    <span class="fa fa-check"></span> Zona Prop</label></div>
                </div>
                <div class="form-group adv">
                    <div class="checkbox custom-checkbox"><label><input type="checkbox" name="published_in_argenprop">
                    <span class="fa fa-check"></span> ArgenProp</label></div>
                </div>
                <div class="form-group">
                    <div class="btn-group">
                            <label>Galería de imágenes</label>
                            <input type="file" class="filestyle" data-buttonText=" Agregar Imágenes" data-badge="false" data-buttonName="btn-primary" data-input="false" with-previews multiple accept=".jpg,.jpeg,.png" multiupload-preview-object=".image-container" multiupload-delete-server="<?=URL::to('/').'/admin/delete-upload'?>" multiupload-server="<?=URL::to('/').'/admin/uploads'?>" multiupload-model-id="0" />
                            <div class="image-container row">
                            </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Datos del propietario</label>
                    <textarea class="form-control" name="owner_data" rows="3">{{ old('owner_data') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Aclaraciones</label>
                    <textarea class="form-control" name="privacy_comment" rows="3">{{ old('privacy_comment') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Datos del Vendedor</label>
                    <textarea class="form-control" name="seller_info" placeholder="{nombre del vendedor} - {fecha}" rows="3">{{ old('seller_info') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit"  class="btn btn-green btn-lg" value="Guardar">Guardar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<script>
    window._defaultLat = <?=$location?>; 
</script>

@endsection

@section('scripts')
    <script src="<?=URL::to('/')?>/js/multiimage.js"></script>
@endsection