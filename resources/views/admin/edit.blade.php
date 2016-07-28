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
                    <input type="hidden" name="id" class="form-control" style="display:none" value="{{ $listing->id }}">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" name="title" class="form-control" value="{{ $listing->title }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Precio</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input class="form-control" name="price" type="text" value="{{ $listing->price }}" placeholder="A consultar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descripción corta</label>
                    <textarea class="form-control" name="short_desc" rows="2">{{ $listing->short_desc }}</textarea>
                </div>
                <div class="form-group">
                    <label>Descripción Larga</label>
                    <textarea class="form-control" name="long_desc" rows="4">{{ $listing->long_desc }}</textarea>
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
                                <span class="dropdown-label">
                                    <?php echo ($listing->operation == 'rent')?'Alquiler':'Venta'; ?>
                                </span>&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-select">
                                <li class="active">
                                <input type="radio" value="sale" name="operation" <?php if ($listing->operation == 'sale') { echo 'checked="checked"'; } ?>><a href="#">Venta</a></li>
                                <li><input type="radio" value="rent" name="operation"  <?php if ($listing->operation == 'rent') { echo 'checked="checked"'; } ?>><a href="#">Alquiler</a></li>
                            </ul>
                        </div>
                </div>
                 <div class="form-group">
                        <div class="btn-group">
                            <label>Tipo de Propiedad</label>
                            <div class="clearfix"></div>
                            @if (count($listing_types))
                                <?php 
                                foreach ($listing_types as $i=>$listing_type):
                                    if ($listing_type->id == $listing->type):
                                        $selectedListing = $listing_type->name;
                                    endif;
                                endforeach; ?>
                            <a href="#" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                <span class="dropdown-label">{{ $selectedListing }}</span>&nbsp;&nbsp;&nbsp;<span class="caret"></span>

                            </a>
                            <ul class="dropdown-menu dropdown-select">
                                @foreach ($listing_types as $i=>$listing_type)
                                
                                    <li <?php if ($i==0) echo 'class="active"'; ?>>
                                    <input type="radio" value="{{ $listing_type->id }}" name="type" <?php if ($listing->type == $listing_type->id) { echo 'checked="checked"'; } ?>><a href="#">{{ $listing_type->name }}</a>
                                    </li>
                                @endforeach
                                 
                            </ul>
                            @endif
                        </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Galería de imágenes</label>
                            <input type="file" class="filestyle" data-buttonText="+ Agregar Imágenes" data-badge="false" data-buttonName="btn-primary" data-input="false" with-previews multiple accept=".jpg,.jpeg,.png" multiupload-preview-object=".image-container" multiupload-delete-server="<?=URL::to('/').'/admin/delete-upload'?>" multiupload-server="<?=URL::to('/').'/admin/uploads'?>" multiupload-model-id="{{ $listing->id }}" />
                            <div class="image-container row">
                                @foreach ($listing_images as $i=>$image)
                                    <div class='col-xs-4 col-md-3 image-obj' containerId='{{ $image->id }}'>
                                        <div class='deleteContainer' multiimage-delete-server="<?=URL::to('/').'/admin/delete-upload'?>" onclick='deleteContainer(this,{{ $image->id }})'>x</div>
                                        <div class='image-space'><img class='maxheight100' src='<?=URL::to('/uploads')?>/{{ $image->filename }}' /></div>
                                    </div>
                                @endforeach
                            </div>

                          


                        </div>
                    </div>
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

window._defaultLat = {{ $listing->location }}; 
console.log(_defaultLat)
</script>
@endsection


@section('scripts')
    <script src="<?=URL::to('/')?>/js/multiimage.js"></script>
@endsection