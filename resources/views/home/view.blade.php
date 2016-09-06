@extends('layouts.app')

@section('content')
@include('includes.header')
<?php
    $labelType = $listing->type=='sale'?'labelSale':'labelRent';
    $labelText = $listing->type=='sale'?'VENTA':'ALQUILER';
    $label = '<label class="'.$labelType.'">'.$labelText.'</label>';
?>
<div class="publication container margintop100 ">
    <div class="row">
    <div class="col-xs-12">
    <a href="/?">Home</a> / {{ $listing->title }}
    </div> 
        <div class="col-xs-12">
            <h1>
                {{ $listing->title }} <?=$label?> 
            </h1>
        </div>
        <div class="col-xs-12 codeUp">
        Código: {{ $listing->property_code }}
        </div>
        <div class="col-xs-12">
        	<h3>{{ $listing->short_desc }}</h3>
        </div>
        
        <div class="col-xs-12 col-sm-7 col-md-6">
        	<div id="gallery" style="display:none;">
				@foreach ($listing_images as $i=>$image)
                   	<img alt="{{ $listing->title }}"
					 src="<?=URL::to('/')?>/uploads/{{ $image->filename }}"
					 data-image="<?=URL::to('/')?>/uploads/{{ $image->filename }}"
					 data-description="{{ $listing->short_desc }}" />
                @endforeach
				
			</div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-6">
        	<h4><?=nl2br($listing->long_desc)?></h4>
            <div class="hidden-xs">
            <a href="#contact"><button type="button" class="btn btn-green">Estoy interesado en esta propiedad</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('contact')
	<a id="contact"></a>
    <div class="row pb40 highlight" style="margin-top:40px;">
        <div class="col-xs-12 backTitle"><h1 class="osLight color-white">Estás interesado en esta propiedad?</h1></div>
        <div class="col-xs-12 subcontact">
            Escribinos a info@marascoquirogaprop.com.ar<br /> o completá el formulario de contacto.
        </div>
        <div class="col-xs-12 col-sm-offset-1 col-sm-10">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="/?contact=sent">
                {{ csrf_field() }}
                	<input type="email" class="form-control input-lg" value="n@n.com" id="fakeemail1" style="opacity:0;width:0;position:absolute;height:0px;">
                	<input type="password" class="form-control input-lg" id="fakeform2" style="opacity:0;width:0;position:absolute;height:0px;" >
                	<input type="text" name="property_code" class="form-control input-lg" value="<?=$listing->property_code?>" id="code" style="opacity:0;width:0;position:absolute;height:0px;">
                
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label color-white">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="contact_name" placeholder="Nombre">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label color-white">Tu Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label color-white">Teléfono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" placeholder="Teléfono">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label color-white">Mensaje</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="message" placeholder="Mensaje"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-xs-12 pull-right">
                            <a href="javascript:void(0)" onclick="javascript:document.forms[0].submit()" class="btn btn-o btn-white">Enviar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@include('includes.footer')
@endsection
@section('scripts')

	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-common-libraries.js'></script>	
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-functions.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-thumbsgeneral.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-thumbsstrip.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-touchthumbs.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-panelsbase.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-strippanel.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-gridpanel.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-thumbsgrid.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-tiles.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-tiledesign.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-avia.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-slider.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-sliderassets.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-touchslider.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-zoomslider.js'></script>	
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-video.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-gallery.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-lightbox.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-carousel.js'></script>
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/js/ug-api.js'></script>

	<link rel='stylesheet' href='<?=URL::to('/')?>/js/plugins/unitegallery/css/unite-gallery.css' type='text/css' />
	
	<script type='text/javascript' src='<?=URL::to('/')?>/js/plugins/unitegallery/themes/default/ug-theme-default.js'></script>
	<link rel='stylesheet' 		  href='<?=URL::to('/')?>/js/plugins/unitegallery/themes/default/ug-theme-default.css' type='text/css' />

	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#gallery").unitegallery();
		});
	</script>
@endsection